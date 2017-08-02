/*
Notations:
{
yur (YUR): years until retirement,
rts (RTS): risk tolerance score,
age: client's age,
iar: expected income (monthly) after retirement,
aa: asset allocation,
aa_table: asset allocation table,
aa_pie: asset allocation pie,
fr: fund return,
fr_graph: fund return graph,
}
*/


function calculateRTSForm1(age0) {
	var agegroupvalue;
	if (age0 < 23) {agegroupvalue = 11;}
	else if (age0 < 29) {agegroupvalue = 15;}
	else if (age0 < 36) {agegroupvalue = 13;}
	else if (age0 < 41) {agegroupvalue = 8;}
	else if (age0 < 51) {agegroupvalue = 5;}
	else {agegroupvalue = 2;}
	return agegroupvalue + eval($("#q4").val() + "+" + $("#q5").val() + "+" + $("#q6").val() + "+" + $("#q7").val() + "+" + $("#q8").val());
}

function calculateRTSForm2(age0) {
	var agegroupvalue;
	if (age0 < 23) {agegroupvalue = 11;}
	else if (age0 < 29) {agegroupvalue = 15;}
	else if (age0 < 36) {agegroupvalue = 13;}
	else if (age0 < 41) {agegroupvalue = 8;}
	else if (age0 < 51) {agegroupvalue = 5;}
	else {agegroupvalue = 2;}
	return agegroupvalue + eval($("#q1_f2").val() + "+" + $("#q2_f2").val() + "+" + $("#q3_f2").val() + "+" + $("#q4_f2").val() + "+" + $("#q5_f2").val());
}

function interactivedashboardSetUp(yur0,rts0,iar0,fr75,fr50,fr25) {
	$("#showYUR").html(parseInt(yur0) + "年後退休");
	$("#showRTS").html("願意接受的投資風險" + parseInt(rts0));
	$("#showYUR2").html("未來" + parseInt(yur0) + "年資產配置建議" );
	$("#showYUR3").html("未來" + parseInt(yur0) + "年資產配置建議");
	$("#showIAR").html("退休後期望有" + parseInt(iar0) + "百萬元存款");
	$("#showFR75").html(parseFloat(fr75).toFixed(2) + "百萬");
	$("#showFR50").html(parseFloat(fr50).toFixed(2) + "百萬");
	$("#showFR25").html(parseFloat(fr25).toFixed(2) + "百萬");
}

$(document).ready(function(){

	var ALMData,
		yur,
		rts,
		age,
		iar,
		fr75,
		fr50,
		fr25,
		AssetAllocationPie0 = new AssetAllocationPie();
		FundReturnChart0 = new FundReturnChart();
		AssetAllocationTable0 = new AssetAllocationTable();

	$("#interactivedashboard").hide();


	$("#testID").on("click",function(e) {
		age = 22;
		yur = 20;
		iar = 3;
		rts = 30;

		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			//alert(data);
			ALMData = JSON.parse(data);
			AssetAllocationPie0.create(ALMData,0);
			FundReturnChart0.create(ALMData,iar);
			AssetAllocationTable0.create(ALMData);
			fr75 = ALMData[ALMData.length-1].seventyfive_percentile;
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr75,fr50,fr25);
		});
		$("#form1").hide();
		$("#description").hide();
		// $("#description").html("資產配置建議");	
		$("#testID").hide();
		$("#interactivedashboard").show();

		return false;
	});

	$("#form1submit").on("click",function(e){
		age = $("#q1").val();
		yur = $("#q2").val();
		iar = $("#q3").val();
		rts = calculateRTSForm1(age);
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			//alert(data);
			ALMData = JSON.parse(data);
			AssetAllocationPie0.create(ALMData,0);
			FundReturnChart0.create(ALMData,iar);
			AssetAllocationTable0.create(ALMData);	
			fr75 = ALMData[ALMData.length-1].seventyfive_percentile;
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr75,fr50,fr25);		
		});
		$("#form1").hide();
		// $("#description").html("資產配置建議");
		$("#interactivedashboard").show();
		return false;
	});

	$("#yur_id_input").on("input change", function(){
		yur = $("#yur_id_input").val();
		$("#showYUR2").html("未來" + parseInt(yur) + "年資產配置建議");
		$("#showYUR").html(parseInt(yur) + "年後退休");
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			//alert(data);
			ALMData = JSON.parse(data);
			AssetAllocationPie0.update(ALMData,0);
			FundReturnChart0.update(ALMData,iar);
			AssetAllocationTable0.update(ALMData);
			fr75 = ALMData[ALMData.length-1].seventyfive_percentile;
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr75,fr50,fr25);
		});
	});


	$("#rts_id_input").on("input change", function(){
		rts = $("#rts_id_input").val();
		$("#showRTS").html("願意接受的投資風險" + parseInt(rts));
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			//alert(data);
			ALMData = JSON.parse(data);
			AssetAllocationPie0.update(ALMData,0);
			FundReturnChart0.update(ALMData,iar);
			AssetAllocationTable0.update(ALMData);
			fr75 = ALMData[ALMData.length-1].seventyfive_percentile;
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr75,fr50,fr25);
		});
	});

	$("#iar_id_input").on("input change", function(){
		iar = $("#iar_id_input").val();
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			ALMData = JSON.parse(data);
			FundReturnChart0.update(ALMData,parseInt(iar));
			fr75 = ALMData[ALMData.length-1].seventyfive_percentile;
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr75,fr50,fr25);
		});
	});

	$("#calculateRTS").on("click",function(){
		rts = eval($("#q1").val() + "+" + $("#q2").val()+ "+" + $("#q3").val()+ "+" + $("#q4").val() + "+"+ $("#q5").val()+ "+" +$("#q6").val());
		$("#showRTS").html(rts_calculated);
		$("#rts").val(rts_calculated)
		$("#showRTS2").html("願意接受的投資風險：" + $("#rts").val());
	});

	$("#form2submit").on("click",function(){
		rts = calculateRTSForm2(age);
		$("#showRTSForm2").html("投資風險承受能力" + parseInt(rts));
		interactivedashboardSetUp(yur,rts,iar);
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			ALMData = JSON.parse(data);
			AssetAllocationPie0.update(ALMData,0);
			FundReturnChart0.update(ALMData,iar);
			AssetAllocationTable0.create(ALMData);
			fr75 = ALMData[ALMData.length-1].seventyfive_percentile;
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr75,fr50,fr25);
		});
	});

	$("#openForm2Modal").on("click",function(){
		$("#tab6").removeClass("active");
		$("#tab1").addClass("active");
	});
});


