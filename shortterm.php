<?php 

include("navbar.html");

$currentAge = $_POST['currentAge'];
$gender = $_POST['gender'];
$vocation = $_POST['vocation'];
$goal = $_POST['goal'];

?>

<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">

		<style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            /*border: 1px solid black;*/
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            /*border: 1px solid black;*/
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
            /*border: 1px solid black;*/
        }
        .button {
		    background-color: #4CAF50; /* Green */
		    border: none;
		    color: white;
		    padding: 6px 12px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin: 4px 2px;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    cursor: pointer;
		}
		.button4 {
		    background-color: white;
		    color: black;
		    border: 2px solid #e7e7e7;
		}

		.button4:hover {background-color: #e7e7e7;}
    	</style>


	</head>
	<body>
	<style>
        .container {
            width: 60%;
        }
    </style>
	<div class="container">
		<p>基本資料</p>
		<table>
			<tr>
				<td>目前年齡</td>
				<td>
                    <select name="currentAge" id="currentAge">
                    <option value="20" <?php if($currentAge ==20) {echo "selected";}?>>20</option>
                    <option value="21" <?php if($currentAge ==21) {echo "selected";}?>>21</option>
                    <option value="23" <?php if($currentAge ==23) {echo "selected";}?>>23</option>
                    <option value="24" <?php if($currentAge ==24) {echo "selected";}?>>24</option>
                    <option value="25" <?php if($currentAge ==25) {echo "selected";}?>>25</option>
                    <option value="26" <?php if($currentAge ==26) {echo "selected";}?>>26</option>
                    <option value="27" <?php if($currentAge ==27) {echo "selected";}?>>27</option>
                    <option value="28" <?php if($currentAge ==28) {echo "selected";}?>>28</option>
                    <option value="29" <?php if($currentAge ==29) {echo "selected";}?>>29</option>
                    <option value="30" <?php if($currentAge ==30) {echo "selected";}?>>30</option>
                    <option value="31" <?php if($currentAge ==31) {echo "selected";}?>>31</option>
                    <option value="32" <?php if($currentAge ==32) {echo "selected";}?>>32</option>
                    <option value="33" <?php if($currentAge ==33) {echo "selected";}?>>33</option>
                    <option value="34" <?php if($currentAge ==34) {echo "selected";}?>>34</option>
                    <option value="35" <?php if($currentAge ==35) {echo "selected";}?>>35</option>
                    <option value="36" <?php if($currentAge ==36) {echo "selected";}?>>36</option>
                    <option value="37" <?php if($currentAge ==37) {echo "selected";}?>>37</option>
                    <option value="38" <?php if($currentAge ==38) {echo "selected";}?>>38</option>
                    <option value="39" <?php if($currentAge ==39) {echo "selected";}?>>39</option>
                    <option value="40" <?php if($currentAge ==40) {echo "selected";}?>>40</option>
                    <option value="41" <?php if($currentAge ==41) {echo "selected";}?>>41</option>
                    <option value="42" <?php if($currentAge ==42) {echo "selected";}?>>42</option>
                    <option value="43" <?php if($currentAge ==43) {echo "selected";}?>>43</option>
                    <option value="44" <?php if($currentAge ==44) {echo "selected";}?>>44</option>
                    <option value="45" <?php if($currentAge ==45) {echo "selected";}?>>45</option>
                    <option value="46" <?php if($currentAge ==46) {echo "selected";}?>>46</option>
                    <option value="47" <?php if($currentAge ==47) {echo "selected";}?>>47</option>
                    <option value="48" <?php if($currentAge ==48) {echo "selected";}?>>48</option>
                    <option value="49" <?php if($currentAge ==49) {echo "selected";}?>>49</option>
                    <option value="50" <?php if($currentAge ==50) {echo "selected";}?>>50</option>
                    <option value="51" <?php if($currentAge ==51) {echo "selected";}?>>51</option>
                    <option value="52" <?php if($currentAge ==52) {echo "selected";}?>>52</option>
                    <option value="53" <?php if($currentAge ==53) {echo "selected";}?>>53</option>
                    <option value="54" <?php if($currentAge ==54) {echo "selected";}?>>54</option>
                    <option value="55" <?php if($currentAge ==55) {echo "selected";}?>>55</option>
                    <option value="56" <?php if($currentAge ==56) {echo "selected";}?>>56</option>
                    <option value="57" <?php if($currentAge ==57) {echo "selected";}?>>57</option>
                    <option value="58" <?php if($currentAge ==58) {echo "selected";}?>>58</option>
                    <option value="59" <?php if($currentAge ==59) {echo "selected";}?>>59</option>
                    <option value="60" <?php if($currentAge ==60) {echo "selected";}?>>60</option>
                    </select>
                歲</td>
                <td>投資期間(年)</td>
                <td>
                	<select name="investYear" id="investYear">
                	<option value="1">1</option>
                	<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6" selected>6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
                </td>
                <td>投資報酬率</td>
                <td>
                	<select id="roi" >
                        <option value="0.2">0.2%</option>
                        <option value="0.2">0.2%</option>
                        <option value="0.4">0.4%</option>
                        <option value="0.6">0.6%</option>
                        <option value="0.8">0.8%</option>
                        <option value="1.0">1.0%</option>
                        <option value="1.2">1.2%</option>
                        <option value="1.4">1.4%</option>
                        <option value="1.6">1.6%</option>
                        <option value="1.8">1.8%</option>
                        <option value="2.0">2.0%</option>
                        <option value="2.2">2.2%</option>
                        <option value="2.4">2.4%</option>
                        <option value="2.6">2.6%</option>
                        <option value="2.8">2.8%</option>
                        <option value="3.0">3.0%</option>
                        <option value="3.2">3.2%</option>
                        <option value="3.4">3.4%</option>
                        <option value="3.6">3.6%</option>
                        <option value="3.8">3.8%</option>
                        <option value="4.0">4.0%</option>
                        <option value="4.2">4.2%</option>
                        <option value="4.4">4.4%</option>
                        <option value="4.6">4.6%</option>
                        <option value="4.8">4.8%</option>
                        <option value="5.0" selected>5.0%</option>
                        <option value="5.2">5.2%</option>
                        <option value="5.4">5.4%</option>
                        <option value="5.6">5.6%</option>
                        <option value="5.8">5.8%</option>
                        <option value="6.0">6.0%</option>
                        <option value="6.2">6.2%</option>
                        <option value="6.4">6.4%</option>
                        <option value="6.6">6.6%</option>
                        <option value="6.8">6.8%</option>
                        <option value="7.0">7.0%</option>
                        <option value="7.2">7.2%</option>
                        <option value="7.4">7.4%</option>
                        <option value="7.6">7.6%</option>
                        <option value="7.8">7.8%</option>
                        <option value="8.0">8.0%</option>
                        <option value="8.2">8.2%</option>
                        <option value="8.4">8.4%</option>
                        <option value="8.6">8.6%</option>
                        <option value="8.8">8.8%</option>
                        <option value="9.0">9.0%</option>
                        <option value="9.2">9.2%</option>
                        <option value="9.4">9.4%</option>
                        <option value="9.6">9.6%</option>
                        <option value="9.8">9.8%</option>
                        <option value="10.0">10.0%</option>
                        </select>
                </td>
			</tr>
			<tr>
				<td>預計算項目</td>
				<td>
					<input type="radio" name="type" id="type" value="eachPeriodInvested" checked onchange="typeFunc('eachPeriodInvested'); eachPeriodInvestedFunc()"> 每期投資金額
                    <input type="radio" name="type" id="type" value="finalCount" onchange=" typeFunc('finalCount'); finalCount()"> 期滿累積金額
                    <input type="hidden" name="types" id="types" value="eachPeriodInvested">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>存款頻率</td>
				<td>
					<input type="radio" name="frequency" id="frequency" value="monthly" checked onchange="freqFunc('monthly')"> 每月
                    <input type="radio" name="frequency" id="frequency" value="seasonly" onchange="freqFunc('seasonly')"> 每季
                    <input type="radio" name="frequency" id="frequency" value="yearly" onchange="freqFunc('yearly')"> 每年
                    <input type="hidden" name="frequence" id="frequence" value="monthly">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>現有資金金額</td>
				<td>$
                    <input type="number" id="cash" value=100000>
                </td>
                <td id="a"></td>
                <td><div id="b"></div>
                </td>
                <td></td>
                <td></td>
			</tr>
		</table>
		<button type="button" class="button button4" onclick="calculate()">開始計算</button>

		<p>output</p>
		<table>
			<tr>
				<td id="c">每期應繳金額</td>
				<td><p id="amountShouldPay">$0</p></td>
			</tr>
		</table>
	</div>
	</body>










	<script type="text/javascript">

	function eachPeriodInvestedFunc(){

		document.getElementById("a").innerHTML = "期滿累積金額";
		document.getElementById("c").innerHTML = "每期應繳金額";

		var b = document.getElementById("b");
	    while(b.hasChildNodes()){
	                b.removeChild(b.firstChild);
	            }

	    //Create array of options to be added
	    var aArray = ["10000","20000","30000","40000","50000","60000","70000","80000","90000","100000","110000","120000","130000","140000","150000","160000","170000","180000","190000","200000","210000","220000","230000","240000","250000","260000","270000","280000","290000","300000","310000","320000","330000","340000","350000","360000","370000","380000","390000","400000","410000","420000","430000","440000","450000","460000","470000","480000","490000","500000"];

	    //Create and append select list
	    var aList = document.createElement("select");
	    aList.id = "amountAccum";
	    b.appendChild(aList);

	    //Create and append the options
	    for (var i = 0; i < aArray.length; i++) {
	        var aOption = document.createElement("option");
	        aOption.value = aArray[i];
	        aOption.text = aArray[i];
	        aList.appendChild(aOption);
	    }

	}
	function finalCount(){

		document.getElementById("a").innerHTML = "每期投資金額";
		document.getElementById("c").innerHTML = "期滿累積金額";

		var b = document.getElementById("b");
	    while(b.hasChildNodes()){
	                b.removeChild(b.firstChild);
	            }

	    //Create array of options to be added
	    var bArray = ["1000","2000","3000","4000","5000","6000","7000","8000","9000","10000","11000","12000","13000","14000","15000","16000","17000","18000","19000","20000","21000","22000","23000","24000","25000","26000","27000","28000","29000","30000"];

	    //Create and append select list
	    var bList = document.createElement("select");
	    bList.id = "periodInvest";
	    b.appendChild(bList);

	    //Create and append the options
	    for (var i = 0; i < bArray.length; i++) {
	        var bOption = document.createElement("option");
	        bOption.value = bArray[i];
	        bOption.text = bArray[i];
	        bList.appendChild(bOption);
	    }

	}
	function typeFunc(type){
		document.getElementById("types").value = type;
	}

	function freqFunc(frequency) {
		document.getElementById("frequence").value = frequency;
	}

	function calculate() {
		var freq = document.getElementById("frequence").value;
		var roi = parseFloat(document.getElementById("roi").value) / 100;
		var investYear = parseInt(document.getElementById("investYear").value);
		var cash = document.getElementById("cash").value;
		var type = document.getElementById("types").value;
		var j = 0;
		var amountShouldPay = 0;

		if(type == "eachPeriodInvested"){

			var amountAccum = parseInt(document.getElementById("amountAccum").value);

			if(freq == "monthly"){

				j = Math.pow((1+roi),1/12)-1;
				amountShouldPay = (amountAccum - (cash*(Math.pow((1+j),12*investYear))))/(((Math.pow((1+j),12*investYear)-1)/j)*(1+j));
				document.getElementById("amountShouldPay").innerHTML = "$" + Math.round(amountShouldPay);

			}else if (freq == "seasonly") {

				j = Math.pow((1+roi),1/4)-1;
				amountShouldPay = (amountAccum - (cash*(Math.pow((1+j),4*investYear))))/(((Math.pow((1+j),4*investYear)-1)/j)*(1+j));
				document.getElementById("amountShouldPay").innerHTML = "$" + Math.round(amountShouldPay);

			}else{

				j = roi;
				amountShouldPay = (amountAccum - (cash*(Math.pow((1+j),investYear))))/(((Math.pow((1+j),investYear)-1)/j)*(1+j));
				document.getElementById("amountShouldPay").innerHTML = "$" + Math.round(amountShouldPay);
			}

		}else if (type == "finalCount") {

			var periodInvest = parseInt(document.getElementById("periodInvest").value);

			if(freq == "monthly"){
								
				j = Math.pow((1+roi),1/12)-1;
				amountShouldPay = cash * (Math.pow((1+j),(12*investYear))) + (periodInvest * (1+j) * (Math.pow((1+j),(12*investYear - 1))))/j;
				document.getElementById("amountShouldPay").innerHTML = "$" + Math.round(amountShouldPay);

			}else if (freq == "seasonly") {
				
				j = Math.pow((1+roi),1/4)-1;
				amountShouldPay = cash * (Math.pow((1+j),(4*investYear))) + (periodInvest * (1+j) * (Math.pow((1+j),(4*investYear - 1))))/j;
				document.getElementById("amountShouldPay").innerHTML = "$" + Math.round(amountShouldPay);

			}else{
				
				j = roi;
				amountShouldPay = cash * (Math.pow((1+j),(1*investYear))) + (periodInvest * (1+j) * (Math.pow((1+j),(1*investYear - 1))))/j;
				document.getElementById("amountShouldPay").innerHTML = "$" + Math.round(amountShouldPay);

			}

		}

	}
















	</script>




</html>