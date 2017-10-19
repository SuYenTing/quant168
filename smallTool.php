<?php
include "navbar.html";
?>
<style>
.container {
    width: 80%;
    
}
</style>
<div class="container">
<button onclick="myFunction('smallTool/fctd.html')">外幣定存試算</button>
<button onclick="myFunction('smallTool/ctd.html')">銀行定存試算</button>
<button onclick="myFunction('smallTool/pva.html')">年金現值試算</button>
<button onclick="myFunction('smallTool/fva.html')">年金終值試算</button>
<button onclick="myFunction('smallTool/loan-1.html')">購屋需準備多少錢 </button>
<button onclick="myFunction('smallTool/loan-2.html')">房貸(本金平均攤還)</button>
<button onclick="myFunction('smallTool/loan-3.html')">房貸(本息平均攤還</button>
<button onclick="myFunction('smallTool/loan-4.html')">房貸(多段利率)</button>
<button onclick="myFunction('smallTool/loan-5.html')">房貸(雙週攤還)</button>
<button onclick="myFunction('smallTool/loan-6.html')">貸款利率</button>
<button onclick="myFunction('smallTool/stockreturn.html')">股票報酬率</button>
<button onclick="myFunction('smallTool/fund-1.html')">基金試算(每月定期定額)</button>
<button onclick="myFunction('smallTool/fund-2.html')">基金試算(每年定期定額)</button>
<button onclick="myFunction('smallTool/fund-3.html')">基金試算(單筆投資)</button>
<button onclick="myFunction('smallTool/simple_interest.html')">單利計算</button>
<button onclick="myFunction('smallTool/pvif.html')">複利現值</button>
<button onclick="myFunction('smallTool/fvif.html')">複利終值</button>


<iframe id="iframe" src="smallTool/fctd.html" height="800" width="800" frameborder="0"></iframe>
</div>
<script>
function myFunction(site) {
    document.getElementById("iframe").src = site;
}
</script>
