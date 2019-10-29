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

| 类型       | 说明        |  |
| --------- | --------- | ------
| null       | 无动效        | none
| {In: 'fadeIn', Out: 'fadeOut'} |  渐隐渐显 | TRANSITION_FADE:fade-from-center
| {In: 'slideInLeft', Out: 'slideOutRight'} |  左右推移 | TRANSITION_PUSH_RIGHT:roll-from-right
| {In: 'slideInDown', Out: 'slideOutDown'} |  上下推移  | TRANSITION_PUSH_DOWN:roll-from-bottom
| {In: 'flipInY', Out: 'flipOutY'} |  左右翻页     | TRANSITION_SPLIT_OUT_VERTICAL_:open-vertical
| {In: 'flipInX', Out: 'flipOutX'} |  上下翻页     | TRANSITION_SPLIT_OUT_HORIZONTAL:open-horizontal



## web ppt  《=》 office  PowerPoint 字段映射

| 类型       | 说明        |
| --------- | --------- |


## ppt 过场动画类型

参考 http://docs.oasis-open.org/office/v1.2/os/OpenDocument-v1.2-os-part1.html#__RefHeading__1419912_253892949

### 20.232 presentation:transition-style

The presentation:transition-style attribute specifies the way that each presentation page replaces the previous presentation page.

The defined values for the presentation:transition-style attribute are:

●clockwise: page is uncovered by the hand of a watch, moving clockwise. 

●close: Combination of close-horizontal and close-vertical. 

●close-horizontal: page is uncovered by drawing it line by line horizontally starting at the edge of the page. 

●close-vertical: page is uncovered by drawing it line by line vertically starting at the edge of the page. 

●counterclockwise: page is uncovered by the hand of a watch, moving counterclockwise. 

●dissolve: page is faded in by drawing small blocks in a random fashion. 

●fade-from-bottom: page fades from a visible or hidden state to a hidden or visible state to the bottom of the screen. 

●fade-from-left: page fades from a visible or hidden state to a hidden or visible state to the left of the screen. 

●fade-from-right: pages fade from a visible or hidden state to a hidden or visible state to the right of the screen. 

●fade-from-top: page fades from a visible or hidden state to a hidden or visible state to the top of the screen. 

●fade-from-lowerleft: page fades from a visible or hidden state to a hidden or visible state to the lower left of the screen. 

●fade-from-lowerright: page fades from a visible or hidden state to a hidden or visible state to the lower right of the screen. 

●fade-from-upperleft: page fades from a visible or hidden state to a hidden or visible state to the upper left of the screen. 

●fade-from-upperright: page fades from a visible or hidden state to a hidden or visible state to the upper right of the screen. 

●fade-from-center: page fades from a visible or hidden state to a hidden or visible state from the center of the screen. 

●fade-to-center: page fades from a visible or hidden state to a hidden or visible state to the center of the screen. 

●fly-away: page first reduces itself to a smaller size (while remaining centered in the screen), and then "flies away" (turns around and moves to the bottom-right corner of the screen). The next slide appears under it meanwhile. 

●horizontal-checkerboard: page is uncovered by drawing checkerboard like blocks that increase in size horizontally. 

●horizontal-lines: page is uncovered by drawing it line by line horizontally in a random fashion. 

●horizontal-stripes: page is uncovered by drawing horizontal stripes that change their size during this effect. 

●interlocking-horizontal-left: page appears in 4 horizontal stripes (the height is divided in 4, like in the horizontal-stripes effect) but those stripes come from left, right, left, and right, and cross each other in the middle of the screen. 

●interlocking-horizontal-right: page appears in 4 horizontal stripes (the height is divided in 4, like in the horizontal-stripes effect) but those stripes come from right, left, right, and left, and cross each other in the middle of the screen. 

●interlocking-vertical-bottom: same effect as interlocking-horizontal-* but with vertical stripes crossing each other. 

●interlocking-vertical-top: same effect as interlocking-horizontal-* but with vertical stripes crossing each other. 

●melt: Small vertical stripes move down at random speed, which gives the effect of the current page "melting down". 

●move-from-bottom: page moves from the bottom of the screen to its final position. 

●move-from-left: page moves from the left of the screen to its final position. 

●move-from-right: page moves from the right of the screen to its final position. 

●move-from-top: page moves from the top of the screen to its final position. 

●move-from-lowerleft: page moves from the lower left of the screen to its final position. 

●move-from-lowerright: page moves from the lower right of the screen to its final position. 

●move-from-upperleft: page moves from the upper left of the screen to its final position. 

●move-from-upperright: page moves from the upper right of the screen to its final position. 

●none: no effect is used. 

●open: Combination of open-horizontal and open-vertical. 

●open-horizontal: page is uncovered by drawing it line by line horizontally, starting at the center of the page. 

●open-vertical: page is uncovered by drawing it line by line vertically, starting at the center of the page. 

●random: an effect is chosen at random to uncover a page. 

●roll-from-bottom: page moves towards the bottom of the screen to its final position, pushing the previous page out. 

●roll-from-left: pages move towards the left of the screen to its final position, pushing the previous page out. 

●roll-from-right: page moves towards the right of the screen to its final position, pushing the previous page out. 

●roll-from-top: page moves towards the top of the screen to its final position, pushing the previous page out. 

●spiralin-left: page is uncovered by drawing blocks in a spiral fashion, starting from the left edge of the screen. 

●spiralin-right: page is uncovered by drawing blocks in a spiral fashion, starting from the right edge of the screen. 

●spiralout-left: page is uncovered by drawing blocks in a spiral fashion, starting from the center of the page. 

●spiralout-right: page is uncovered by drawing blocks in a spiral fashion, starting from the center of the page. 

●stretch-from-bottom: page is uncovered by changing its size from the bottom of the screen during this effect. 

●stretch-from-left: page is uncovered by changing its size from the left of the screen during this effect. 

●stretch-from-right: page is uncovered by changing its size from the right of the screen during this effect. 

●stretch-from-top: page is uncovered by changing its size from the left of the screen during this effect. 

●uncover-to-bottom: page is uncovered from the bottom of the screen. 

●uncover-to-left: page is uncovered from the left of the screen. 

●uncover-to-right: page is uncovered from the right of the screen. 

●uncover-to-top: page is uncovered from the top of the screen. 

●uncover-to-lowerleft: page is uncovered from the lower left of the screen. 

●uncover-to-lowerright: page is uncovered from the lower right of the screen. 

●uncover-to-upperleft: page is uncovered from the upper left of the screen. 

●uncover-to-upperright: page is uncovered from the upper right of the screen. 

●vertical-checkerboard: page is uncovered by drawing checkerboard like blocks that increase in size vertically. 

●vertical-lines: page is uncovered by drawing it line by line vertically in a random fashion. 

●vertical-stripes: page is uncovered by drawing vertical stripes that change their size during this effect. 

●wavyline-from-bottom: page is uncovered by drawing small blocks in a snake like fashion from the bottom of the screen. 

●wavyline-from-left: page is uncovered by drawing small blocks in a snake like fashion from the left of the screen. 

●wavyline-from-right: page is uncovered by drawing small blocks in a snake like fashion from the right of the screen. 

●wavyline-from-top: page is uncovered by drawing small blocks in a snake like fashion from the top of the screen. 