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

 
include_once('./db.conf.php');
$result = mysql_query("select orderarea,count(*) as sum from orderlist group by orderarea ;  ",$conn); //查询
$str = "";
while($row = mysql_fetch_array($result))
{ 
//{name: '合肥', value: 229},
$str .= "{name: '".$row['orderarea']."', value: ".($row['sum']/10)."},";
//echo $row['ordernum']."----".$row['productname']."----".$row['productprice']."----".$row['paytype']."----".$row['paymenttype']."----".$row['orderarea']."----".$row['date']."\n";
}
mysql_close(); //关闭MySQL连接
$str = substr($str ,0, strlen($str)-1); 


?>	   
	   
	   
       <script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
var data = [
    <?php echo $str ;?>
];
var geoCoordMap = {
    '安徽':[117.27,31.86],
    '北京':[116.46,39.92], 
    '福建':[119.3,26.08],
    '甘肃':[103.73,36.03],
    '广东':[113.23,23.16],
    '广西':[108.33,22.84],	 
    '贵州':[106.71,26.57],	
    '海南':[110.35,20.02],	
    '河北':[114.48,38.03],	
    '河南':[113.65,34.76],	
    '黑龙江':[126.63,45.75],	
    '湖北':[114.31,30.52],	
    '湖南':[113,28.21],	
    '吉林':[125.35,43.88],	
	'江苏':[118.78,32.04],
    '江西':[115.89,28.68],	
    '辽宁':[123.38,41.8],	
    '内蒙古':[111.65,40.82],	
    '宁夏':[106.27,38.47],	
    '青海':[101.74,36.56],	
    '山东':[117,36.65],	
    '山西':[112.53,37.87],	
    '陕西':[108.95,34.27],
    '上海':[121.48,31.22],
    '四川':[104.06,30.67],
    '天津':[117.2,39.13],
    '西藏':[91.11,29.97],
    '新疆':[87.68,43.77],
    '云南':[102.73,25.04],
	'杭州':[120.19,30.26],
    '重庆':[106.54,29.59]
};

var convertData = function (data) {
    var res = [];
    for (var i = 0; i < data.length; i++) {
        var geoCoord = geoCoordMap[data[i].name];
        if (geoCoord) {
            res.push({
                name: data[i].name,
                value: geoCoord.concat(data[i].value)
            });
        }
    }
    return res;
};

option = {
    backgroundColor: '#404a59',
    title: {
        text: '11月份交易信息地域分布',
        subtext: '省市交易数据汇总',
        sublink: '#',
        left: 'center',
        textStyle: {
            color: '#fff'
        }
    },
    tooltip : {
        trigger: 'item'
    },
    legend: {
        orient: 'vertical',
        y: 'bottom',
        x:'right',
        data:['pm2.5'],
        textStyle: {
            color: '#fff'
        }
    },
    geo: {
        map: 'china',
        label: {
            emphasis: {
                show: false
            }
        },
        roam: true,
        itemStyle: {
            normal: {
                areaColor: '#323c48',
                borderColor: '#111'
            },
            emphasis: {
                areaColor: '#2a333d'
            }
        }
    },
    series : [
        {
            name: 'pm2.5',
            type: 'scatter',
            coordinateSystem: 'geo',
            data: convertData(data),
            symbolSize: function (val) {
                return val[2] / 10;
            },
            label: {
                normal: {
                    formatter: '{b}',
                    position: 'right',
                    show: false
                },
                emphasis: {
                    show: true
                }
            },
            itemStyle: {
                normal: {
                    color: '#ddb926'
                }
            }
        },
        {
            name: 'Top 5',
            type: 'effectScatter',
            coordinateSystem: 'geo',
            data: convertData(data.sort(function (a, b) {
                return b.value - a.value;
            }).slice(0, 6)),
            symbolSize: function (val) {
                return val[2] / 10;
            },
            showEffectOn: 'render',
            rippleEffect: {
                brushType: 'stroke'
            },
            hoverAnimation: true,
            label: {
                normal: {
                    formatter: '{b}',
                    position: 'right',
                    show: true
                }
            },
            itemStyle: {
                normal: {
                    color: '#f4e925',
                    shadowBlur: 10,
                    shadowColor: '#333'
                }
            },
            zlevel: 1
        }
    ]
};;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
       </script>
   </body>
</html>