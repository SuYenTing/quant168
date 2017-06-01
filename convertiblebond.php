<?php
include("navbar.html");
?>
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
//從contact資料庫中選擇所有的資料表
$data=mysql_query("select * from web_data.cb_arbitrage");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/shCore.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <style type="text/css" class="init">
    td.details-control {
        background: url('img/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    
    tr.shown td.details-control {
        background: url('img/details_close.png') no-repeat center center;
    }
    </style>
    <script type="text/javascript" language="javascript" src="DataTables-1.10.7/media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="DataTables-1.10.7/examples/resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="DataTables-1.10.7/examples/resources/demo.js"></script>
    <script type="text/javascript" language="javascript" class="init">
    /* Formatting function for row details - modify as you need */
    function format(d) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="detaildata">' +
            '<tr>' +
            '<td>價格資料時間:</td>' +
            '<td>' + d.pricetime + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>發行資料時間:</td>' +
            '<td>' + d.publishtime + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>股票代碼:</td>' +
            '<td>' + d.stockid + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="border-left:5px solid #B4CCFF">轉換報酬率:</td>' +
            '<td>' + d.changereturn + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="border-left:5px solid #B4CCFF">轉換年化報酬率:</td>' +
            '<td>' + d.changeyearreturn + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="border-left:5px solid #B4CCFF">賣回期間報酬率:</td>' +
            '<td>' + d.backreturn + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="border-left:5px solid #B4CCFF">賣回年化報酬率:</td>' +
            '<td>' + d.backyearreturn + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="border-left:5px solid #B4CCFF">避險比率:</td>' +
            '<td>' + d.hedgeratio + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>轉換價格:</td>' +
            '<td>' + d.changeprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>最近一期到期日:</td>' +
            '<td>' + d.lastduedate + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>最近一次賣回權價格:</td>' +
            '<td>' + d.backprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB到期日:</td>' +
            '<td>' + d.CBduedate + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB到期面額:</td>' +
            '<td>' + d.CBdueprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB成交價:</td>' +
            '<td>' + d.dealprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB買進價:</td>' +
            '<td>' + d.inprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB賣出價:</td>' +
            '<td>' + d.outprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB成交量:</td>' +
            '<td>' + d.dealamount + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB開盤價:</td>' +
            '<td>' + d.openingprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB最高價:</td>' +
            '<td>' + d.highprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB最低價:</td>' +
            '<td>' + d.lowprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>股票成交價:</td>' +
            '<td>' + d.stockdealprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>股票買進價:</td>' +
            '<td>' + d.stockinprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>股票賣出價:</td>' +
            '<td>' + d.stockoutprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>股票成交量:</td>' +
            '<td>' + d.stockdealamount + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>股票開盤價:</td>' +
            '<td>' + d.stockopeningprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>股票最高價:</td>' +
            '<td>' + d.stockhighprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>股票最低價:</td>' +
            '<td>' + d.lastbackprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>最近一期賣回價格或到期面額:</td>' +
            '<td>' + d.stocklowprice + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>距到期日(天):</td>' +
            '<td>' + d.dueday + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CB純債券價值:</td>' +
            '<td>' + d.CBvalue + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>歐式買權價值:</td>' +
            '<td>' + d.Ecalloptionvalue + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>隱含波動度:</td>' +
            '<td>' + d.fluctuate + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>d1</td>' +
            '<td>' + d.d1 + '</td>' +
            '</tr>' +
            '</table>';
    }
    var dataSet = [ 
    <?php
    for($i=1;$i<=mysql_num_rows($data);$i++){
        $rs=mysql_fetch_row($data);
        echo "{";
        echo "\"pricetime\": \"".$rs[16]."\",";
        echo "\"publishtime\": \"".$rs[2]."\",";
        echo "\"CBid\": \"".$rs[1]."\",";
        echo "\"CBname\": \"".$rs[3]."\",";
        echo "\"stockid\": \"".$rs[0]."\",";
        echo "\"changeprice\": \"".$rs[4]."\",";
        echo "\"lastduedate\": \"".$rs[5]."\",";
        echo "\"backprice\": \"".$rs[6]."\",";
        echo "\"CBduedate\": \"".$rs[7]."\",";
        echo "\"CBdueprice\": \"".$rs[8]."\",";
        echo "\"dealprice\": \"".$rs[9]."\",";
        echo "\"inprice\": \"".$rs[10]."\",";
        echo "\"outprice\": \"".$rs[11]."\",";
        echo "\"dealamount\": \"".$rs[12]."\",";
        echo "\"openingprice\": \"".$rs[13]."\",";
        echo "\"highprice\": \"".$rs[14]."\",";
        echo "\"lowprice\": \"".$rs[15]."\",";
        echo "\"stockdealprice\": \"".$rs[17]."\",";
        echo "\"stockinprice\": \"".$rs[18]."\",";
        echo "\"stockoutprice\": \"".$rs[19]."\",";
        echo "\"stockdealamount\": \"".$rs[20]."\",";
        echo "\"stockopeningprice\": \"".$rs[21]."\",";
        echo "\"stockhighprice\": \"".$rs[22]."\",";
        echo "\"stocklowprice\": \"".$rs[23]."\",";
        echo "\"changereturn\": \"".$rs[24]."\",";
        echo "\"changeyearreturn\": \"".$rs[25]."\",";
        echo "\"lastbackprice\": \"".$rs[26]."\",";
        echo "\"dueday\": \"".$rs[27]."\",";
        echo "\"backreturn\": \"".$rs[28]."\",";
        echo "\"backyearreturn\": \"".$rs[29]."\",";
        echo "\"CBvalue\": \"".$rs[30]."\",";
        echo "\"Ecalloptionvalue\": \"".$rs[31]."\",";
        echo "\"fluctuate\": \"".$rs[32]."\",";
        echo "\"d1\": \"".$rs[33]."\",";
        echo "\"hedgeratio\": \"".$rs[34]."\"";
        echo "},";    
            
    }
            
    ?>

     ];

    $(document).ready(function() {

        var table = $('#example').DataTable({
            "paging": false,
            "data": dataSet,
            "columns": [{
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": ''
            }, {
                "data": "CBid"
            }, {
                "data": "CBname"
            }, {
                "data": "changereturn"
            }, {
                "data": "changeyearreturn"
            }, {
                "data": "backreturn"
            }, {
                "data": "backyearreturn"
            }, {
                "data": "hedgeratio"
            }],
            "order": [
                [1, 'asc']
            ],
            "info": false
                //"scrollX": true
        });

        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
        $('#example tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
        });
        $('#button').click(function() {
            alert(table.rows('.selected').data().length + ' row(s) selected');
        });

        theoption(); //驅動篩選器的顯示
    });
    </script>
    <!-------- 至頂插件 ---------->
    <script type="text/javascript" src="js/manhuatoTop.1.01.js"></script>
    <script type="text/javascript">
    $(function() {
        $(window).manhuatoTop({
            showHeight: 100, //设置滚动高度时显示
            speed: 500 //返回顶部的速度以毫秒为单位
        });
    });
    </script>
    <!----------- 篩選器顯示----------------->
    <script type="text/javascript">
    function theoption() {
        if ($("#selectoption").find("option:selected").text() == "介於") {
            $("#inputselect1").show();
            $("#showselect2").show();
            layer.closeTips();
        } else {
            $("#inputselect1").show();
            $("#showselect2").hide();
            if (($("#selectoption").find("option:selected").text() == "是空的") || $("#selectoption").find("option:selected").text() == "所有" || $("#selectoption").find("option:selected").text() == "不是空的") {
                $("#inputselect1").hide();
                layer.closeTips();
            }
        }
    }
    </script>
    <!------------------- 動態偵錯 ---------------------->
    <script type="text/javascript" src="layer-v1.8.5/layer/layer.min.js"></script>
    <script type="text/javascript">
    function showtip(theinput) {
        //顯示tip
        layer.tips('請輸入有效數值並不可為空。', $('input#' + theinput), {
            guide: 1,
            style: ['background-color:#c00; color:#fff;font-size:16px', '#c00'],
            time: 0,
            more: false
        });
    }

    function checkNaN(value) {
        if (value != "") {
            if (isNaN(value)) { //如果他不是數字
                return false;
            } else {
                if (value.substr(0, 1) == "-") {
                    if (value.indexOf(".") == 1 || value.indexOf(" ") == 1 || value.indexOf("　") == 1 || value.indexOf(".") == (value.length - 1) || value.indexOf(" ") == (value.length - 1) || value.indexOf("　") == (value.length - 1)) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    if (value.indexOf(".") == 0 || value.indexOf(" ") == 0 || value.indexOf("　") == 0 || value.indexOf(".") == (value.length - 1) || value.indexOf(" ") == (value.length - 1) || value.indexOf("　") == (value.length - 1)) {
                        return false;
                    } else {
                        return true;
                    }
                }
            }
        } else {
            return false;
        }
    }

    function checkvalue() {
        theinputselect1 = $('input#inputselect1').val();
        theinputselect2 = $('input#inputselect2').val();
        /* 若要動態偵錯，將附註拿掉即可
        if($("#selectoption").find("option:selected").text()!="介於"&&$("#selectoption").find("option:selected").text()!="所有"&&$("#selectoption").find("option:selected").text()!="是空的"&&$("#selectoption").find("option:selected").text()!="不是空的"){
        	if(!checkNaN(theinputselect1)){//如果他不是數字
        		showtip("inputselect1");
        	}else{
        		//他是數字
        		layer.closeTips();
        	}	
        }else{
        	if($("#selectoption").find("option:selected").text()=="介於"){
        		if(!checkNaN(theinputselect1)){//如果他不是數字
        			showtip("inputselect1");
        		}else{
        			if(!checkNaN(theinputselect2)){//如果他不是數字
        				showtip("inputselect2");
        			}else{					
        				//他是數字
        				layer.closeTips();
        			}
        		}				
        	}
        }*/
    }
    </script>
    <!------------------- 表格送出偵錯 ---------------------->
    <script type="text/javascript">
    function checkdata() {
        $('span.wrong').show();
        theinputselect1 = $('input#inputselect1').val();
        theinputselect2 = $('input#inputselect2').val();

        if ($("#selectoption").find("option:selected").text() != "介於" && $("#selectoption").find("option:selected").text() != "所有" && $("#selectoption").find("option:selected").text() != "是空的" && $("#selectoption").find("option:selected").text() != "不是空的") {
            if (!checkNaN(theinputselect1)) { //如果他不是數字
                $('span.wrong').show();
                return false;
            } else {
                //他是數字
                $('span.wrong').hide();
                return true;
            }
        } else {
            if ($("#selectoption").find("option:selected").text() == "介於") {
                if (!checkNaN(theinputselect1) || !checkNaN(theinputselect2)) { //如果他不是數字
                    $('span.wrong').show();
                    return false;
                } else {
                    //他是數字
                    $('span.wrong').hide();
                    return true;
                }
            } else {
                $('span.wrong').hide();
                return true;
            }
        }
    }
    </script>
    <!---------------------導入分類標籤特效---------------------->
    <link rel="stylesheet" href="css/webwidget_scroller_tab.css" type="text/css" />
    <script type='text/javascript' src='js/webwidget_scroller_tab.js'></script>
    <script language="javascript" type="text/javascript">
    $(function() {
        $(".webwidget_scroller_tab").webwidget_scroller_tab({
            //scroller_time_interval: '1000',  //會自動捲
            scroller_window_padding: '10',
            scroller_window_width: '920',
            scroller_window_height: '1300',
            scroller_head_text_color: '#0099FF',
            scroller_head_current_text_color: '#434142',
            directory: 'images'
        });
    });
    </script>
</head>

<body class="dt-example">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <form id="form1" name="form1" method="post" onSubmit="return checkdata()">
            <div class="item">
                <h2>可轉換公司債(CB)套利系統</h2></div>
            <section>
                <div id="pricetime" style="padding:5px 0px;">價格資料時間：
                    <input id="pricetime" name="pricetime" type="text" value="20150820" size="7" />&nbsp;&nbsp;
                    <input type="submit" name="submit" id="submit" value="搜尋" onClick="javascript:$('input#action').val('select1');" />
                    <input type="hidden" name="action" id="action" value="select" />
                </div>
                <div id="select" style="padding:5px 0px;">篩選：
                    <select class="selectitem" name="selectitem">
                        <option value="changereturn">轉換報酬率</option>
                        <option value="changeyearreturn">轉換年化報酬率</option>
                        <option value="backreturn">賣回期間報酬率</option>
                        <option value="backyearreturn">賣回年化報酬率</option>
                        <option value="hedgeratio">避險比率</option>
                        <option value="changeprice">轉換價格</option>
                        <option value="lastduedate">最近一期到期日</option>
                        <option value="backprice">最近一次賣回權價格</option>
                        <option value="CBduedate">CB到期日</option>
                        <option value="CBdueprice">CB成交價</option>
                        <option value="dealprice">CB買進價</option>
                        <option value="inprice">CB賣出價</option>
                        <option value="outprice">CB成交量</option>
                        <option value="dealamount">CB開盤價</option>
                        <option value="highprice">CB最高價</option>
                        <option value="lowprice">CB最低價</option>
                        <option value="stockdealprice">股票成交價</option>
                        <option value="stockinprice">股票買進價</option>
                        <option value="stockoutprice">股票賣出價</option>
                        <option value="stockdealamount">股票成交量</option>
                        <option value="stockopeningprice">股票開盤價</option>
                        <option value="stockhighprice">股票最高價</option>
                        <option value="stocklowprice">股票最低價</option>
                        <option value="lastbackprice">最近一期賣回價格或到期面額</option>
                        <option value="dueday">距到期日(天)</option>
                        <option value="CBvalue">CB純債券價值</option>
                        <option value="Ecalloptionvalue">歐式買權價值</option>
                        <option value="fluctuate">隱含波動度</option>
                        <option value="d1">d1</option>
                    </select>
                    <select id="selectoption" class="selectoption" name="selectoption" onchange="theoption();checkvalue()">
                        <option value="%">所有</option>
                        <option value="<">小於</option>
                        <option value="<=">小於等於</option>
                        <option value=">">大於</option>
                        <option value=">=">大於等於</option>
                        <option value="between">介於</option>
                        <option value="isNull">是空的</option>
                        <option value="isnotNull">不是空的</option>
                    </select>
                    <input id="inputselect1" name="inputselect1" type="text" value="" size="7" onBlur="checkvalue()" onClick="checkvalue()" onKeyUp="checkvalue()" />
                    <span id="showselect2" style="display:none"> ~ <input id="inputselect2" name="inputselect2" type="text" value="" size="7" onBlur="checkvalue()" onClick="checkvalue()" onKeyUp="checkvalue()" /></span>
                    <input type="submit" name="submit" id="submit" value="搜尋" onClick="javascript:$('input#action').val('select2');" />
                    <input type="submit" name="submit" id="submit" value="顯示全部" onClick="javascript:$('input#action').val('select1');" />
                    <span style='color:red;display:none;padding-left:10px' class='wrong'><a title="若為輸入百分比符號(%)，請自行轉換為小數點形式" class='wrong'>*篩選條件無效 ==> 欄位不可為空，並請輸入有效的數值</a></span>
                </div>
                <div id="count" style="padding:5px 0px;float:left;width:200px;margin-bottom:10px;">查詢結果：共318筆 </div>
                <div id="showbotton" style="padding:5px 0px;text-align:right"><a class="add" onClick="if($('div.webwidget_scroller_tab').css('display')=='block'){$('a.add').html('+ 可轉換公司債套利說明文件');$('div.webwidget_scroller_tab').slideUp();}else{$('a.add').html('- 可轉換公司債套利說明文件');$('div.webwidget_scroller_tab').slideDown();}">+ 可轉換公司債套利說明文件</a>
                    <a class="download" href="img/可轉換公司債套利說明文件.pdf" target="_blank">下載檔案(pdf)</a></div>
                <div class="webwidget_scroller_tab" id="webwidget_scroller_tab" style="height:1280px;display:none;margin:20px 0px 20px 30px">
                    <div class="tabContainer">
                        <ul class="tabHead">
                            <li class="currentBtn"><a href="javascript:;">可轉換公司債交易策略 - 轉換套利</a></li>
                            <li><a href="javascript:;">可轉換公司債交易策略 - 賣回套利</a></li>
                            <li><a href="javascript:;">可轉換公司債動態套利</a></li>
                        </ul>
                    </div>
                    <div class="tabBody">
                        <ul>
                            <li class="tabCot">
                                <div class="data1">
                                    <table width="904" border="0" align="center" style="line-height:25px;color:black;">
                                        <tr>
                                            <td width="898" style="font-size:26px;text-align:center;padding:20px 0px;"><b>可轉換公司債交易策略 - 轉換套利</b></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px 30px;"> 可轉換公司債的市場價格和標的股價彼此間具有連動性的存在，當可轉換公司債股價不能有效的反應標的股價的上漲，兩者就會有價差出現，可進行套利。</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 30px;">
                                                <p>假設：</p>
                                                <p>(1) 個股可以放空，且以買價放空。</p>
                                                <p>(2) 可轉換公司債可以購買，且以賣價成交。</p>
                                                <p>(3) 股票可無限分割。</p>
                                                <p>(4) 10個交易日轉換結束</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px 30px;" align="center">
                                                <p>若 CB
                                                    < S∙R 成立，則有套利空間。</p>
                                                        <p><img src="img/list_clip_image002.png" alt="轉換套利期間報酬率=(S∙R-CB)/(CB+0.9∙S∙R)" width="264" height="36" /></p>
                                                        <p><img src="img/list_clip_image002_0001.png" alt="轉換套利期間年化報酬率=轉換套利期間報酬率∙252/10" width="378" height="36" /></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0px 10px 250px;">
                                                <p>CB：可轉換公司債賣價</p>
                                                <p>S：個股買價</p>
                                                <p>R：轉換比例=可轉換公司債/轉換價格</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 30px;">註：報酬率計算未考慮交易成本。</td>
                                        </tr>
                                    </table>
                                </div>
                            </li>
                            <li class="tabCot">
                                <div class="data2">
                                    <table width="904" border="0" align="center" style="line-height:25px;color:black;">
                                        <tr>
                                            <td width="898" style="font-size:26px;text-align:center;padding:20px 0px;"><b>可轉換公司債交易策略 - 賣回套利</b></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px 30px;"> 利用投資人要求達到的報酬率，和發行公司所設定賣回權的價格，推算出達到符合投資人要求報酬率可買入的可轉換公司債的市價。可選擇等待發行公司的賣回價格再賣回給發行公司，或是在投資人買入的期間，可轉換公司債的市價有達到投資人要求的報酬率即可賣出可轉換公司債，實現獲利。</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 30px;">
                                                <p>假設：</p>
                                                <p>(1) 個股可以放空，且以買價放空。</p>
                                                <p>(2) 可轉換公司債可以購買，且以賣價成交。</p>
                                                <p>(3) 股票可無限分割。</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px 30px;" align="center">
                                                <p><img src="img/list_clip_image002_0003.png" alt="賣回報期間酬率=(CBP-CB)/CB" width="199" height="36" /></p>
                                                <p><img src="img/list_clip_image002_0004.png" alt="賣回年化報酬率=賣回報期間酬率∙365/T" width="282" height="36" /></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0px 10px 250px;">
                                                <p>CBP：可轉換公司債最近一期賣回價格或到期面額價格</p>
                                                <p>CB：可轉公司債賣價</p>
                                                <p>T：目前時點距最近一期賣回日或到期日天數</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 30px;">註：報酬率計算未考慮交易成本。</td>
                                        </tr>
                                    </table>
                                </div>
                            </li>
                            <li class="tabCot">
                                <div class="data1">
                                    <table width="904" border="0" align="center" style="line-height:25px;color:black;">
                                        <tr>
                                            <td width="898" style="font-size:26px;text-align:center;padding:20px 0px;"><b>可轉換公司債動態套利</b></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px 30px;">可轉換公司債評價簡化模型：</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 30px;">
                                                <p><img src="img/list_clip_image002_0007.png" alt="CB(T)=Max[CBP,R×S(T)]=CBP+[CBP-CBP,R×S(T)-CBP]" width="461" height="19" /></p>
                                                <p><img src="img/list_clip_image002_0006.png" alt="             =CBP+Max[R×S(T)-CBP,0]=CBP+R×Max[S(T)-CBP/R,0]" width="505" height="37" /></p>
                                                <p><img src="img/list_clip_image002_0008.png" alt="             =CBP+R×C(T)" width="169" height="19" /></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0px 10px 80px;">
                                                <p>CB(T)：可轉換零息公司債在時點T的價值</p>
                                                <p>S(T)：可轉換公司債到期時的股價</p>
                                                <p>C(T)：到期日為T，履約價格為歐式選擇權價值</p>
                                                <p>R：轉換比例，等於面額除以轉換價格</p>
                                                <p>CBP：可轉換公司債面額或是最近賣回日的賣回價格</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 0px 0px 30px;">由Black及Scholes(1973)提出的買權評價模式可知：</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0px 10px 80px;">
                                                <p><img src="img/list_clip_image002_0009.png" alt="C(0)=S(0)×N(d1)-CBP/R e^(-rT)×N(d2)" width="282" height="36" /></p>
                                                <p><img src="img/list_clip_image002_0010.png" alt="d1=(ln⁡[(S(0)×R)/M]+(r+1/2 σ^2 )T)/(σ√T)" width="226" height="57" /></p>
                                                <p><img src="img/list_clip_image002_0011.png" alt="d2=d1-σ√T" width="105" height="21" /></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px 0px 10px 80px;">
                                                <p>σ：標的股票報酬率之標準差</p>
                                                <p>r：無風險利率</p>
                                                <p>N( ∙ )：標準化常態分配的累積機率</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 0px 0px 30px;">可轉換零息公司債理論價值為：</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0px 10px 80px;">
                                                <p><img src="img/list_clip_image002_0012.png" alt="CB(0)=CBP×e^(-rT)+R×C(0)" width="218" height="19" /></p>
                                                <p><img src="img/list_clip_image002_0013.png" alt="             =CBP×e^(-rT)+R×[S(0)×N(d1)-CBP/R e^(-rT)×N(d2)]" width="429" height="37" /></p>
                                                <p><img src="img/list_clip_image002_0014.png" alt="             =CBP×e^(-rT)×[1-N(d2)]+R×S(0)×N(d1)" width="377" height="19" /></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 0px 0px 30px;">故可轉換零息公司債避險比率等於：</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0px 10px 80px;">
                                                <p><img src="img/list_clip_image002_0015.png" alt="0≤∆CB/∆S=R×N(d1)≤R" width="183" height="36" /></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 0px 0px 30px;">由於可轉換零息公司債不只可以在到期時轉換價格，亦可以在到期日前轉換，故可轉換零息公司債價格應為：</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0px 10px 80px;">
                                                <p><img src="img/list_clip_image002_0016.png" alt="CB(0)≥CBP×e^(-rT)+R×C(0)" width="218" height="19" /></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 0px 0px 30px;">換言之，可轉換零息公司債避險比例應為：</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0px 10px 80px;">
                                                <p><img src="img/list_clip_image002_0017.png" alt="∆CB/∆S≥R×N(d1)" width="122" height="48" /></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </li>
                        </ul>
                        <div style="clear:both"></div>
                    </div>
                    <div class="modBottom">
                        <span class="modABL">&nbsp;</span><span class="modABR">&nbsp;</span>
                    </div>
                </div>
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>CB代碼</th>
                            <th>CB名稱</th>
                            <th>轉換報酬率</th>
                            <th>轉換年化報酬率</th>
                            <th>賣回期間報酬率</th>
                            <th>賣回年化報酬率</th>
                            <th>避險比率</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>CB代碼</th>
                            <th>CB名稱</th>
                            <th>轉換報酬率</th>
                            <th>轉換年化報酬率</th>
                            <th>賣回期間報酬率</th>
                            <th>賣回年化報酬率</th>
                            <th>避險比率</th>
                        </tr>
                    </tfoot>
                </table>
            </section>
        </form>
    </div>
</body>