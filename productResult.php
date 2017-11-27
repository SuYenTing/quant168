<?php 
include "navbar.html";
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("web_data"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
$company = $_POST['company'];
$product = $_POST['product'];
$type = $_POST['type'];
$sql = $_POST['sql'];
?>
</head>
<!DOCTYPE html>
<html>
<body>

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

<div class="container">
    <h1><?php echo $product?></h1>
    <hr>
    <form id="productSearch" name="productSearch" method="post" action="premiumResult.php">
        <table>
            <tr>
                <td>年齡：</td>
                <td>
                    <select name="currentAge" id="currentAge">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30"selected>30</option>
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
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                        <option value="71">71</option>
                        <option value="72">72</option>
                        <option value="73">73</option>
                        <option value="74">74</option>
                        <option value="75">75</option>
                    </select>
                    歲</td>
                <td>性別：</td>
                <td>
                            <input type="radio" name="gender" id="gender" value="male" checked onchange="genderFunc(1)"> 男
                            <input type="radio" name="gender" id="gender" value="female" onchange="genderFunc(2)"> 女
                            <input type="hidden" name="genders" id="genders" value=1>
                </td>
                </tr>
                <tr>
                <td>年期：</td>
                <td>
                    <select name="length" id="length">

                    <?php
                    
                    $lengthQuery="SELECT distinct (length) FROM web_data.insurance_premium where 1=1 and insurance_premium.company = '$company' and insurance_premium.name = '$product' ";

                    $lengthResult=mysql_query($lengthQuery) or die ("Query to get data from firsttable failed: ".mysql_error());
                    
                    while ($lengthRow=mysql_fetch_array($lengthResult)) {
                    $length=$lengthRow["length"];
                        echo "<option value=\"$length\">
                            $length
                        </option>";
                    }
                        
                    ?>
                        
                    </select>
                年期</td>
                <td>保額：</td>
                <td>
                    <input type="number" name="insured" id="insured" value="5">萬
                </td>
                <input type="hidden" id="sql" name="sql">
                <input type="hidden" id="product" name="product">
                <input type="hidden" id="company" name="company">
                <input type="hidden" id="type" name="type">
                </tr>
            </table>
            <button onclick="calculate()" class="button button4">計算</button>
</div>
</body>
<script type="text/javascript">
    
function genderFunc(gender) {
    document.getElementById("genders").value = gender;
}

function calculate(){

    document.getElementById('product').value = "<?php echo $product ?>";
    document.getElementById('company').value = "<?php echo $company ?>";
    document.getElementById('type').value = "<?php echo $type ?>";

    sql = "";

    sql = sql + "and insurance_premium.company = '" + "<?php echo $company ?>" + "' ";

    sql = sql + "and insurance_premium.name = '" + "<?php echo $product ?>" + "' ";

    sql = sql + "and insurance_premium.type = '" + "<?php echo $type ?>" + "' ";

    sql = sql + "and insurance_premium.length = " + document.getElementById('length').value + " ";

    sql = sql + "and insurance_premium.age = " + document.getElementById('currentAge').value + " "; 

    sql = sql + "and insurance_premium.gender = " + document.getElementById('genders').value + " ";


    document.getElementById("sql").value = "SELECT insurance_premium.premium, insurance_premium.unit FROM web_data.insurance_premium where 1=1 "+sql;

    // alert(document.getElementById('sql').value);

    document.getElementById("productSearch").action = "premiumResult.php";
    document.getElementById("productSearch").submit();


}

</script>

</html>








