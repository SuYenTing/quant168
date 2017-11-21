


<div>
    <button onclick="formSubmit('stockSearchNewInform1.php')">月營收</button>
    <button onclick="formSubmit('stockSearchNewInform2.php')">月營收年增率</button>
    <button onclick="formSubmit('stockSearchNewInform3.php')">每股盈餘</button>
    <button onclick="formSubmit('stockSearchNewInform4.php')">利潤比率</button>
    <button onclick="formSubmit('stockSearchNewInform5.php')">本益比</button>
    <button onclick="formSubmit('stockSearchNewInform6.php')">殖利率</button>
</div>
<?php if ($_GET['searchType'] == null || $_GET['searchType'] == "") {
    include "stockSearchNewInform/stockSearchNewInform1.php";
} else{
    include "stockSearchNewInform/".$_GET['searchType'];
}?>
<form id="newInformSearch" name="newInformSearch" method="get" action="stockSearchNewInform.php">
  <input type="hidden" name="code" id="code" value="<?php echo $_GET['code']; ?>">
  <input type="hidden" name="searchType" id="searchType">
</form>
<script>
function formSubmit(newInform) {
    document.getElementById("searchType").value = newInform;
    document.getElementById("newInformSearch").submit();
  }
</script>