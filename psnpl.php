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
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
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
            width: 50%;
        }
    </style>

    <div class="container">

        <table>
        <form method="post" action="" name="form1" id="form1" >
            <tr>
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
                        <td>職業別</td>
                        <td>
                            <input type="radio" name="vocation" id="vocation" value="labor" checked onchange="vocationFunc('labor')"> 勞工
                            <input type="radio" name="vocation" id="vocation" value="functionary" onchange="vocationFunc('functionary')"> 公務員
                            <input type="radio" name="vocation" id="vocation" value="publicta" onchange="vocationFunc('publicta')"> 公立教職
                            <input type="radio" name="vocation" id="vocation" value="privateta" onchange="vocationFunc('privateta')"> 私立教職
                            <input type="radio" name="vocation" id="vocation" value="military" onchange="vocationFunc('military')"> 軍人
                            <input type="radio" name="vocation" id="vocation" value="farmer" onchange="vocationFunc('farmer')"> 農民
                            <input type="radio" name="vocation" id="vocation" value="popular" onchange="vocationFunc('popular')"> 一般民眾
                            <input type="hidden" name="vocations" id="vocations" value="labor">
                        </td>
                </tr>
                <tr>
                        <td>理財目標</td>
                        <td>
                            <input type="radio" name="goal" id="goal" value="shortterm" checked onchange="goalFunc('shortterm')"> 短期投資
                            <input type="radio" name="goal" id="goal" value="longterm" onchange="goalFunc('longterm')"> 長期規劃
                            <input type="hidden" name="goals" id="goals" value="shortterm">
                        </td>
                </tr>
                
            </form>
            </table>
            <button onclick="changePage()" class="button button4">確定送出</button>
           </body>


<script type="text/javascript">

function goalFunc(goal){
    document.getElementById("goals").value = goal;
}

function vocationFunc(vocation) {
    document.getElementById("vocations").value = vocation;
}

function genderFunc(gender) {
    document.getElementById("genders").value = gender;
}

function changePage(){

    var directForm;
    var goal = document.getElementById("goals").value;
    var vocation = document.getElementById("vocations").value;

    if ("longterm" == goal && "labor" == vocation) {
        directForm = "longterm1.php";
        // alert("longterm1");
    }
    else if ("longterm" == goal && "labor" !== vocation) {
        directForm = "longterm2.php";
        // alert("longterm2");
    }
    else if ("shortterm" == goal) {
        directForm = "shortterm.php";
        // alert("shortterm");
    }

    document.getElementById('form1').action = directForm;

    document.getElementById('form1').submit();

    // return false;


}


</script>
</html>







