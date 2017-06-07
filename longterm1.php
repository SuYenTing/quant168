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
        
    </style>
	</head>

	<body>
	<style>
        .container {
            width: 70%;
        }
    </style>
<div class="container">
		<p>input</p>
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
				<td>開始工作年齡</td>
				<td>
					<select name="workAge" id="workAge">
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25" selected>25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35</option>
						<option value="36">36</option>
						<option value="37">37</option>
						<option value="38">38</option>
						<option value="39">39</option>
						<option value="40">40</option>
						<option value="41">41</option>
						<option value="42">42</option>
						<option value="43">43</option>
						<option value="44">44</option>
						<option value="45">45</option>
						<option value="46">46</option>
						<option value="47">47</option>
						<option value="48">48</option>
						<option value="49">49</option>
						<option value="50">50</option>
						<option value="51">51</option>
						<option value="52">52</option>
						<option value="53">53</option>
						<option value="54">54</option>
						<option value="55">55</option>
						<option value="56">56</option>
						<option value="57">57</option>
						<option value="58">58</option>
						<option value="59">59</option>
						<option value="60">60</option>
					</select>
				歲</td>
				<td>預計退休年齡</td>
				<td>
					<select id="retireAge" onchange="lifeLeftFunc()">
						<option value="55">55</option>
						<option value="56">56</option>
						<option value="57">57</option>
						<option value="58">58</option>
						<option value="59">59</option>
						<option value="60">60</option>
						<option value="61">61</option>
						<option value="62">62</option>
						<option value="63">63</option>
						<option value="64">64</option>
						<option value="65">65</option>
						<option value="66">66</option>
						<option value="67">67</option>
						<option value="68">68</option>
						<option value="69">69</option>
						<option value="70"selected>70</option>
					</select>
				歲</td>
			</tr>
			<tr>
				<td>性別</td>
				<td>
					<input type="radio" name="sex" value="male" <?php if($gender == "male"){echo "checked";}?> 
					onchange="genderFunc('male')"> 男
					<input type="radio" name="sex" value="female" <?php if($gender == "female"){echo "checked";}?> 
					onchange="genderFunc('female')"> 女
					<input type="hidden" name="gender" id="gender" value="male">
				</td>
				<td>起薪</td>
				<td>$
					<input type="number" id="wage" value=40000>
				</td>
				<td>薪資成長率</td>
				<td>
					<select id="wageGrowth" >
						<option value="0.5">0.5%</option>
						<option value="1.0">1.0%</option>
						<option value="1.5">1.5%</option>
						<option value="2.0">2.0%</option>
						<option value="2.5">2.5%</option>
						<option value="3.0">3.0%</option>
						<option value="3.5">3.5%</option>
						<option value="4.0"selected>4.0%</option>
						<option value="4.5">4.5%</option>
						<option value="5.0">5.0%</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>雇主提撥</td>
				<td>6%</td>
				<td>自行提撥</td>
				<td>
					<select id="selfGather" onchange="totalGatherFunc()">
						<option value="0">0%</option>
						<option value="1">1%</option>
						<option value="2">2%</option>
						<option value="3">3%</option>
						<option value="4">4%</option>
						<option value="5"selected>5%</option>
						<option value="6">6%</option>
					</select>
				</td>
				<td>總共提撥</td>
				<td>
				<input type="number" id="totalGather" value=11 readonly>%</td>
			</tr>
			<tr>
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
					<td>期望退休後月領金額</td>
					<td>$
					<select id="amountWanted" >
						<option value="20000">$20,000</option>
						<option value="25000" selected>$25,000</option>
						<option value="30000">$30,000</option>
						<option value="35000">$35,000</option>
						<option value="40000">$40,000</option>
						<option value="45000">$45,000</option>
						<option value="50000">$50,000</option>
						<option value="55000">$55,000</option>
						<option value="60000">$60,000</option>
						<option value="65000">$65,000</option>
						<option value="70000">$70,000</option>
						<option value="75000">$75,000</option>
						<option value="80000">$80,000</option>
						<option value="85000">$85,000</option>
						<option value="90000">$90,000</option>
						<option value="95000">$95,000</option>
						<option value="100000">$100,000</option>
					</select>
						
					</td>
					<td>退休時平均餘命</td>
					<td>
					<input type="number" id="lifeLeft" value=13 readonly>歲</td>
				</tr>
			</table>

			<button type="button" onclick="caculate()" class="button button4">開始計算</button>

			<p>output</p>
			<table>
				<tr>
					<th></th>
					<th>I.政府退休金</th>
					<th>II.雇主責任</th>
					<th>III.自行提撥</th>
					<th>加總金額</th>
				</tr>
				<tr>
					<td>平均月領金額</td>
					<td>
						<p id="w">$0</p>
					</td>
					<td>
						<p id="emplAver">$0</p>
					</td>
					<td>
						<p id="selfAver">$0</p>
					</td>
					<td>
						<p id="totalAver">$0</p>
					</td>
				</tr>
				<tr>
					<td>總累積金額</td>
					<td>
						<p id="v">$0</p>
					</td>
					<td>
						<p id="emplTotal">$0</p>
					</td>
					<td>
						<p id="selfTotal">$0</p>
					</td>
					<td>
						<p id="totalTotal">$0</p>
					</td>
				</tr>
			</table>
			<div id="accountTable"></div>
			</div>
		</body>
		<script>
		function totalGatherFunc() {
		var totalGather = parseInt(document.getElementById("selfGather").value) + 6;
		document.getElementById("totalGather").value = totalGather;
		}
		function genderFunc(gender) {
		document.getElementById("gender").value = gender;
		lifeLeftFunc();
		}
		function caculate() {

		var currentAge = parseInt(document.getElementById("currentAge").value);
		var workAge = parseInt(document.getElementById("workAge").value);
		var retireAge = parseInt(document.getElementById("retireAge").value);
		var gender = document.getElementById("gender").value;
		var wage = document.getElementById("wage").value;
		var wageGrowth = parseFloat(document.getElementById("wageGrowth").value) / 100;
		var emplGather = 0.06;
		var selfGather = parseFloat(document.getElementById("selfGather").value) / 100;
		var totalGather = emplGather + selfGather;
		var roi = parseFloat(document.getElementById("roi").value) / 100;
		var amountWanted = parseInt(document.getElementById("amountWanted").value);
		var lifeLeft = parseInt(document.getElementById("lifeLeft").value);
		var emplTotal = wage * emplGather * ((Math.pow((1 + (roi - wageGrowth) / 12), ((retireAge - workAge) * 12)) - 1) / ((roi - wageGrowth) / 12));
		var selfTotal = wage * selfGather * ((Math.pow((1 + (roi - wageGrowth) / 12), ((retireAge - workAge) * 12)) - 1) / ((roi - wageGrowth) / 12));
		var totalTotal = emplTotal + selfTotal;
		var emplAver = emplTotal / (((1 + (roi / 12) * 1) * ((Math.pow((1 + (roi / 12)), (lifeLeft * 12)) - 1) / (roi / 12))));
		var selfAver = selfTotal / (((1 + (roi / 12) * 1) * ((Math.pow((1 + (roi / 12)), (lifeLeft * 12)) - 1) / (roi / 12))));
		var totalAver = emplAver + selfAver;

		var z = retireAge - workAge;
		var y1 = Math.min((wage * Math.pow((1 + ( wageGrowth/12 )), z)), 45800);
		var y2 = Math.min((wage * Math.pow((1 + ( wageGrowth/12 )), z - 1)), 45800);
		var y3 = Math.min((wage * Math.pow((1 + ( wageGrowth/12 )), z - 2)), 45800);
		var y4 = Math.min((wage * Math.pow((1 + ( wageGrowth/12 )), z - 3)), 45800);
		var y5 = Math.min((wage * Math.pow((1 + ( wageGrowth/12 )), z - 4)), 45800);
		var x = (y1 + y2 + y3 + y4 + y5)/5;
		var w = Math.max(((x * z * 0.00775) + 3000), (x * z * 0.0155));
		var v = w * (1 - Math.pow( (1/(1 + (roi/12))), ((retireAge - lifeLeft)*12)))/(roi/12);

		// alert( w * (1 - Math.pow( (1/(1 + (roi/12))), ((retireAge - lifeLeft)*12)))/(roi/12) );

		document.getElementById("w").innerHTML = "$" + Math.round(w);
		document.getElementById("v").innerHTML = "$" + Math.round(v);
		document.getElementById("emplAver").innerHTML = "$" + Math.round(emplAver);
		document.getElementById("selfAver").innerHTML = "$" + Math.round(selfAver);
		document.getElementById("totalAver").innerHTML = "$" + Math.round(totalAver);
		document.getElementById("emplTotal").innerHTML = "$" + Math.round(emplTotal);
		document.getElementById("selfTotal").innerHTML = "$" + Math.round(selfTotal);
		document.getElementById("totalTotal").innerHTML = "$" + Math.round(totalTotal);


		//create account table
		var accountTable = document.getElementById("accountTable");

		colname = document.createElement('p');
		var t = document.createTextNode('account table');
		colname.appendChild(document.createTextNode('account table'));


		tbl = document.createElement('table');
		tbl.style.width = '500px';
		tbl.style.border = '1px solid black';
		// tbl.align = 'center';

		var trh = tbl.insertRow();
		var th1 = trh.insertCell();
		th1.appendChild(document.createTextNode("年齡"));
		th1.style.border = '1px solid black';
		var th2 = trh.insertCell();
		th2.appendChild(document.createTextNode('帳戶應有金額'));
		th2.style.border = '1px solid black';
		var th3 = trh.insertCell();
		th3.appendChild(document.createTextNode('帳戶已累積金額'));
		th3.style.border = '1px solid black';
		var th4 = trh.insertCell();
		th4.appendChild(document.createTextNode('差額'));
		th4.style.border = '1px solid black';
		var i9chani8choi6chan12 = amountWanted * (Math.pow((1 + 0.02), (retireAge - currentAge))) * i8choi6(retireAge, gender) * 12;
		//alert((Math.pow((1 + 0.02), (retireAge - currentAge))) * i8choi6(retireAge, gender));
		//alert(i9chani8choi6chan12);
		for (var i = workAge; i < retireAge; i++) {
		var tr = tbl.insertRow();
		var td1 = tr.insertCell();
		td1.appendChild(document.createTextNode(i));
		td1.style.border = '1px solid black';
		var td2 = tr.insertCell();
		var shouldhave = i9chani8choi6chan12 * (Math.pow((1 + roi), (i - retireAge)));
		td2.appendChild(document.createTextNode("$" + Math.round(shouldhave)));
		td2.style.border = '1px solid black';
		var td3 = tr.insertCell();
		var accumalated = 0;
		if (i == workAge) {
		accumalated = 0;
		} else {
		accumalated = wage * totalGather * ((Math.pow((1 + (roi - wageGrowth) / 12), ((i - workAge) * 12)) - 1) / ((roi - wageGrowth) / 12));
		}
		td3.appendChild(document.createTextNode("$" + Math.round(accumalated)));
		td3.style.border = '1px solid black';
		var td4 = tr.insertCell();
		var minus = shouldhave - accumalated; 
		td4.appendChild(document.createTextNode("- $" + Math.round(minus))); 
		td4.style.border = '1px solid black';
		}

		while(accountTable.hasChildNodes()){
				accountTable.removeChild(accountTable.firstChild);
			}

		accountTable.appendChild(colname);
		accountTable.appendChild(tbl);
		
		}




		function i8choi6(retireAge, gender) {
		if (gender == "male") {
		if(retireAge==0){return 24.2964098;}
		else if(retireAge==1){return 24.309741945191764;}
		else if(retireAge==2){return 24.261201833495306;}
		else if(retireAge==3){return 24.206441515252276;}
		else if(retireAge==4){return 24.14614353542122;}
		else if(retireAge==5){return 24.081236558310962;}
		else if(retireAge==6){return 24.01212334895964;}
		else if(retireAge==7){return 23.939454296035;}
		else if(retireAge==8){return 23.86339917555572;}
		else if(retireAge==9){return 23.784121385186005;}
		else if(retireAge==10){return 23.701486285532344;}
		else if(retireAge==11){return 23.61523234281734;}
		else if(retireAge==12){return 23.525346505203505;}
		else if(retireAge==13){return 23.43214968890321;}
		else if(retireAge==14){return 23.336554947650367;}
		else if(retireAge==15){return 23.23998820175579;}
		else if(retireAge==16){return 23.14372704551056;}
		else if(retireAge==17){return 23.048511903708015;}
		else if(retireAge==18){return 22.953426370001182;}
		else if(retireAge==19){return 22.85593262260128;}
		else if(retireAge==20){return 22.75353785940194;}
		else if(retireAge==21){return 22.645465746422687;}
		else if(retireAge==22){return 22.532238983901316;}
		else if(retireAge==23){return 22.41492876967811;}
		else if(retireAge==24){return 22.294429953008123;}
		else if(retireAge==25){return 22.170407917885537;}
		else if(retireAge==26){return 22.041873001411798;}
		else if(retireAge==27){return 21.908325717886992;}
		else if(retireAge==28){return 21.76956633087566;}
		else if(retireAge==29){return 21.62551513048271;}
		else if(retireAge==30){return 21.476098969165296;}
		else if(retireAge==31){return 21.32147728435981;}
		else if(retireAge==32){return 21.161717740506575;}
		else if(retireAge==33){return 20.996428858067173;}
		else if(retireAge==34){return 20.825390451981416;}
		else if(retireAge==35){return 20.64847842836698;}
		else if(retireAge==36){return 20.465957116840126;}
		else if(retireAge==37){return 20.27754114033841;}
		else if(retireAge==38){return 20.083509762625194;}
		else if(retireAge==39){return 19.88341056835779;}
		else if(retireAge==40){return 19.677374356065787;}
		else if(retireAge==41){return 19.465328091145796;}
		else if(retireAge==42){return 19.247112728077397;}
		else if(retireAge==43){return 19.023129447100704;}
		else if(retireAge==44){return 18.794763785423932;}
		else if(retireAge==45){return 18.562659613728627;}
		else if(retireAge==46){return 18.32628095524166;}
		else if(retireAge==47){return 18.08459969826974;}
		else if(retireAge==48){return 17.836499981116212;}
		else if(retireAge==49){return 17.581032800486106;}
		else if(retireAge==50){return 17.318709065195137;}
		else if(retireAge==51){return 17.05058597735156;}
		else if(retireAge==52){return 16.777218665751352;}
		else if(retireAge==53){return 16.498393515517733;}
		else if(retireAge==54){return 16.213405053461997;}
		else if(retireAge==55){return 15.92222300649954;}
		else if(retireAge==56){return 15.625970118841431;}
		else if(retireAge==57){return 15.32556328652885;}
		else if(retireAge==58){return 15.017873248059617;}
		else if(retireAge==59){return 14.703101012495656;}
		else if(retireAge==60){return 14.381440559643266;}
		else if(retireAge==61){return 14.053179938608285;}
		else if(retireAge==62){return 13.718630438665953;}
		else if(retireAge==63){return 13.378062768347164;}
		else if(retireAge==64){return 13.03184604301253;}
		else if(retireAge==65){return 12.680447337631625;}
		else if(retireAge==66){return 12.324296816261134;}
		else if(retireAge==67){return 11.963894747065517;}
		else if(retireAge==68){return 11.599949355567952;}
		else if(retireAge==69){return 11.232894133020137;}
		else if(retireAge==70){return 10.863448509345234;}
		else if(retireAge==71){return 10.492268097833486;}
		else if(retireAge==72){return 10.120064803715913;}
		else if(retireAge==73){return 9.747689135559037;}
		else if(retireAge==74){return 9.375835434211233;}
		else if(retireAge==75){return 9.005386483041805;}
		else if(retireAge==76){return 8.637090501819992;}
		else if(retireAge==77){return 8.271914867806526;}
		else if(retireAge==78){return 7.910609159756893;}
		else if(retireAge==79){return 7.554025788769303;}
		else if(retireAge==80){return 7.20294871456126;}
		else if(retireAge==81){return 6.8582654929303155;}
		else if(retireAge==82){return 6.5205991697466965;}
		else if(retireAge==83){return 6.19080378739076;}
		else if(retireAge==84){return 5.869474986256185;}
		else if(retireAge==85){return 5.557083928039274;}
		else if(retireAge==86){return 5.254281425755466;}
		else if(retireAge==87){return 4.961279709808719;}
		else if(retireAge==88){return 4.678373060350196;}
		else if(retireAge==89){return 4.405423142320198;}
		else if(retireAge==90){return 4.142385427627998;}
		else if(retireAge==91){return 3.888509721162049;}
		else if(retireAge==92){return 3.6424891002774475;}
		else if(retireAge==93){return 3.402522601341499;}
		else if(retireAge==94){return 3.165513928914505;}
		else if(retireAge==95){return 2.925762491888384;}
		else if(retireAge==96){return 2.674477289113194;}
		else if(retireAge==97){return 2.395924684034047;}
		else if(retireAge==98){return 2.063286313381624;}
		else if(retireAge==99){return 1.6281377699941624;}
		else if(retireAge==100){return 1.0;}
		else if(retireAge==101){return 2.6569230769230767;}
		else if(retireAge==102){return 5.593085106382978;}
		else if(retireAge==103){return 11.110576923076923;}
		else if(retireAge==104){return 22.0;}
		else if(retireAge==105){return 45.0;}
		else if(retireAge==106){return 96.23076923076923;}
		else if(retireAge==107){return 209.5;}
		else if(retireAge==108){return 503.8;}
		else if(retireAge==109){return 1260.5;}
		else if(retireAge==110){return 2522.0;}
		} else {
		if(retireAge==0){return 24.6335558;}
		else if(retireAge==1){return 24.66290145277384;}
		else if(retireAge==2){return 24.627515558306996;}
		else if(retireAge==3){return 24.585082256299355;}
		else if(retireAge==4){return 24.53727015518787;}
		else if(retireAge==5){return 24.48529658901413;}
		else if(retireAge==6){return 24.430279373109034;}
		else if(retireAge==7){return 24.372412821953024;}
		else if(retireAge==8){return 24.311739294436382;}
		else if(retireAge==9){return 24.24830598664035;}
		else if(retireAge==10){return 24.182009051240314;}
		else if(retireAge==11){return 24.11305396227713;}
		else if(retireAge==12){return 24.041326434743315;}
		else if(retireAge==13){return 23.967195643027285;}
		else if(retireAge==14){return 23.89070386325664;}
		else if(retireAge==15){return 23.812070522936278;}
		else if(retireAge==16){return 23.73120433121769;}
		else if(retireAge==17){return 23.647971917437392;}
		else if(retireAge==18){return 23.56215613024551;}
		else if(retireAge==19){return 23.47365661059056;}
		else if(retireAge==20){return 23.381722022723675;}
		else if(retireAge==21){return 23.286074789483806;}
		else if(retireAge==22){return 23.18655629969457;}
		else if(retireAge==23){return 23.083026781997685;}
		else if(retireAge==24){return 22.97560690054244;}
		else if(retireAge==25){return 22.864277960496175;}
		else if(retireAge==26){return 22.748767649668178;}
		else if(retireAge==27){return 22.628883712679947;}
		else if(retireAge==28){return 22.50456337268849;}
		else if(retireAge==29){return 22.375802825389467;}
		else if(retireAge==30){return 22.242119807065585;}
		else if(retireAge==31){return 22.10316186312523;}
		else if(retireAge==32){return 21.95898933739853;}
		else if(retireAge==33){return 21.809694354772414;}
		else if(retireAge==34){return 21.655304092900234;}
		else if(retireAge==35){return 21.495345489250955;}
		else if(retireAge==36){return 21.329446054406326;}
		else if(retireAge==37){return 21.157489623924825;}
		else if(retireAge==38){return 20.979724940511062;}
		else if(retireAge==39){return 20.796084948450503;}
		else if(retireAge==40){return 20.606304333984728;}
		else if(retireAge==41){return 20.40977122370235;}
		else if(retireAge==42){return 20.205873954548398;}
		else if(retireAge==43){return 19.99477062354678;}
		else if(retireAge==44){return 19.777191979187403;}
		else if(retireAge==45){return 19.553843296547925;}
		else if(retireAge==46){return 19.32451169181579;}
		else if(retireAge==47){return 19.08888964002907;}
		else if(retireAge==48){return 18.84614123912696;}
		else if(retireAge==49){return 18.595535050194695;}
		else if(retireAge==50){return 18.337479205675177;}
		else if(retireAge==51){return 18.072116534505916;}
		else if(retireAge==52){return 17.798961318795847;}
		else if(retireAge==53){return 17.51781794178978;}
		else if(retireAge==54){return 17.22861096912608;}
		else if(retireAge==55){return 16.931015969063115;}
		else if(retireAge==56){return 16.6251949664582;}
		else if(retireAge==57){return 16.310951717596847;}
		else if(retireAge==58){return 15.989605967746927;}
		else if(retireAge==59){return 15.661262294587148;}
		else if(retireAge==60){return 15.326125025636633;}
		else if(retireAge==61){return 14.984502812312886;}
		else if(retireAge==62){return 14.63654554067524;}
		else if(retireAge==63){return 14.282615886338617;}
		else if(retireAge==64){return 13.923200693447463;}
		else if(retireAge==65){return 13.558462854495799;}
		else if(retireAge==66){return 13.188949774960305;}
		else if(retireAge==67){return 12.815233558639127;}
		else if(retireAge==68){return 12.437705010091534;}
		else if(retireAge==69){return 12.056988648234556;}
		else if(retireAge==70){return 11.673636998639756;}
		else if(retireAge==71){return 11.288374281193015;}
		else if(retireAge==72){return 10.901794211556288;}
		else if(retireAge==73){return 10.514629579399593;}
		else if(retireAge==74){return 10.127664825697813;}
		else if(retireAge==75){return 9.741625581487813;}
		else if(retireAge==76){return 9.357314237986051;}
		else if(retireAge==77){return 8.975540217801191;}
		else if(retireAge==78){return 8.596994518691876;}
		else if(retireAge==79){return 8.222677732226778;}
		else if(retireAge==80){return 7.853172043400424;}
		else if(retireAge==81){return 7.489291258752337;}
		else if(retireAge==82){return 7.131729907119665;}
		else if(retireAge==83){return 6.781229542916554;}
		else if(retireAge==84){return 6.438433415886698;}
		else if(retireAge==85){return 6.103759054701225;}
		else if(retireAge==86){return 5.777706641965891;}
		else if(retireAge==87){return 5.4605336903724;}
		else if(retireAge==88){return 5.15228024744641;}
		else if(retireAge==89){return 4.8528793610760825;}
		else if(retireAge==90){return 4.562014732231734;}
		else if(retireAge==91){return 4.2785914987744365;}
		else if(retireAge==92){return 4.001240332701006;}
		else if(retireAge==93){return 3.727515744642291;}
		else if(retireAge==94){return 3.4535597498709194;}
		else if(retireAge==95){return 3.1730968986496513;}
		else if(retireAge==96){return 2.8769276102543953;}
		else if(retireAge==97){return 2.5484129101093624;}
		else if(retireAge==98){return 2.16219739292365;}
		else if(retireAge==99){return 1.6727418922540873;}
		else if(retireAge==100){return 1.0;}
		else if(retireAge==101){return 2.540208717004297;}
		else if(retireAge==102){return 5.0648330058939095;}
		else if(retireAge==103){return 9.440261865793781;}
		else if(retireAge==104){return 17.433048433048434;}
		else if(retireAge==105){return 32.704663212435236;}
		else if(retireAge==106){return 63.504950495049506;}
		else if(retireAge==107){return 126.74509803921569;}
		else if(retireAge==108){return 270.375;}
		else if(retireAge==109){return 590.9090909090909;}
		else if(retireAge==110){return 1300.8;}
		}
		}
		function lifeLeftFunc() {
		var retireAge = parseInt(document.getElementById("retireAge").value);
		var gender = document.getElementById("gender").value;
		var lifeLeft = 0;
		if (gender == "male") {
		if(retireAge==0){lifeLeft = 76;}
		else if(retireAge==1){lifeLeft = 75;}
		else if(retireAge==2){lifeLeft = 74;}
		else if(retireAge==3){lifeLeft = 73;}
		else if(retireAge==4){lifeLeft = 72;}
		else if(retireAge==5){lifeLeft = 71;}
		else if(retireAge==6){lifeLeft = 70;}
		else if(retireAge==7){lifeLeft = 69;}
		else if(retireAge==8){lifeLeft = 68;}
		else if(retireAge==9){lifeLeft = 67;}
		else if(retireAge==10){lifeLeft = 66;}
		else if(retireAge==11){lifeLeft = 66;}
		else if(retireAge==12){lifeLeft = 65;}
		else if(retireAge==13){lifeLeft = 64;}
		else if(retireAge==14){lifeLeft = 63;}
		else if(retireAge==15){lifeLeft = 62;}
		else if(retireAge==16){lifeLeft = 61;}
		else if(retireAge==17){lifeLeft = 60;}
		else if(retireAge==18){lifeLeft = 59;}
		else if(retireAge==19){lifeLeft = 58;}
		else if(retireAge==20){lifeLeft = 57;}
		else if(retireAge==21){lifeLeft = 56;}
		else if(retireAge==22){lifeLeft = 55;}
		else if(retireAge==23){lifeLeft = 54;}
		else if(retireAge==24){lifeLeft = 53;}
		else if(retireAge==25){lifeLeft = 52;}
		else if(retireAge==26){lifeLeft = 51;}
		else if(retireAge==27){lifeLeft = 50;}
		else if(retireAge==28){lifeLeft = 49;}
		else if(retireAge==29){lifeLeft = 48;}
		else if(retireAge==30){lifeLeft = 47;}
		else if(retireAge==31){lifeLeft = 46;}
		else if(retireAge==32){lifeLeft = 46;}
		else if(retireAge==33){lifeLeft = 45;}
		else if(retireAge==34){lifeLeft = 44;}
		else if(retireAge==35){lifeLeft = 43;}
		else if(retireAge==36){lifeLeft = 42;}
		else if(retireAge==37){lifeLeft = 41;}
		else if(retireAge==38){lifeLeft = 40;}
		else if(retireAge==39){lifeLeft = 39;}
		else if(retireAge==40){lifeLeft = 38;}
		else if(retireAge==41){lifeLeft = 37;}
		else if(retireAge==42){lifeLeft = 36;}
		else if(retireAge==43){lifeLeft = 35;}
		else if(retireAge==44){lifeLeft = 34;}
		else if(retireAge==45){lifeLeft = 34;}
		else if(retireAge==46){lifeLeft = 33;}
		else if(retireAge==47){lifeLeft = 32;}
		else if(retireAge==48){lifeLeft = 31;}
		else if(retireAge==49){lifeLeft = 30;}
		else if(retireAge==50){lifeLeft = 29;}
		else if(retireAge==51){lifeLeft = 28;}
		else if(retireAge==52){lifeLeft = 27;}
		else if(retireAge==53){lifeLeft = 27;}
		else if(retireAge==54){lifeLeft = 26;}
		else if(retireAge==55){lifeLeft = 25;}
		else if(retireAge==56){lifeLeft = 24;}
		else if(retireAge==57){lifeLeft = 23;}
		else if(retireAge==58){lifeLeft = 22;}
		else if(retireAge==59){lifeLeft = 22;}
		else if(retireAge==60){lifeLeft = 21;}
		else if(retireAge==61){lifeLeft = 20;}
		else if(retireAge==62){lifeLeft = 19;}
		else if(retireAge==63){lifeLeft = 19;}
		else if(retireAge==64){lifeLeft = 18;}
		else if(retireAge==65){lifeLeft = 17;}
		else if(retireAge==66){lifeLeft = 16;}
		else if(retireAge==67){lifeLeft = 16;}
		else if(retireAge==68){lifeLeft = 15;}
		else if(retireAge==69){lifeLeft = 14;}
		else if(retireAge==70){lifeLeft = 13;}
		else if(retireAge==71){lifeLeft = 13;}
		else if(retireAge==72){lifeLeft = 12;}
		else if(retireAge==73){lifeLeft = 11;}
		else if(retireAge==74){lifeLeft = 11;}
		else if(retireAge==75){lifeLeft = 10;}
		else if(retireAge==76){lifeLeft = 10;}
		else if(retireAge==77){lifeLeft = 9;}
		else if(retireAge==78){lifeLeft = 8;}
		else if(retireAge==79){lifeLeft = 8;}
		else if(retireAge==80){lifeLeft = 7;}
		else if(retireAge==81){lifeLeft = 7;}
		else if(retireAge==82){lifeLeft = 6;}
		else if(retireAge==83){lifeLeft = 6;}
		else if(retireAge==84){lifeLeft = 5;}
		else if(retireAge==85){lifeLeft = 5;}
		else if(retireAge==86){lifeLeft = 5;}
		else if(retireAge==87){lifeLeft = 4;}
		else if(retireAge==88){lifeLeft = 4;}
		else if(retireAge==89){lifeLeft = 3;}
		else if(retireAge==90){lifeLeft = 3;}
		else if(retireAge==91){lifeLeft = 3;}
		else if(retireAge==92){lifeLeft = 3;}
		else if(retireAge==93){lifeLeft = 2;}
		else if(retireAge==94){lifeLeft = 2;}
		else if(retireAge==95){lifeLeft = 2;}
		else if(retireAge==96){lifeLeft = 2;}
		else if(retireAge==97){lifeLeft = 1;}
		else if(retireAge==98){lifeLeft = 1;}
		else if(retireAge==99){lifeLeft = 1;}
		else if(retireAge==100){lifeLeft = 1;}
		else if(retireAge==101){lifeLeft = 1;}
		else if(retireAge==102){lifeLeft = 1;}
		else if(retireAge==103){lifeLeft = 1;}
		else {lifeLeft = 0;}
		} else {
		if(retireAge==0){lifeLeft = 80;}
		else if(retireAge==1){lifeLeft = 80;}
		else if(retireAge==2){lifeLeft = 79;}
		else if(retireAge==3){lifeLeft = 78;}
		else if(retireAge==4){lifeLeft = 77;}
		else if(retireAge==5){lifeLeft = 76;}
		else if(retireAge==6){lifeLeft = 75;}
		else if(retireAge==7){lifeLeft = 74;}
		else if(retireAge==8){lifeLeft = 73;}
		else if(retireAge==9){lifeLeft = 72;}
		else if(retireAge==10){lifeLeft = 71;}
		else if(retireAge==11){lifeLeft = 70;}
		else if(retireAge==12){lifeLeft = 69;}
		else if(retireAge==13){lifeLeft = 68;}
		else if(retireAge==14){lifeLeft = 67;}
		else if(retireAge==15){lifeLeft = 66;}
		else if(retireAge==16){lifeLeft = 65;}
		else if(retireAge==17){lifeLeft = 64;}
		else if(retireAge==18){lifeLeft = 63;}
		else if(retireAge==19){lifeLeft = 62;}
		else if(retireAge==20){lifeLeft = 61;}
		else if(retireAge==21){lifeLeft = 60;}
		else if(retireAge==22){lifeLeft = 59;}
		else if(retireAge==23){lifeLeft = 58;}
		else if(retireAge==24){lifeLeft = 57;}
		else if(retireAge==25){lifeLeft = 56;}
		else if(retireAge==26){lifeLeft = 55;}
		else if(retireAge==27){lifeLeft = 54;}
		else if(retireAge==28){lifeLeft = 53;}
		else if(retireAge==29){lifeLeft = 52;}
		else if(retireAge==30){lifeLeft = 51;}
		else if(retireAge==31){lifeLeft = 50;}
		else if(retireAge==32){lifeLeft = 49;}
		else if(retireAge==33){lifeLeft = 48;}
		else if(retireAge==34){lifeLeft = 47;}
		else if(retireAge==35){lifeLeft = 46;}
		else if(retireAge==36){lifeLeft = 45;}
		else if(retireAge==37){lifeLeft = 44;}
		else if(retireAge==38){lifeLeft = 43;}
		else if(retireAge==39){lifeLeft = 43;}
		else if(retireAge==40){lifeLeft = 42;}
		else if(retireAge==41){lifeLeft = 41;}
		else if(retireAge==42){lifeLeft = 40;}
		else if(retireAge==43){lifeLeft = 39;}
		else if(retireAge==44){lifeLeft = 38;}
		else if(retireAge==45){lifeLeft = 37;}
		else if(retireAge==46){lifeLeft = 36;}
		else if(retireAge==47){lifeLeft = 35;}
		else if(retireAge==48){lifeLeft = 34;}
		else if(retireAge==49){lifeLeft = 33;}
		else if(retireAge==50){lifeLeft = 32;}
		else if(retireAge==51){lifeLeft = 31;}
		else if(retireAge==52){lifeLeft = 30;}
		else if(retireAge==53){lifeLeft = 29;}
		else if(retireAge==54){lifeLeft = 28;}
		else if(retireAge==55){lifeLeft = 28;}
		else if(retireAge==56){lifeLeft = 27;}
		else if(retireAge==57){lifeLeft = 26;}
		else if(retireAge==58){lifeLeft = 25;}
		else if(retireAge==59){lifeLeft = 24;}
		else if(retireAge==60){lifeLeft = 23;}
		else if(retireAge==61){lifeLeft = 22;}
		else if(retireAge==62){lifeLeft = 21;}
		else if(retireAge==63){lifeLeft = 20;}
		else if(retireAge==64){lifeLeft = 20;}
		else if(retireAge==65){lifeLeft = 19;}
		else if(retireAge==66){lifeLeft = 18;}
		else if(retireAge==67){lifeLeft = 17;}
		else if(retireAge==68){lifeLeft = 16;}
		else if(retireAge==69){lifeLeft = 16;}
		else if(retireAge==70){lifeLeft = 15;}
		else if(retireAge==71){lifeLeft = 14;}
		else if(retireAge==72){lifeLeft = 13;}
		else if(retireAge==73){lifeLeft = 13;}
		else if(retireAge==74){lifeLeft = 12;}
		else if(retireAge==75){lifeLeft = 11;}
		else if(retireAge==76){lifeLeft = 11;}
		else if(retireAge==77){lifeLeft = 10;}
		else if(retireAge==78){lifeLeft = 9;}
		else if(retireAge==79){lifeLeft = 9;}
		else if(retireAge==80){lifeLeft = 8;}
		else if(retireAge==81){lifeLeft = 8;}
		else if(retireAge==82){lifeLeft = 7;}
		else if(retireAge==83){lifeLeft = 7;}
		else if(retireAge==84){lifeLeft = 6;}
		else if(retireAge==85){lifeLeft = 6;}
		else if(retireAge==86){lifeLeft = 5;}
		else if(retireAge==87){lifeLeft = 5;}
		else if(retireAge==88){lifeLeft = 5;}
		else if(retireAge==89){lifeLeft = 4;}
		else if(retireAge==90){lifeLeft = 4;}
		else if(retireAge==91){lifeLeft = 3;}
		else if(retireAge==92){lifeLeft = 3;}
		else if(retireAge==93){lifeLeft = 3;}
		else if(retireAge==94){lifeLeft = 3;}
		else if(retireAge==95){lifeLeft = 2;}
		else if(retireAge==96){lifeLeft = 2;}
		else if(retireAge==97){lifeLeft = 2;}
		else if(retireAge==98){lifeLeft = 2;}
		else if(retireAge==99){lifeLeft = 1;}
		else if(retireAge==100){lifeLeft = 1;}
		else if(retireAge==101){lifeLeft = 1;}
		else if(retireAge==102){lifeLeft = 1;}
		else if(retireAge==103){lifeLeft = 1;}
		else if(retireAge==104){lifeLeft = 1;}
		else if(retireAge==105){lifeLeft = 1;}
		else {lifeLeft = 0;}
		}
		document.getElementById("lifeLeft").value = lifeLeft;
		}
		</script>
	</html>