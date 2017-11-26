
<div>
    <button onclick="formSubmit('stockSearchFinState1.php')">損益表</button>
    <button onclick="formSubmit('stockSearchFinState2.php')">資產負債表</button>
    <button onclick="formSubmit('stockSearchFinState3.php')">現金流量表</button>
</div>

<?php if ($_GET['searchType'] == null || $_GET['searchType'] == "") {
    include "stockSearchFinState/stockSearchFinState1.php";
} else{
    include "stockSearchFinState/".$_GET['searchType'];
}?>
<form id="finStateSearch" name="finStateSearch" method="get" action="stockSearchFinState.php">
  <input type="hidden" name="code" id="code" value="<?php echo $_GET['code']; ?>">
  <input type="hidden" name="searchType" id="searchType">
</form>
<script>
function formSubmit(finState) {
    document.getElementById("searchType").value = finState;
    document.getElementById("finStateSearch").submit();
}
</script>