<?php
include("navbar.html");
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
?>
<head>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/fundsearch.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <script>
    $( function() {
    var availableTags = [<?php
    $fundName=mysql_query("SELECT * FROM web_data.fund_performance;");
    for($i=1;$i<=mysql_num_rows($fundName);$i++){
        $rsfundName=mysql_fetch_row($fundName);
        echo "\"".$rsfundName[1]."\"".",";
    }?>];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
    });
    </script>
</head>
<div class="container">
    <div class="ui-widget">
        <div class="top" style="text-align:center;">
            <form id="fundsearch" name="fundsearch" method="post" action="fundsearch.php">
                <input id="tags" placeholder="請輸入欲搜尋之基金名稱" name="name" value="<?php echo $_POST['name'];?>">
                <input class="button" type="button" name="button" id="name" onclick="normalSearch()" value="搜尋">
                <select name="invest_type" id="invest_type" class="button" onchange="advanceSearch()">
                    <option disabled selected value> 進階搜尋 </option>
                    <!--<option value="all">全部基金</option>-->
                    <option value="invest_place_in">境內</option>
                    <option value="invest_place_out">境外</option>
                </select>
                <input type="hidden" name="searchType" id="searchType">
                <input type="hidden" name="sql" id="sql">
            </form>
        </div>
    </div>
</div>
<?php if($_POST['searchType']=='basic'||$_POST['searchType']==null){ 
    include("fundSearch/fundRank.php");
} ?>
<div class="container">
<?php if($_POST['searchType']=='advance'){  
    if($_POST['invest_type']=='all'){  
        include("fundSearch/fundSearchAdvanceSearchAll.php");
    } elseif($_POST['invest_type']=='invest_place_in'){ 
        include("fundSearch/fundSearchAdvanceSearchIn.php");
    } elseif($_POST['invest_type']=='invest_place_out'){ 
        include("fundSearch/fundSearchAdvanceSearchOut.php");
    } 
} elseif($_POST['searchType']=='advanceResult'){ 
    include("fundSearch/fundSearchAdvanceResult.php");
} elseif($_POST['searchType']=='normal'&&$_POST['name']!=""){
    include("fundSearch/fundSearchNormal.php");
} ?>
</div>
<script>
function advanceSearch() {
    document.getElementById("searchType").value = "advance";
    document.getElementById("fundsearch").submit();
  }
function normalSearch() {
    document.getElementById("searchType").value = "normal";
    document.getElementById("fundsearch").submit();
  }
</script>
