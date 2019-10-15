<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/14
 * Time: 5:37 PM
 */

namespace BudWebSlide;


use PhpOffice\Common\Drawing;
use PhpOffice\PhpPresentation\Shape\Drawing\AbstractDrawingAdapter;

class PptConvert
{
    public static $readers = [
        'odp' => 'ODPresentation',
        'ppt' => 'PowerPoint97',
        'pptx' => 'PowerPoint2007',
        'phppt' => 'Serialized',
    ];
    public $workspace = '';

    public function __construct($workspace = '')
    {
        if ($workspace) {
            $this->workspace = $workspace;
        }
    }

    public function webToPpt($data, $type = 'pptx', $tmpfilePath = '/tmp/budpptconvert.pptx')
    {
        $objPHPPresentation = new \PhpOffice\PhpPresentation\PhpPresentation();
        $valid = new \BudWebSlide\ValidChecker();
        $valid->handle($data);
        $i = 0;
        $count = count($data['EditData']);
        $dl = new \PhpOffice\PhpPresentation\DocumentLayout();
        $dl->setDocumentLayout(\PhpOffice\PhpPresentation\DocumentLayout::LAYOUT_SCREEN_16X9);
        $objPHPPresentation->setLayout($dl);
        for ($i = 0; $i < $count; $i++) {
            $Page = $data['EditData'][$i];
            // Create slide
            if ($i == 0) {
                $currentSlide = $objPHPPresentation->getActiveSlide();

            } else {
                $currentSlide = $objPHPPresentation->createSlide();
            }

            \BudWebSlide\Slide::setBackground($currentSlide, $data['SlidePageData'], $i);
            foreach ($Page as $item) {
                echo json_encode($item) . "\r\n";
                if ($item['type'] == 'img') {
                    \BudWebSlide\Shape\ImageShape::fromWeb2Ppt($currentSlide, $item);
                }

                if ($item['type'] == 'word') {
                    \BudWebSlide\Shape\TextShape::fromWeb2Ppt($currentSlide, $item);
                }
            }

        }

        $oWriterPPTX = \PhpOffice\PhpPresentation\IOFactory::createWriter($objPHPPresentation, self::$readers[$type]);
        @unlink($tmpfilePath);
        $oWriterPPTX->save($tmpfilePath);

        return file_get_contents($tmpfilePath);
    }

    public function pptToWeb($pptFile, $type = 'pptx', $tmpfilePath = '/tmp/budpptconvert/')
    {
        $json = [
            'SlidePageData' => [
                'isSetAnimationAllPage' => false,
                'isSetBackgroundAllPage' => false,
                'backgroundType' => 0,
                'backgroundColor' => [
                    'r' => 255,
                    'g' => 255,
                    'b' => 255,
                    'a' => 1,
                ],
                'backgroundImage' => '',
                'nodes' => [],
                'pages' => [
                    [
                        'backgroundType' => 0,
                        'backgroundColor' => [
                            'r' => 255,
                            'g' => 255,
                            'b' => 255,
                            'a' => 1,
                        ],
                        "animateName" => '',
                        "animateType" => 0,
                        "IndicatingID" => 28865,
                        'backgroundImage' => '',
                        "remarks" => [],
                    ]
                ],
            ],
            'EditData' => [
            ],
        ];
        $oReader = \PhpOffice\PhpPresentation\IOFactory::createReader(self::$readers[$type]);
        $ppt = $oReader->load($pptFile);
        /*
        #文档属性
        $dp = $ppt->getDocumentProperties();
        $dp->getTitle();
        $dp->getCreator();
        $dp->getLastModifiedBy();

        #ppt 属性
        $pp = $ppt->getPresentationProperties();
        $pp->getLastView();
        $pp->getZoom();
        $pp->isMarkedAsFinal();

        #布局
        $layout = $ppt->getLayout();
        $cx = $layout->getCX();
        $cy = $layout->getCY();
        */

        #获取 ppt 页数
        $slideCount = $ppt->getSlideCount();
        for ($i = 0; $i < $slideCount; $i++) {
            $currentSlide = $ppt->getSlide($i);
            $co = $currentSlide->getShapeCollection();
            $shapeCount = $co->count();
            $info = $co->getArrayCopy();

            $nodes = [];
            $editDatas = [];
            for($shapeIndex=0; $shapeIndex < $shapeCount;$shapeIndex++)
            {
                $o = $info[$shapeIndex];
                if ($o instanceof AbstractDrawingAdapter)
                {
//                    file_put_contents($o->getName(),$o->getContents());
                    //type image
                    $editData = [
                        'types' => 'img',
                        'content' => '',
                        'img_url' => 'data:image/png;base64, '.base64_encode($o->getContents()),
                        'name' => '',
                        'fileZoom' => '',
                        'style' => [
                            'position' => 'absolute',
                            'left'=>$o->getOffsetX(),
                            'top'=>$o->getOffsetY(),
                            'width'=>$o->getWidth(),
                            'height'=>$o->getHeight(),
                        ],
                    ];
                }

                $page = [
                    'backgroundType' => 0,
                    'backgroundColor' => [
                        'r' => 255,
                        'g' => 255,
                        'b' => 255,
                        'a' => 1,
                    ],
                    "animateName" => '',
                    "animateType" => 0,
                    "IndicatingID" => 28865,
                    'backgroundImage' => '',
                    "remarks" => [],
                ];
                $node = [

                ];
                $editDatas[] = $editData;
                $nodes[] = $node;
            }

//            if ($o instanceof AbstractDrawingAdapter)
//            {
//                //type image
//                $editData = [
//                    'types' => 'img',
//                    'content' => '',
//                    'img_url' => 'data:image/jpeg;base64, '.base64_encode($o->getContents()),
//                    'name' => '',
//                    'fileZoom' => '',
//                    'style' => [
//                        'position' => 'absolute',
//                        'left'=>$o->getOffsetX(),
//                        'top'=>$o->getOffsetY(),
//                        'width'=>$o->getWidth(),
//                        'height'=>$o->getHeight(),
//                    ],
//                ];
//            }
            $json['SlidePageData']['nodes'][] = $nodes;
            $json['SlidePageData']['pages'][] = $page;
            $json['EditData'][] = $editDatas;
        }


        return $json;
    }
}