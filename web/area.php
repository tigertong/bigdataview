<!DOCTYPE html>
<html><head>
<?php
$uri = $_GET['uri'];

if(!isset($uri)) $uri = "editor.php";
?>

<meta http-equiv="content-type" content="text/html; charset=UTF-8"><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1" user-scalable="no"><meta name="description" content="ECharts, a powerful, interactive charting and visualization library for browser"><link rel="shortcut icon" href="http://echarts.baidu.com/images/favicon.png"><link rel="stylesheet" type="text/css" href="images/bootstrap.css"><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--><link rel="stylesheet" type="text/css" href="images/main.css"><script src="images/hm.js"></script><script type="text/javascript" src="images/pace.js"></script><style>@font-face {font-family:"noto-thin";src:local("Microsoft Yahei");}@font-face {font-family:"noto-light";src:local("Microsoft Yahei");}</style><script id="font-hack" type="text/javascript">if (/windows/i.test(navigator.userAgent)) {
    var el = document.createElement('style');
    el.innerHTML = ''
        + '@font-face {font-family:"noto-thin";src:local("Microsoft Yahei");}'
        + '@font-face {font-family:"noto-light";src:local("Microsoft Yahei");}';
    document.head.insertBefore(el, document.getElementById('font-hack'));
}
</script><title>ECharts Examples</title><link rel="stylesheet" href="images/perfect-scrollbar.css"><script type="text/javascript" src="images/jquery.js"></script></head><!--[if lte IE 8]>
<body class="lower-ie">
<![endif]-->
<!--[if (gt IE 8)|!(IE)]><body class="undefined"></body><![endif]--><body class="  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
  <div class="pace-progress-inner"></div>
</div>


<div class="pace-activity"></div></div><div id="lowie-main"><img src="images/forie.png" alt="ie tip"></div><div id="main"><nav class="navbar navbar-default navbar-fixed-top"><div class="container-fluid"><div class="navbar-header"><button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand"><img src="images/logo.png" alt="echarts logo" class="navbar-logo"></a></div><div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse"></div></div></nav><div id="left-chart-nav" class="ps-container ps-active-y" data-ps-id="cd51830a-18d9-888b-a319-22a62c0c439f"><ul><li><a class="left-chart-nav-link" id="left-chart-nav-scatter" href="area.php?uri=editor.php"><div class="chart-icon"></div><div class="chart-name">地域分布</div>
</a></li><li><a class="left-chart-nav-link" id="left-chart-nav-line" href="area.php?uri=trend.php"><div class="chart-icon"></div><div class="chart-name">交易趋势</div>
</a></li><li><a class="left-chart-nav-link" id="left-chart-nav-bar" href="area.php?uri=line.php"><div class="chart-icon"></div><div class="chart-name">性别分析</div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-map" href="area.php?uri=pie.php"><div class="chart-icon"></div><div class="chart-name">分类追踪</div>
</a></li><li><a class="left-chart-nav-link" id="left-chart-nav-pie" href="area.php?uri=pie-nest.php"><div class="chart-icon"></div><div class="chart-name">渠道分析</div>
</a></li><li><a class="left-chart-nav-link" id="left-chart-nav-radar"><div class="chart-icon"></div><div class="chart-name">###</div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-candlestick"><div class="chart-icon"></div><div class="chart-name">###</div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-boxplot"><div class="chart-icon"></div><div class="chart-name">###</div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-heatmap"><div class="chart-icon"></div><div class="chart-name"></div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-graph"><div class="chart-icon"></div><div class="chart-name"></div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-treemap"><div class="chart-icon"></div><div class="chart-name"></div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-parallel"><div class="chart-icon"></div><div class="chart-name"></div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-sankey"><div class="chart-icon"></div><div class="chart-name"></div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-funnel"><div class="chart-icon"></div><div class="chart-name"></div></a></li><li><a class="left-chart-nav-link" id="left-chart-nav-gauge"><div class="chart-icon"></div><div class="chart-name"></div></a></li></ul><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 692px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 591px;"></div></div></div><div id="nav-mask"></div><!--div id="nav-layer" class="ps-container" data-ps-id="d1f3dc86-88ff-1028-a5ce-0aa400a2a97c"><ul class="chart-list"></ul><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div --><div id="chart-demo"><iframe src="<?php echo $uri;?>"></iframe></div></div><script type="text/javascript" src="images/bootstrap.js"></script><script type="text/javascript" src="images/validator.js"></script><script type="text/javascript" src="images/waypoint.js"></script><script type="text/javascript" src="images/lodash.js"></script><script type="text/javascript" src="images/perfect-scrollbar.js"></script><script type="text/javascript">var GALLERY_PATH = './';
console.log(GALLERY_PATH);
var GALLERY_EDITOR_PATH = GALLERY_PATH + '<?php echo $uri;?>?c=';
var GALLERY_VIEW_PATH = GALLERY_PATH + 'view.html?c=';
var GALLERY_THUMB_PATH = GALLERY_PATH + 'data/thumb/';
</script><script type="text/javascript" src="images/config.js"></script><script type="text/javascript" src="images/examples-nav.js"></script><script type="text/javascript">document.getElementById('nav-examples').className = 'active';
function loadDemo() {
    var chartId = location.hash.slice(1);
    $('#chart-demo').html('<iframe src="' + GALLERY_EDITOR_PATH + chartId + '"></iframe>');
}

$(window).on('hashchange', function () {
    loadDemo();
});
loadDemo();</script><script type="text/javascript" src="images/hm_002.js"></script></body></html>