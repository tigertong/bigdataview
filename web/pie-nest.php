<!DOCTYPE html>
<html style="height: 100%">
   <head>
       <meta charset="utf-8">
   </head>
   <body style="height: 100%; margin: 0">
       <div id="container" style="height: 100%"></div>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts-all-3.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"></script>
       <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/bmap.min.js"></script>
	   
<?php

#date_default_timezone_set('UTC') ;
 
 //orderarea = '北京' or orderarea ='上海' or orderarea = '广东'
include_once('./db.conf.php');
/*





| 无支付方式         |        8 |
| 现场收款           |        1 |
| 信用卡分期         |        3 |
| 翼支付             |        1 |
| 货到付款           |       91 |
| 平台               |        5 |

| 银联               |        5 |
| 银行直连           |       44 |
| 无线银联支付       |       68 |
| 民生手机银行       |        1 |

| 支付宝             |      207 |
| 支付宝快捷         |       47 |
| 支付宝网银         |        1 |
| 无线支付宝         |      246 |
*/
?>	   	   
	   
	   
       <script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
app.title = '上海一地11月份的支付方式分类';

option = {
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:['支付宝','网银','其他','支付宝账号','支付宝快捷','无线支付宝','银行直连','无线银联支付','货到付款','翼支付','其他']
    },
    series: [
        {
            name:'支付方式',
            type:'pie',
            selectedMode: 'single',
            radius: [0, '30%'],

            label: {
                normal: {
                    position: 'inner'
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:[
                {value:501, name:'支付宝', selected:true},
                {value:118, name:'网银'},
                {value:109, name:'其他'}
            ]
        },
        {
            name:'支付方式',
            type:'pie',
            radius: ['40%', '55%'],

            data:[
                {value:207, name:'支付宝账号'},
                {value:48, name:'支付宝快捷'},
                {value:246, name:'无线支付宝'},
                {value:49, name:'银行直连'},
                {value:69, name:'无线银联支付'},
                {value:91, name:'货到付款'},
                {value:6, name:'翼支付'},
                {value:12, name:'其他'}
            ]
        }
    ]
};;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
       </script>
   </body>
</html>