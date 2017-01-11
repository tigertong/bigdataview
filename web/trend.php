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
$result = mysql_query("select date,count(*) as sum from orderlist where orderarea='上海' and date <'2014-11-19' group by date order by date; ",$conn); //查询
$shanghai = "";
$date_str = "";
while($row = mysql_fetch_array($result))
{ 
$shanghai .= $row['sum'].",";
$date_str .= "'".$row['date']."',";
}

$result = mysql_query("select date,count(*) as sum from orderlist where orderarea='北京' and date <'2014-11-19' group by date order by date; ",$conn); //查询
$beijing = "";
while($row = mysql_fetch_array($result))
{ 
$beijing .= $row['sum'].",";
}
$result = mysql_query("select date,count(*) as sum from orderlist where orderarea='浙江' and date <'2014-11-19' group by date order by date; ",$conn); //查询
$zhejiang = "";
while($row = mysql_fetch_array($result))
{ 
$zhejiang .= $row['sum'].",";
}
$result = mysql_query("select date,count(*) as sum from orderlist where orderarea='广东' and date <'2014-11-19' group by date order by date; ",$conn); //查询
$guangdong = "";
while($row = mysql_fetch_array($result))
{ 
$guangdong .= $row['sum'].",";
}
$result = mysql_query("select date,count(*) as sum from orderlist where orderarea='湖南' and date <'2014-11-19' group by date order by date; ",$conn); //查询
$hunan = "";
while($row = mysql_fetch_array($result))
{ 
$hunan .= $row['sum'].",";
}

$hunan = substr($hunan ,0, strlen($hunan)-1); 
$guangdong = substr($guangdong ,0, strlen($guangdong)-1); 
$zhejiang = substr($zhejiang ,0, strlen($zhejiang)-1); 
$shanghai = substr($shanghai ,0, strlen($shanghai)-1); 
$beijing = substr($beijing ,0, strlen($beijing)-1); 
$date_str = substr($date_str ,0, strlen($date_str)-1); 

mysql_close(); //关闭MySQL连接
?>	   
	   
       <script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title: {
        text: '11 月份订单趋势图 选取 top 5 的地区'
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['湖南','广东','浙江','北京','上海']
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : [<?php echo $date_str;?>]
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'湖南',
            type:'line',
            stack: '总量',
            areaStyle: {normal: {}},
            data:[<?php echo $hunan;?>]
        },
        {
            name:'广东',
            type:'line',
            stack: '总量',
            areaStyle: {normal: {}},
            data:[<?php echo $guangdong;?>]
        },
        {
            name:'浙江',
            type:'line',
            stack: '总量',
            areaStyle: {normal: {}},
            data:[<?php echo $zhejiang;?>]
        },
        {
            name:'北京',
            type:'line',
            stack: '总量',
            areaStyle: {normal: {}},
            data:[<?php echo $beijing;?>]
        },
        {
            name:'上海',
            type:'line',
            stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            areaStyle: {normal: {}},
            data:[<?php echo $shanghai;?>]
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
       </script>
   </body>
</html>