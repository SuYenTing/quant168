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
					<input type="radio" name="type" id="type" value="eachPeriodInvested" checked onchange="typeFunc('eachPeriodInvested')"> 每期投資金額
                    <input type="radio" name="type" id="type" value="finalCount" onchange="typeFunc('finalCount')"> 期滿累積金額
                    <input type="hidden" name="types" id="types" value="eachPeriodInvested">
				</td>
			</tr>
			<tr>
				<td>存款頻率</td>
				<td>
					<input type="radio" name="frequency" id="frequency" value="monthly" checked onchange="freqFunc('monthly')"> 每月
                    <input type="radio" name="frequency" id="frequency" value="seasonly" onchange="freqFunc('seasonly')"> 每季
                    <input type="radio" name="frequency" id="frequency" value="yearly" onchange="freqFunc('yearly')"> 每年
                    <input type="hidden" name="frequence" id="frequence" value="monthly">
				</td>
			</tr>
			<tr>
				<td>現有資金金額</td>
				<td>$
                    <input type="number" id="cash" value=100000>
                </td>
                <td>期滿累積金額</td>
                <td>$
                    <select id="amountAccum" >
                        <option value="10000">$10,000</option>
						<option value="20000">$20,000</option>
						<option value="30000">$30,000</option>
						<option value="40000">$40,000</option>
						<option value="50000">$50,000</option>
						<option value="60000">$60,000</option>
						<option value="70000">$70,000</option>
						<option value="80000">$80,000</option>
						<option value="90000">$90,000</option>
						<option value="100000">$100,000</option>
						<option value="110000">$110,000</option>
						<option value="120000">$120,000</option>
						<option value="130000">$130,000</option>
						<option value="140000">$140,000</option>
						<option value="150000">$150,000</option>
						<option value="160000">$160,000</option>
						<option value="170000">$170,000</option>
						<option value="180000">$180,000</option>
						<option value="190000">$190,000</option>
						<option value="200000">$200,000</option>
						<option value="210000">$210,000</option>
						<option value="220000">$220,000</option>
						<option value="230000">$230,000</option>
						<option value="240000">$240,000</option>
						<option value="250000">$250,000</option>
						<option value="260000">$260,000</option>
						<option value="270000">$270,000</option>
						<option value="280000">$280,000</option>
						<option value="290000">$290,000</option>
						<option value="300000" selected>$300,000</option>
						<option value="310000">$310,000</option>
						<option value="320000">$320,000</option>
						<option value="330000">$330,000</option>
						<option value="340000">$340,000</option>
						<option value="350000">$350,000</option>
						<option value="360000">$360,000</option>
						<option value="370000">$370,000</option>
						<option value="380000">$380,000</option>
						<option value="390000">$390,000</option>
						<option value="400000">$400,000</option>
						<option value="410000">$410,000</option>
						<option value="420000">$420,000</option>
						<option value="430000">$430,000</option>
						<option value="440000">$440,000</option>
						<option value="450000">$450,000</option>
						<option value="460000">$460,000</option>
						<option value="470000">$470,000</option>
						<option value="480000">$480,000</option>
						<option value="490000">$490,000</option>
						<option value="500000">$500,000</option>
                    </select>
                </td>
			</tr>
		</table>
		<button type="button" class="button button4" onclick="calculate()">開始計算</button>

		<p>output</p>
		<table>
			<tr>
				<td>每期應繳金額</td>
				<td><p id="amountShouldPay">$0</p></td>
			</tr>
		</table>
	</div>
	</body>










	<script type="text/javascript">

	function typeFunc(type) {
		document.getElementById("types").value = type;

		// var container = document.getElementById("container");
		// var tr = container.insertRow();
		// var td1 = tr.insertCell();
		// td1.appendChild(document.createTextNode("存款頻率"));
		// td1.style.border = '1px solid black';
		// var td2 = tr.insertCell();




	}

	function freqFunc(frequency) {
		document.getElementById("frequence").value = frequency;
	}

	function calculate() {
		var freq = document.getElementById("frequence").value;
		var roi = parseFloat(document.getElementById("roi").value) / 100;
		var investYear = parseInt(document.getElementById("investYear").value);
		var cash = document.getElementById("cash").value;
		var amountAccum = parseInt(document.getElementById("amountAccum").value);
		var j = 0;
		var amountShouldPay = 0;


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

	}
















	</script>




</html>