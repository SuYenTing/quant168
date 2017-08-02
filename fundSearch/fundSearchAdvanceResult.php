<style>
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}
div.tab button {
    background-color: inherit;
    float: left;
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
</style>
</head>
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">資訊總覽</button>
    <button class="tablinks" onclick="openCity(event, 'Paris')">績效表現</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">基金指標</button>
</div>
<div id="London" class="tabcontent">
    <table>
        <tr>
            <th>基金名稱</th>
            <th>淨值</th>
            <th>淨值日</th>
            <th>漲跌幅(%)</th>
            <th>漲跌</th>
            <th>幣別</th>
            <th>標準差</th>
            <th>Sharpe值</th>
            <th>晨星評等</th>
        </tr>
<?php
$sql=$_POST['sql'];
$result=mysql_query("$sql");
for($i=1;$i<=mysql_num_rows($result);$i++){
$rs=mysql_fetch_row($result);
?>
        <tr class="content">
          <td><?php echo $rs[0]?></td>
          <td><?php echo $rs[1]?></td>
          <td><?php echo $rs[2]?></td>
          <td><?php echo $rs[3]?></td>
          <td><?php echo $rs[4]?></td>
          <td><?php echo $rs[5]?></td>
          <td><?php echo $rs[6]?></td>
          <td><?php echo $rs[7]?></td>
          <td><?php echo $rs[8]?></td>
        </tr>
<?php
}
?>
    </table>
</div>
<div id="Paris" class="tabcontent">
    <table>
        <tr>
            <th>基金名稱</th>
            <th>近三月</th>
            <th>近六月</th>
            <th>近一年</th>
            <th>近三年</th>
            <th>近五年</th>
            <th>成立乞今</th>
        </tr>
<?php
$sql=$_POST['sql'];
$result=mysql_query("$sql");
for($i=1;$i<=mysql_num_rows($result);$i++){
$rs=mysql_fetch_row($result);
?>
        <tr class="content">
          <td><?php echo $rs[0]?></td>
          <td><?php echo $rs[9]?></td>
          <td><?php echo $rs[10]?></td>
          <td><?php echo $rs[11]?></td>
          <td><?php echo $rs[12]?></td>
          <td><?php echo $rs[13]?></td>
          <td><?php echo $rs[14]?></td>
        </tr>
<?php
}
?>
    </table>
</div>
<div id="Tokyo" class="tabcontent">
    <table>
        <tr>
            <th>基金名稱</th>
            <th>Adjust Sharpe</th>
            <th>Burke Ratio</th>
            <th>BernardoLedoit Ratio</th>
            <th>D Ratio</th>
            <th>Max Drawdown</th>
            <th>Omega Sharpe</th>
            <th>Pain Ratio</th>
            <th>Skewness kurtosis Ratio</th>
            <th>Sortino Ratio</th>
            <th>Upsidepotential Ratio</th>
        </tr>
<?php
$sql=$_POST['sql'];
$result=mysql_query("$sql");
for($i=1;$i<=mysql_num_rows($result);$i++){
$rs=mysql_fetch_row($result);
?>
        <tr class="content">
          <td><?php echo $rs[0]?></td>
          <td><?php echo substr($rs[15],0,5)?></td>
          <td><?php echo substr($rs[16],0,5)?></td>
          <td><?php echo substr($rs[17],0,5)?></td>
          <td><?php echo substr($rs[18],0,5)?></td>
          <td><?php echo substr($rs[19],0,5)?></td>
          <td><?php echo substr($rs[20],0,5)?></td>
          <td><?php echo substr($rs[21],0,5)?></td>
          <td><?php echo substr($rs[22],0,5)?></td>
          <td><?php echo substr($rs[23],0,5)?></td>
          <td><?php echo substr($rs[24],0,5)?></td>
        </tr>
<?php
}
?>
    </table>
</div>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>