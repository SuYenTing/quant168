<?php
include("navbar.html");
?>
<style>
.container {
    width: 80%;
}
</style>
<div class="container">
<p>品質型基金</p>
<div>
<button onclick="changeIframe('http://140.119.19.28/quant168/smartbeta/smartbeta5-1.php')">小資</button>
<button onclick="changeIframe('http://140.119.19.28/quant168/smartbeta/smartbeta5-2.php')">退休</button>
<button onclick="changeIframe('http://140.119.19.28/quant168/smartbeta/smartbeta5-3.php')">集資</button>
</div>
<div>
<iframe src="http://140.119.19.28/quant168/smartbeta/smartbeta5-1.php" height="2000" width="1200" id="direction"></iframe>
</div>
</div>
<script type="text/javascript">
    function changeIframe(direction) {
        
        document.getElementById("direction").src = direction;
        }
</script>