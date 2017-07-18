<!--
Notations:
{
yur (YUR): years until retirement,
rts (RTS): risk tolerance score,
age: client's age,
aa: asset allocation,
aa_table: asset allocation table,
aa_pie: asset allocation pie,
fr: fund return,
fr_graph: fund return graph,
}
-->

<!--Include Header-->
<?php include "navbar.html" ?>

<link rel="stylesheet" href="css/retirementplanner.css">

<!--Description of Retirement Planner-->
<div class="description" id="description">
	想要快樂的退休嗎？用我們理財規劃計算機...
</div>

<button id="testID"> Test Interactive Dashboard</button>
<!--Form 1: get RTS, YUR, and Age-->
<div class="container-fluid">
	<form id="form1" action="">
		<ul>
			<li style="font-weight: bold; font-size: 1.5em;">基本資料</li>
			<div class="form-group">   
	       		<label for="q1">請問您今年幾歲？</label>
	        	<input type="number" id="q1" min=18 max=150 step=1 required>
	        </div>
	        <div class="form-group">   
	       		<label for="q2">請問您預計幾年後退休？</label>
	        	<input type="number" id="q2" min=5 max=40 step=1 required>
	        </div>
	        <div class="form-group">   
	       		<label for="q3">請問您退休後希望有多少存款（台幣)？</label>
	        	<input type="number" id="q3" step=1 min=1 max=20 required>百萬
	        </div>	        
	        <li style="font-weight: bold; font-size: 1.5em;">投資風險承受能力</li>
	        <div class="form-group">
	          <label for="q4">請問您目前持有的投資資產配置多少比例於股票或股票型基金；若無，曾持有的投資型商品約佔資產比例為何？</label>
	          <select class="form-control" id="q4" size=12 required>
	            <option value=10>不曾持有投資型商品，沒有投資經驗</option>
	            <option value=1> 不曾持有投資型商品，全部放在定存</option>
	            <option value=2> 目前沒有，但曾經20%以下資產配置於投資型商品</option>
	            <option value=6> 目前沒有，但曾經20~40%資產配置於投資型商品</option>
	            <option value=10> 目前沒有，但曾經40~60%資產配置於投資型商品</option>
	            <option value=14> 目前沒有，但曾經60~80%資產配置於投資型商品</option>
	            <option value=18> 目前沒有，但曾經超過80%資產配置於投資型商品</option>
	            <option value=4> 目前1~20%資產配置於投資型商品</option>
	            <option value=8>目前21~40%資產配置於投資型商品</option>
	            <option value=12> 目前41~60%資產配置於投資型商品</option>
	            <option value=16> 目前61~80%資產配置於投資型商品</option>
	            <option value=20> 目前超過80%資產配置於投資型商品</option>
	          </select>
	        </div>
	        <div class="form-group">
	          <label for="q5">目前持有的資產有多少比例在定期存款？</label>
	          <select class="form-control" id="q5" size=8 required>
	            <option value=7>沒有定存，沒有投資經驗</option>
	            <option value=1> 不曾持有投資型商品，全部放在定存</option>
	            <option value=15> 沒有定存，全部放在投資型商品</option>
	            <option value=12> 定存比例20%以下</option>
	            <option value=9> 定存比例20~40%</option>
	            <option value=6> 定存比例40~60%</option>
	            <option value=4> 定存比例60~80%</option>
	            <option value=2> 定存比例80%以上</option>
	          </select>
	        </div>
	        <div class="form-group">
	          <label for="q6">長期而言，您期望每年平均能獲得多少投資報酬率？(以投資金額10萬為例)</label>
	            <select class="form-control" id="q6" size=5 required>
	            <option value=3>1~2% (期望每年獲利1~2千)</option>
	            <option value=6>3~5% (期望每年獲利3~5千)</option>
	            <option value=10>6~10% (可接受每年獲利6千~1萬)</option>
	            <option value=15>10~15% (可接受每年獲利1~1.5萬)</option>
	            <option value=20>15%以上 (可接受每年獲利1.5萬以上)</option>
	          </select>
	        </div>
	        <div class="form-group">
	          <label for="q7">長期而言，您平均每年所能承擔的最大損失約為何？(以投資金額10萬為例)</label>
	          <select class="form-control" id="q7" size=5 required>
	            <option value=3>1~2% (期望每年損失1~2千)</option>
	            <option value=6>3~5% (期望每年損失3~5千)</option>
	            <option value=10>6~10% (可接受每年損失6千~1萬)</option>
	            <option value=15>10~15% (可接受每年損失1~1.5萬)</option>
	            <option value=20>15%以上 (可接受每年損失1.5萬以上)</option>
	          </select>
	        </div>
	        <div class="form-group">
	          <label for="q8">附圖為一車輛油量表，在不考慮外部因素的情況下(如：油價即將調升/降)，您大部分在油表到哪個位置時，覺得應該去加油？</label>
	          <img src="img/gasmeter.png" class="img-responsive" alt="油量表" width="25%" height=auto>
	          <select class="form-control" id="q8" size=5 required>
	            <option value=2>隨時維持滿格狀態</option>
	            <option value=5>用了一半(位置)</option>
	            <option value=8>用到紅線警示區(位置)</option>
	            <option value=11>用到警示區中間(位置)</option>
	            <option value=15>油箱沒油才加(位置)</option>
	          </select> 
	        </div>
	        <button class="btn btn-lg" type="submit" id="form1submit" style="background-color: #005A31; font-size:1em; color: white;">送出</button>
	    </ul>  
		   
	</form>
</div> 



<!--Interactive Dashboard-->
<div id="interactivedashboard">
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-md-2">
				<div class="chartcontrol">
					<div class="row">
						<div id="showYUR"></div>
						<br>
						<input id="yur_id_input" type="range" min=5 max=40>
						<br><br><br>
					</div>
					<div class="row">
						<div id="showIAR"></div>
						<br>	
						<input id="iar_id_input" type="range" step=1 min=1 max=20>
						<br><br><br>
					</div>
					<div class="row">
						<div id="showRTS"></div>	
						<br>	
						<input id="rts_id_input" type="range" min=1 max=100> 
						<a id="openForm2Modal" data-toggle="modal" data-target="#form2Modal">重新計算我願意接受的投資風險</a> <br><br><br>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-4">
						<div class="chartitem" style="font:bold; min-height: 50px">
							<h5> 快樂退休	  理財規劃 </h5>
						</div>
					</div>

					<div class="col-md-4">
						<div class="chartitem" style="min-height: 50px">
							正常市場環境
							<div id="showFR50"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="chartitem" style="min-height: 50px">
							艱苦市場環境
							<div id="showFR25"></div>
						</div>
						
					</div>					
				</div>
				<div class="row">
				<div class="col-md-4">
					<div class="chartitem" style="min-height:500px">
						2017年資產配置建議
						<div id="assetallocationpie" ></div>
						<a id="opengg" data-toggle="modal" data-target="#almModal"><div id="showYUR2"></div></a>
					</div>
				</div>	
				<div class="col-md-8">
					<div class="chartitem" style="min-height:500px">
						資產成長
						<div id="fundreturnchart"></div>
					</div>
				</div>
						
			</div>
		</div>
	</div>
</div>

<!-- Pop-up Modal for recalculating RTS -->
<div id="form2Modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">投資風險承受度計算</h3>
      </div>
      <div class="modal-body">
        <form action="" id="form2">
        <div class="tab-content">
          <div id="tab1" class="tab-pane active">
            <div class="form-group">
              <label for="q1_f2">請問您目前持有的投資資產配置多少比例於股票或股票型基金；若無，曾持有的投資型商品約佔資產比例為何？</label>
              <select class="form-control" id="q1_f2" size=12>
                <option value=10>不曾持有投資型商品，沒有投資經驗</option>
                <option value=1> 不曾持有投資型商品，全部放在定存</option>
                <option value=2> 目前沒有，但曾經20%以下資產配置於投資型商品</option>
                <option value=6> 目前沒有，但曾經20~40%資產配置於投資型商品</option>
                <option value=10> 目前沒有，但曾經40~60%資產配置於投資型商品</option>
                <option value=14> 目前沒有，但曾經60~80%資產配置於投資型商品</option>
                <option value=18> 目前沒有，但曾經超過80%資產配置於投資型商品</option>
                <option value=4> 目前1~20%資產配置於投資型商品</option>
                <option value=8>目前21~40%資產配置於投資型商品</option>
                <option value=12> 目前41~60%資產配置於投資型商品</option>
                <option value=16> 目前61~80%資產配置於投資型商品</option>
                <option value=20> 目前超過80%資產配置於投資型商品</option>
              </select>
              <button class="btn btn-primary" data-toggle="tab" href="#tab2">下一題</button>
            </div>
          </div>
          <div id="tab2" class="tab-pane">
            <div class="form-group">
              <label for="q2_f2">目前持有的資產有多少比例在定期存款？</label>
              <select class="form-control" id="q2_f2" size=8>
                <option value=7>沒有定存，沒有投資經驗</option>
                <option value=1> 不曾持有投資型商品，全部放在定存</option>
                <option value=15> 沒有定存，全部放在投資型商品</option>
                <option value=12> 定存比例20%以下</option>
                <option value=9> 定存比例20~40%</option>
                <option value=6> 定存比例40~60%</option>
                <option value=4> 定存比例60~80%</option>
                <option value=2> 定存比例80%以上</option>
              </select>
              <button class="btn btn-primary" data-toggle="tab" href="#tab1">上一題</button>
              <button class="btn btn-primary" data-toggle="tab" href="#tab3">下一題</button>
            </div>
          </div>
          <div id="tab3" class="tab-pane">
            <div class="form-group">
              <label for="q3_f2">長期而言，您期望每年平均能獲得多少投資報酬率？(以投資金額10萬為例)(15pt)</label>
                <select class="form-control" id="q3_f2" size=5>
                <option value=3>1~2% (期望每年獲利1~2千)</option>
                <option value=6>3~5% (期望每年獲利3~5千)</option>
                <option value=10>6~10% (可接受每年獲利6千~1萬)</option>
                <option value=15>10~15% (可接受每年獲利1~1.5萬)</option>
                <option value=20>15%以上 (可接受每年獲利1.5萬以上)</option>
              </select>
              <button class="btn btn-primary" data-toggle="tab" href="#tab2">上一題</button>
              <button class="btn btn-primary" data-toggle="tab" href="#tab4">下一題</button>
            </div>
          </div>
          <div id="tab4" class="tab-pane">
            <div class="form-group">
              <label for="q4_f2">長期而言，您平均每年所能承擔的最大損失約為何？(以投資金額10萬為例)</label>
              <select class="form-control" id="q4_f2" size=5>
                <option value=3>1~2% (期望每年損失1~2千)</option>
                <option value=6>3~5% (期望每年損失3~5千)</option>
                <option value=10>6~10% (可接受每年損失6千~1萬)</option>
                <option value=15>10~15% (可接受每年損失1~1.5萬)</option>
                <option value=20>15%以上 (可接受每年損失1.5萬以上)</option>
              </select>
              <button class="btn btn-primary" data-toggle="tab" href="#tab3">上一題</button>
              <button class="btn btn-primary" data-toggle="tab" href="#tab5">下一題</button>
            </div>
          </div>
          <div id="tab5" class="tab-pane">
            <div class="form-group">
              <label for="q5_f2">附圖為一車輛油量表，在不考慮外部因素的情況下(如：油價即將調升/降)，您大部分在油表到哪個位置時，覺得應該去加油？</label>
              <select class="form-control" id="q5_f2" size=5>
                <option value=2>隨時維持滿格狀態</option>
                <option value=5>用了一半(位置)</option>
                <option value=8>用到紅線警示區(位置)</option>
                <option value=11>用到警示區中間(位置)</option>
                <option value=15>油箱沒油才加(位置)</option>
              </select>
              <button class="btn btn-primary" data-toggle="tab" href="#tab4">上一題</button>
              <button type="submit" id="form2submit" class="btn btn-primary" data-toggle="tab" href="#tab6">計算風險承受度</button>             
            </div>  
          </div>
          <div id="tab6" class="tab-pane">
            <div id="showRTSForm2">
            <button type="button" class="btn btn-primary" data-toggle="tab" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
      	</form>
      </div>
    </div>
  </div>
</div> 


<!-- Pop-up Modal for showing ALM table -->
<div class="modal fade" id="almModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><div id="showYUR3" style="font-size:2em"></h4>
			</div>
		<div class="modal-body">
			<div id="assetallocationtable"></div>
		</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
	</div>
</div>





<script src="js/retirementplanner.js"></script>

</body>


</html>




