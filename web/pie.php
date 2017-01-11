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
$result = mysql_query("select count(*) as sum from orderlist  where  orderarea ='上海'  and   productname like '%女%' and  (productname like '%鞋%' or productname like '%靴%') ",$conn); //查询
$shoes = 0;
while($row = mysql_fetch_array($result))
{ 
$shoes = $row['sum'];
}
$result = mysql_query("select count(*) as sum from orderlist  where  orderarea ='上海'  and   productname like '%女%' and  productname like '%包%' ",$conn); //查询
$bag = 0;
while($row = mysql_fetch_array($result))
{ 
$bag = $row['sum'];
}
$result = mysql_query("select count(*) as sum from orderlist  where  orderarea ='上海'  and   productname like '%女%' and  (productname like '%衣%' or productname like '%恤%'   or productname like '%衫%' or productname like '%夹克%'  ) ",$conn); //查询
$cloth = 0;
while($row = mysql_fetch_array($result))
{ 
$cloth = $row['sum'];
}  


$result = mysql_query("select count(*) as sum from orderlist  where  orderarea ='上海'  and   productname like '%女%' and  (productname like '%裤%' or productname like '%裙%'  )   ",$conn); //查询
$pans = 0;
while($row = mysql_fetch_array($result))
{ 
$pans = $row['sum'];
}  

$result = mysql_query("select count(*) as sum from orderlist  where  orderarea ='上海'  and   (productname like '%女%' and  productname like '%表%') or productname like '%链坠%'  or productname like '%耳饰%'  or productname like '%丝巾%' ) ",$conn); //查询
$woods = 0;
while($row = mysql_fetch_array($result))
{ 
$woods = $row['sum'];
}  

$result = mysql_query("select count(*) as sum from orderlist  where  orderarea ='上海'  and (   productname like '%霜%' or productname like '%乳%'   or productname like '%泥%'   ) ",$conn); //查询
$cometics = 0;
while($row = mysql_fetch_array($result))
{ 
$cometics = $row['sum'];
}  



mysql_close(); //关闭MySQL连接


?>
	   
       <script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title : {
        text: '11月份 上海 女士 购物种类分析',
        subtext: '上海是top one消费城市 所以详细分析该城市的消费习惯',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['鞋','包','衣','裤-裙','饰品','化妆品']
    },
    series : [
        {
            name: '消费分类',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:<?php echo $shoes;?>, name:'鞋'},
                {value:<?php echo $bag;?>, name:'包'},
                {value:<?php echo $cloth;?>, name:'衣'},
                {value:<?php echo $pans;?>, name:'裤-裙'},
                {value:<?php echo $woods;?>, name:'饰品'},
                {value:<?php echo $cometics;?>, name:'化妆品'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
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