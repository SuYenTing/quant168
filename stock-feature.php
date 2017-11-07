<?php
include "navbar.html";
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("web_data"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
?>
<head>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/fundsearch.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <style>
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}
div.tab button {
    background-color: inherit;
    float: center;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}
div.tab button:hover {
    background-color: #ddd;
}
div.tab button.active {
    background-color: #ccc;
}
.tabcontent {
    display: none;
    padding: 6px ;
    border: 1px solid #ccc;
    border-top: none;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<div class="container">
<button onclick="rawInformSubmit('stockFeature/stockFeatureTypeList.php')">型態特色榜</button>
<button onclick="rawInformSubmit('stockFeature/stockFeatureKbarList.php')">K棒組合特色榜</button>
<button onclick="rawInformSubmit('stockFeature/stockFeatureForeInvesList.php')">外資動向排行榜</button>
<button onclick="rawInformSubmit('stockFeature/stockFeatureSecuInvesList.php')">投信動向排行榜</button>
<button onclick="rawInformSubmit('stockFeature/stockFeatureSelfEmplList.php')">自營商動向排行榜 </button>
</div>
<script>
function myFunction(site) {
    document.getElementById("iframe").src = site;
}
</script>
<?php
 if ($_POST['searchType'] == 'detail') {
    include $_POST['searchUrl'];
} else if($_POST['searchType'] == 'raw'){   
    include $_POST['searchUrl'];
    /*include "stockFeature/stockFeatureTypeList.php";
    include "stockFeature/stockFeatureKbarList.php";
    include "stockFeature/stockFeatureForeInvesList.php";
    include "stockFeature/stockFeatureSecuInvesList.php";
    include "stockFeature/stockFeatureSelfEmplList.php";*/
}else{
    include "stockFeature/stockFeatureTypeList.php";
}
?>

<form id="moreInformForm" name="moreInformForm" method="post" action="stock-feature.php">
    <input type="hidden" name="searchType" id="searchType" value="detail">
    <input type="hidden" name="searchUrl" id="searchUrl">
</form>
<form id="rawInformForm" name="rawInformForm" method="post" action="stock-feature.php">
    <input type="hidden" name="searchType" id="searchType" value="raw">
    <input type="hidden" name="searchUrl" id="searchUrl">
</form>
</div>
<script type="text/javascript">
function moreInformSubmit(classname) {
    document.getElementById("searchUrl").value = classname;
    document.getElementById("moreInformForm").submit();
}
function rawInformSubmit(classname) {
    document.getElementById("searchUrl").value = classname;
    document.getElementById("moreInformForm").submit();
}
</script>