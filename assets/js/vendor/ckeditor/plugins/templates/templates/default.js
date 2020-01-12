/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
CKEDITOR.addTemplates("default", {
    imagesPath: CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates") + "templates/images/"),
    templates: [{
            title: "CIS模版",
            image: "CIS.png",
            description: "CIS产品表格内容",
            html: '<table class="table"><thead><tr><th>像素</th><th>光学尺寸</th><th>输出格式</th><th>帧率</th><th>数据接口</th><th>像素尺寸</th><th>像素技术</th><th>色彩阵列</th><th>封装</th></tr></thead><tbody><tr><td>13M</td><td>1/3.06"</td><td>RAW</td><td>Full Size @ 30 FPS</td><td>MIPI</td><td>1.12µm</td><td>BSI</td><td>RGB Bayer</td><td>COB/ TPLCC</td></tr></tbody></table>'
        },

        {
            title: "DDI模版",
            image: "DDI.png",
            description: "DDI产品表格内容",
            html: '<table class="table"><thead><tr><th>特色</th><th>类型</th><th>源极开关</th><th>栅极开关</th><th>接口</th><th>显示缓存</th><th>显示模式</th><th>翻转类型</th></tr></thead><tbody><tr><td>0D0C</td><td>HD/HD+ 720*1600</td><td>2160</td><td>GIP</td><td>MIPI/RGB</td><td>RAMless</td><td>16.7M-Color / 262K-Color / 65K-Color Idle mode / 8-color</td><td>Dot Inversion Column Inversion</td></tr></tbody></table>'
        },
        {
            title: "ISP模版",
            image: "ISP.png",
            description: "ISP产品表格内容",
            html: '<table class="table"><thead><tr><th>应用场景</th><th>描述</th><th>主要特色</th><th>输入接口</th><th>输出接口</th><th>控制接口</th><th>最大帧率</th><th>封装种类</th></tr></thead><tbody><tr><td>Automobile Smart Home</td><td>SOC chip with both rear view and front view ISPs for automotive applications</td><td>ISP x 2 H264 video codec MJPEG/JPEG codec Audio codec ARM Cortex A5 </td><td>MIPI CSI GC-LVDS I2S</td><td>MIPI DSI I2S</td><td>I2C</td><td>ISP1: 5M @ 30FPS ISP2: FHD @ 30FPS</td><td>WLBGA</td></tr></tbody></table>'
        },

        // {
        //     title: "Text and Table",
        //     image: "template3.gif",
        //     description: "A title with some text and a table.",
        //     html: '\x3cdiv style\x3d"width: 80%"\x3e\x3ch3\x3eTitle goes here\x3c/h3\x3e\x3ctable style\x3d"width:150px;float: right" cellspacing\x3d"0" cellpadding\x3d"0" border\x3d"1"\x3e\x3ccaption style\x3d"border:solid 1px black"\x3e\x3cstrong\x3eTable title\x3c/strong\x3e\x3c/caption\x3e\x3ctr\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3c/tr\x3e\x3ctr\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3c/tr\x3e\x3ctr\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3c/tr\x3e\x3c/table\x3e\x3cp\x3eType the text here\x3c/p\x3e\x3c/div\x3e'
        // }
    ]
});