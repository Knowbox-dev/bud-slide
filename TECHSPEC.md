#技术文档

## web ppt层级结构

### 一级

| 字段名       | 释义        |
| --------- | --------- |
| SlidePageData       | 右侧新建页面的数据        |
| EditData       | 每页对应的节点数据       |

### 二级 SlidePageData

| 字段名      | default | 释义        |
| --------- | --------- | ----- |
| isSetAnimationAllPage       | true| 是否给所有页面设置动画  
| isSetBackgroundAllPage       | false | 是否给所有页面设置背景 
| backgroundType       | 0 |  背景类型 0：无填充 1: 纯色填充 2: 背景填充
| backgroundColor       | {r,g,b,a} |  默认背景颜色是rgba(255,255,255,1) 纯色背景是别的rgba值
| backgroundImage       | "" |  背景填充时，图片地址
| animateName       | 	In: "fadeIn", 、Out: "fadeOut" |  给所有页面设置动画的动画名称
| animateType       | 	1 |  动画类型，见 动画配置
| pages       | 	[] |  每个页面设置，见 SlidePageData - pages


#### SlidePageData - pages

| 字段名      | default | 释义        |
| --------- | --------- | ----- |
| backgroundType       | 0 |  背景类型 0：无填充 1: 纯色填充 2: 背景填充
| backgroundColor       | {r,g,b,a} |  默认背景颜色是rgba(255,255,255,1) 纯色背景是别的rgba值
| backgroundImage       | "" |  背景填充时，图片地址
| animateName       | 	In: "fadeIn", 、Out: "fadeOut" |  给所有页面设置动画的动画名称
| animateType       | 	1 |  动画类型，见 动画配置
| IndicatingID       | 	1 |  序列号
| remarks       | 	1 |  备注



### 二级 EditData

#### EditData

| 字段名      | default | 释义        |
| --------- | --------- | ----- |
| content       | “小数乘小数" | 内容  
| type       | “word" |  类型
| img_url       | "" |  图片地址（支持 base64 否？）
| name       | "timg.jpeg" |  名字
| fileZoom       | "640*360" |  缩放
| fileSize       | 	"43.482K" |  文件大小？
| style       | 	{} |  样式控制
        |

#### EditData - types

| 类型       | 说明        |
| --------- | --------- |
|  word       | 文字        |
|  img       | 图片        |

#### EditData - style

| 字段名      | default | 释义        |
| --------- | --------- | ----- |
| position       | "absolute" | 位置  
| left       | 0 |  距左距离
| top       | 0 |  距顶距离
| width       | 1 |  宽
| height       | 1 |  高
| zIndex       | 	1 |  层级
| fontSize       | 	32px |  字号
| fontWeight       | 	"Bold" |  字重
| fontStyle       | 	32px |  字体样式
| fontFamily       | 	"sans-serif" |  字体
| background       | 	32px |  字号
| backgroundSize       | 	32px |  字号
| border       | 	"" |  边线样式
| padding       | 	"10px 15px" |  内联边距
| outline       | 	"none" |  轮廓
| backgroundColor       | 	 |  背景颜色
| transform       | 	"rotate(0deg)" |  旋转
| opacity       | 	1 |  透明度
| textAlign       | 	center |  文字位置
| color       | 	"#f44e3b" |  字体颜色
| rotateAngle       | 	0 |  旋转角度


### 动画配置

| 类型       | 说明        |
| --------- | --------- |
| null       | 无动效        |
| {In: 'fadeIn', Out: 'fadeOut'} |  渐隐渐显
| {In: 'slideInLeft', Out: 'slideOutRight'} |  左右推移  
| {In: 'slideInDown', Out: 'slideOutDown'} |  上下推移 
| {In: 'flipInY', Out: 'flipOutY'} |  左右翻页     
| {In: 'flipInX', Out: 'flipOutX'} |  上下翻页     



## web ppt  《=》 office  PowerPoint 字段映射

| 类型       | 说明        |
| --------- | --------- |