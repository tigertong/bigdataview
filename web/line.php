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
	   	   
       <script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
var xAxisData = [];
var data1 = [];
var data2 = [];

<?php

#date_default_timezone_set('UTC') ;

 
include_once('./db.conf.php');
$result = mysql_query("select orderarea,count(*) as sum from orderlist  where productname like '%女%' group by orderarea;  ",$conn); //查询
$str = "";
while($row = mysql_fetch_array($result))
{ 
echo "xAxisData.push('".$row['orderarea']."');  ";
echo "data1.push(".$row['sum'].");  ";
//$str .= "{name: '".$row['orderarea']."', value: ".($row['sum']/10)."},";
}
$result = mysql_query("select orderarea,count(*) as sum from orderlist  where productname like '%男%' group by orderarea;  ",$conn); //查询
$str = "";
while($row = mysql_fetch_array($result))
{ 
echo "data2.push(".$row['sum'].");  ";
//$str .= "{name: '".$row['orderarea']."', value: ".($row['sum']/10)."},";
}
mysql_close(); //关闭MySQL连接


?>



option = {
    title: {
        text: '11月份消费的男女比例分布图'
    },
    legend: {
        data: ['woman', 'man'],
        align: 'left'
    },
    toolbox: {
        // y: 'bottom',
        feature: {
            magicType: {
                type: ['stack', 'tiled']
            },
            dataView: {},
            saveAsImage: {
                pixelRatio: 2
            }
        }
    },
    tooltip: {},
    xAxis: {
        data: xAxisData,
        silent: false,
        splitLine: {
            show: false
        }
    },
    yAxis: {
    },
    series: [{
        name: 'woman',
        type: 'bar',
        data: data1,
        animationDelay: function (idx) {
            return idx * 10;
        }
    }, {
        name: 'man',
        type: 'bar',
        data: data2,
        animationDelay: function (idx) {
            return idx * 10 + 100;
        }
    }],
    animationEasing: 'elasticOut',
    animationDelayUpdate: function (idx) {
        return idx * 5;
    }
};;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
       </script>
   </body>
</html>