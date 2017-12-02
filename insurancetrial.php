<?php

include("navbar.html");

?>

<html>
<head>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
    </script>
    <meta charset="UTF-8">
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
            width: 90%;
        }
    </style>

    <div class="container">
        
        <form method="post" action="" name="form" id="form">
        <table>
        
            <tr>
                <th colspan="2" style="text-align:center;">輸入資料</th>
            </tr>
            <tr>
                <td>現在年齡</td>
                <td>
                    <select name="currentAge" id="currentAge">
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
                    </select>
                    歲</td>
                </tr>
                <tr>
                    <td>性別</td>
                    <td>
                                <input type="radio" name="gender" id="gender" value="male" checked onchange="genderFunc('male')"> 男
                                <input type="radio" name="gender" id="gender" value="female" onchange="genderFunc('female')"> 女
                                <input type="hidden" name="genders" id="genders" value="male">
                    </td>
                </tr>
                <tr>
                    <td>預定利率</td>
                    <td>2.5(‰)</td>
                </tr>
                <tr>
                    <td>保險類別</td>
                    <td>
                        <select name="insuranceType" id="insuranceType" onchange="insuranceTypeFunc(this)">
                            <option value="1" checked >1終身壽險</option>
                            <option value="2">2定期壽險</option>
                            <option value="3">3還本型壽險─給付一次</option>
                            <option value="4">4還本型壽險─每年給付</option>
                            <option value="5">5生死合險</option>
                            <option value="6">6終身年金</option>
                            <option value="7">7定期年金</option>
                            <option value="8">8遞延終身年金</option>
                            <option value="9">9遞延定期年金</option>
                        </select>
                    </td>
                </tr>
                <tr id="insuranceSpanRow" id="insuranceSpanRow" style="display: none">
                    <td>保險期間</td>
                    <td>
                        <select name="insuranceSpan" id="insuranceSpan">
                            <option value="6">6</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>繳費方式</td>
                    <td>
                        <select name="paymentType" id="paymentType">
                            <option value="1">躉繳</option>
                            <option value="2">分期</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>繳費期間</td>
                    <td>
                        <select name="paymentSpan" id="paymentSpan">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>繳費頻率</td>
                    <td>
                        <select name="paymentFreqency" id="paymentFreqency">
                            <option value="year">年繳</option>
                            <option value="halfyear">半年繳</option>
                            <option value="seasonal">季繳</option>
                            <option value="monthly">月繳</option>
                        </select>
                    </td>
                </tr>
                <tr id="survivalPayTimeRow" name="survivalPayTimeRow" style="display: none">
                    <td>生存金給付時間</td>
                    <td>
                    </td>
                </tr>
                <tr id="survivalPayProportionRow" name="survivalPayProportionRow" style="display: none">
                    <td>生存金給付比例</td>
                    <td>
                    </td>
                </tr>
                <tr id="survivalPaybackTimeRow" name="survivalPaybackTimeRow" style="display: none">
                    <td>生存金開始還本時間</td>
                    <td>
                        <select id="survivalPaybackTime" name="survivalPaybackTime">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                        </select>
                    </td>
                </tr>
                <tr id="yearlyPaidPropotionRow" name="yearlyPaidPropotionRow" style="display: none">
                    <td>每年給付比例</td>
                    <td>
                        <select id="yearlyPaidPropotion" name="yearlyPaidPropotion">
                            <option value="0.01">1%</option>
                            <option value="0.02">2%</option>
                            <option value="0.03">3%</option>
                            <option value="0.05">5%</option>
                            <option value="0.1">10%</option>
                            <option value="0.2">20%</option>
                            <option value="0.5">50%</option>
                        </select>
                    </td>
                </tr>
                <tr id="postponeTimeRow" name="postponeTimeRow" style="display: none">
                    <td>遞延期間</td>
                    <td>
                        <select id="postponeTime" name="postponeTime">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>保險金額</td>
                    <td>
                        <select id="insuranceAmount" name="insuranceAmount">
                            <option value="200000">20</option>
                            <option value="300000">30</option>
                            <option value="400000">40</option>
                            <option value="500000">50</option>
                            <option value="600000">60</option>
                            <option value="700000">70</option>
                            <option value="800000">80</option>
                            <option value="900000">90</option>
                            <option value="1000000">100</option>
                            <option value="1100000">110</option>
                            <option value="1200000">120</option>
                            <option value="1300000">130</option>
                            <option value="1400000">140</option>
                            <option value="1500000">150</option>
                            <option value="1600000">160</option>
                            <option value="1700000">170</option>
                            <option value="1800000">180</option>
                            <option value="1900000">190</option>
                            <option value="2000000">200</option>
                        </select>
                    萬元</td>
                </tr>
            
            </table>
            </form>
            <button onclick="calculate()" class="button button4">計算</button>
            
           </body>


<script type="text/javascript">

function genderFunc(gender) {
    document.getElementById("genders").value = gender;
    alert(document.getElementById('genders').value);
}

function insuranceTypeFunc(selectOption) {

    var type = parseInt(selectOption.value);

    var insuranceSpanRow = document.getElementById('insuranceSpanRow');
    var survivalPayTimeRow = document.getElementById('survivalPayTimeRow');
    var survivalPayProportionRow = document.getElementById('survivalPayProportionRow');
    var survivalPaybackTimeRow = document.getElementById('survivalPaybackTimeRow');
    var yearlyPaidPropotionRow = document.getElementById('yearlyPaidPropotionRow');
    var postponeTimeRow = document.getElementById('postponeTimeRow');
    

    switch(type){
        case 1:
            insuranceSpanRow.style.display = "none";
            survivalPayTimeRow.style.display = "none";
            survivalPayProportionRow.style.display = "none";
            survivalPaybackTimeRow.style.display = "none";
            yearlyPaidPropotionRow.style.display = "none";
            postponeTimeRow.style.display = "none";
            break;
        case 2:
            insuranceSpanRow.style.display = "table-row";
            survivalPayTimeRow.style.display = "none";
            survivalPayProportionRow.style.display = "none";
            survivalPaybackTimeRow.style.display = "none";
            yearlyPaidPropotionRow.style.display = "none";
            postponeTimeRow.style.display = "none";
            break;
        case 3:
            insuranceSpanRow.style.display = "none";
            survivalPayTimeRow.style.display = "table-row";
            survivalPayProportionRow.style.display = "table-row";
            survivalPaybackTimeRow.style.display = "none";
            yearlyPaidPropotionRow.style.display = "none";
            postponeTimeRow.style.display = "none";
            break;
        case 4:
            insuranceSpanRow.style.display = "none";
            survivalPayTimeRow.style.display = "none";
            survivalPayProportionRow.style.display = "none";
            survivalPaybackTimeRow.style.display = "table-row";
            yearlyPaidPropotionRow.style.display = "table-row";
            postponeTimeRow.style.display = "none";
            break;
        case 5:
            insuranceSpanRow.style.display = "table-row";
            survivalPayTimeRow.style.display = "none";
            survivalPayProportionRow.style.display = "none";
            survivalPaybackTimeRow.style.display = "none";
            yearlyPaidPropotionRow.style.display = "none";
            postponeTimeRow.style.display = "none";
            break;
        case 6:
            insuranceSpanRow.style.display = "none";
            survivalPayTimeRow.style.display = "none";
            survivalPayProportionRow.style.display = "none";
            survivalPaybackTimeRow.style.display = "none";
            yearlyPaidPropotionRow.style.display = "none";
            postponeTimeRow.style.display = "none";
            break;
        case 7:
            insuranceSpanRow.style.display = "table-row";
            survivalPayTimeRow.style.display = "none";
            survivalPayProportionRow.style.display = "none";
            survivalPaybackTimeRow.style.display = "none";
            yearlyPaidPropotionRow.style.display = "none";
            postponeTimeRow.style.display = "none";
            break;
        case 8:
            insuranceSpanRow.style.display = "none";
            survivalPayTimeRow.style.display = "none";
            survivalPayProportionRow.style.display = "none";
            survivalPaybackTimeRow.style.display = "none";
            yearlyPaidPropotionRow.style.display = "none";
            postponeTimeRow.style.display = "table-row";
            break;
        case 9:
            insuranceSpanRow.style.display = "table-row";
            survivalPayTimeRow.style.display = "none";
            survivalPayProportionRow.style.display = "none";
            survivalPaybackTimeRow.style.display = "none";
            yearlyPaidPropotionRow.style.display = "none";
            postponeTimeRow.style.display = "table-row";
            break;
    }

}

</script>
</html>







