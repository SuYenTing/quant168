<?php
include "navbar.html";
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("web_data"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
?>
<style>
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

<head>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/fundsearch.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
</head>

<div class="container">
<form id="insuranceSearch" name="insuranceSearch" method="post" action="insuranceResult.php">
<table>
    <tr>
        <th colspan="6" style="text-align:center;">保險查詢</th>
    </tr>
    <tr>
    	<td>公司名稱</td>
        <td>
        	<select name="company" id="company">

        	<?php
            
            $companyQuery="SELECT distinct (company) FROM web_data.insurance_premium";
            $companyResult=mysql_query($companyQuery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($companyRow=mysql_fetch_array($companyResult)) {
            $company=$companyRow["company"];
                echo "<option value=\"$company\">
                    $company
                </option>";
            }
                
            ?>
        		
        	</select>
        </td>
    	<td>目前年齡</td>
        <td>
            <select name="currentAge" id="currentAge">
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
                    <td>性別</td>
                    <td>
                            <input type="radio" name="gender" id="gender" value="1" checked> 男
                            <input type="radio" name="gender" id="gender" value="2"> 女
                    </td>
                    <input type="hidden" name="sql" id="sql">
        
    </tr>
    
    <tr>
        <td colspan="6" style="text-align:center;">
            <input class="button" type="button" value="確認送出" onclick="insuranceSearchSubmit()">
        </td>
    </tr>
</table>
</form>
</div>
<script type="text/javascript">

function insuranceSearchSubmit() {

	sql = "";

	sql = sql + "and insurance_premium.company = '" + document.getElementById("company").value + "' ";
	sql = sql + "and insurance_premium.gender = '" + document.getElementById("gender").value + "' ";
	sql = sql + "and insurance_premium.age = '" + document.getElementById("currentAge").value + "' ";

	document.getElementById("sql").value = "SELECT insurance_premium.company,insurance_premium.name,insurance_premium.type,insurance_premium.currency,insurance_premium.condition,insurance_premium.unit,insurance_premium.gender,insurance_premium.age,insurance_premium.premium,insurance_premium.length FROM web_data.insurance_premium where 1=1 "+sql;

	document.getElementById("insuranceSearch").action = "insuranceResult.php";
	document.getElementById("insuranceSearch").submit();

	// alert(document.getElementById("sql").value);

}

</script>