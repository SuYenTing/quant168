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

function AssetAllocationTable() {
	var table = d3.select("#assetallocationtable").append('table');
	var thead = table.append("thead");
	var tbody = table.append("tbody");
	var columns = ['年', '股票','債卷','現金'];
	var columnsEN = ['year','stock_weight','bonds_weight', 'money_weight'];
	var rows = tbody.selectAll('tr');

	var updateTable = function(){
	}
	this.create = function(data){
	data.shift(); //remove 2017
	thead.append('tr')
		.selectAll('th')
		.data(columns)
		.enter()
		.append('th')
		.text(function(column) { return column});

	rows
	.data(data)
	.enter()
	.append('tr');

	rows = tbody.selectAll('tr');

	var cells = rows.selectAll("td")
		.data(function(row){
			return columnsEN.map(function(column){
				if (column=="year") {
					return {column: column, value: row[column]};
				}
				else {
					return {column: column, value: parseFloat(row[column]).toLocaleString("en", {style: "percent"})};
				}
			})
		})
		.enter()
		.append('td')
		.text(function(d) { return d.value;});
	}

	this.update = function(data){
		data.shift(); //remove 2017
		thead.append('tr')
			.selectAll('th')
			.data(columns)
			.text(function(column) { return column});

		rows
		.data(data)


		rows = tbody.selectAll('tr');

		var cells = rows.selectAll("td")
			.data(function(row){
				return columnsEN.map(function(column){
					if (column=="year") {
						return {column: column, value: row[column]};
					}
					else {
						return {column: column, value: parseFloat(row[column]).toLocaleString("en", {style: "percent"})};
					}
				})
			})
			.text(function(d) { return d.value;});
	}



}



function AssetAllocationPie() {
	var PieChart = d3.select("#assetallocationpie");
	var margin = {top: 90, right: 90, bottom: 90, left: 90},
	    width = 250,
	    height = 250,
	    width_g = width - margin.left - margin.right,
	    height_g = height - margin.top - margin.bottom,
		radius = Math.min(width, height) / 2;
	var color = d3.scaleOrdinal()
		.range(["#005A31","#A8CD1B","#CBE32D"]);
	
	var parseData = function(data,year) {
		var pieData = [
			{"label":"股票", "value": parseFloat(data[year]["stock_weight"])},
			{"label":"現金", "value": parseFloat(data[year]["money_weight"])},
			{"label":"債卷", "value": parseFloat(data[year]["bonds_weight"])}
		];
		return pieData;
	}

	var pie = d3.pie()
		.value(function(d) {
		return d.value;
	}).sort(null);

	var arc = d3.arc()
		.outerRadius(radius - 70)
		.innerRadius(radius - 120);


	var updatePie = function(){
		// Start joining data with paths
		var paths = PieChart.selectAll("path");
		// var data2 = paths.data();
		// paths.data(pie(data2))
		paths.attr("d",arc)
			.style("fill", function(d) { return color(d.data.label);})
			
		var textradius = 0.56;

		var text1 = PieChart.select(".text1");
		text1.selectAll("text")
		.attr("class","pietext")
		.attr("font-size","20px")	
		.attr("transform", function(d) { 
			var pos = arc.centroid(d);
			pos[0] = pos[0] * textradius;
			pos[1] = pos[1] * textradius;
			return "translate(" + pos + ")"; 
		})
		.attr("dy", "0em")
		.attr("dx", "-1em")		
		.html(function(d) {
			return d.data.label;
		});
		
		var text2 = PieChart.select(".text2");
		text2.selectAll("text")
		.attr("font-size","20px")	
		.attr("transform", function(d) { 
			var pos = arc.centroid(d);
			pos[0] = pos[0] * textradius;
			pos[1] = pos[1] * textradius;
			return "translate(" + pos + ")"; 
		})
		.attr("dy", "1.5em")
		.attr("dx", "-1em")	
		.html(function(d) {
			return d.data.value.toLocaleString("en", {style: "percent"});
		});
	}



	this.create = function(data,year) {
		var pieData = parseData(data,year);
		var $PieChart = $("#allocation-pie");
		var svg = PieChart.append("svg")
		.attr("viewBox","0 0 250 250")
		.attr("preserveAspectRatio","xMinYMin meet")
		.attr("width", width)
		.attr("height", height);

		var piegroup = svg.append("g")
		.attr("width", width_g)
		.attr("height", height_g)
		.attr("transform", "translate(" + width/2 + "," + height/2 +")"); // Moving the center point. 1/2 the width and 1/2 the height
		
		var paths = piegroup.selectAll("path")
		.data(pie(pieData))
		.enter()
		.append('path');

		piegroup.append("g").attr("class","text1").selectAll("text")
		.data(pie(pieData)).enter().append("text");

		piegroup.append("g").attr("class","text2").selectAll("text")
		.data(pie(pieData)).enter().append("text");


		updatePie();
	}

	this.update = function(data,year) {

		var pieData = parseData(data,year);

		PieChart.selectAll("path")
		.data(pie(pieData));

		var text1 = PieChart.selectAll(".text1")
		text1.selectAll("text").data(pie(pieData));

		var text2 = PieChart.selectAll(".text2")
		text2.selectAll("text").data(pie(pieData));


		updatePie();
	}
}

function FundReturnChart() {

	var ReturnChart = d3.select("#fundreturnchart");
	var margin = {top: 90, right: 90, bottom: 90, left: 90},
	    width = 960,
	    height = 500,
	    width_g = width - margin.left - margin.right,
	    height_g = height - margin.top - margin.bottom;
	var x = d3.scaleTime()
	    .range([0, width_g]);
	var y = d3.scaleLinear()
	    .range([height_g,0]);

    var color = d3.scaleOrdinal(d3.schemeCategory20c)
    			.domain(["ninetyfive_percentile", "seventyfive_percentile", "fifty_percentile","twentyfive_percentile","five_percentile"])
  				.range(["white","#ca0020","#f4a582","#92c5de","#0571b0"]);
	

    var line = d3.area()
    	.x(function (d) {
            return x(new Date(d.year.toString()));
                })
        .y(function (d) {
            return y(d.value);
        });

	var area1 = d3.area()
		.x(function (d) {
            return x(new Date(d.year.toString()));
        })
        .y0(function(d) { return y(d.seventyfive_percentile);})
        .y1(function (d) {
            return y(d.ninetyfive_percentile);
        });
	var area2 = d3.area()
		.x(function (d) {
            return x(new Date(d.year.toString()));
        })
        .y0(function(d) { return y(d.fifty_percentile);})
        .y1(function (d) {
            return y(d.seventyfive_percentile);
        });
    var area3 = d3.area()
		.x(function (d) {
            return x(new Date(d.year.toString()));
        })
        .y0(function(d) { return y(d.twentyfive_percentile);})
        .y1(function (d) {
            return y(d.fifty_percentile);
        });
	var area4 = d3.area()
		.x(function (d) {
            return x(new Date(d.year.toString()));
        })
        .y0(function(d) { return y(d.five_percentile);})
        .y1(function (d) {
            return y(d.twentyfive_percentile);
        });
	var parsedata = function(data) {	
		var chartdata = [[],[],[],[],[]];
		for (var i = 0; i < data.length; i++) {
			chartdata[4].push({year:data[i]["year"], value: data[i].five_percentile});
			chartdata[3].push({year:data[i]["year"], value: data[i].twentyfive_percentile});
			chartdata[2].push({year:data[i]["year"], value: data[i].fifty_percentile});
			chartdata[1].push({year:data[i]["year"], value: data[i].seventyfive_percentile});
			chartdata[0].push({year:data[i]["year"], value: data[i].ninetyfive_percentile});
		}
		return chartdata;
	}

	var updateReturnChart = function(){

		ReturnChart.select(".area1")
			.attr("d",area1)
			.style("fill","#005A31");
		ReturnChart.select(".area2")
			.attr("d",area2)
			.style("fill","#A8CD1B");
		ReturnChart.select(".area3")
			.attr("d",area3)
			.style("fill","#CBE32D");
		ReturnChart.select(".area4")
			.attr("d",area4)
			.style("fill","#005A31");
		ReturnChart.select(".linegroup").selectAll("path")
			.attr("d",line)
			.style("stroke", function (d, i) {
					return "#005A31";
                    // halfway between line color and white
                    //return d3.interpolateRgb(d3.rgb("#ffffff"), d3.rgb(color(i)))(.5).toString();
                })
			.attr("stroke-width",1.5);
		ReturnChart.select(".iarline")
					.attr("d",line)
					.style("stroke", "black")
					.attr("stroke-width",2);

	}

	this.create = function(data,iar0) {
		//add year 0 values
		data.unshift({"year": 2017, "five_percentile": 1, "twentyfive_percentile": 1, "fifty_percentile": 1,"seventyfive_percentile": 1,"ninetyfive_percentile":1});
		//parse data
		var chartdata = parsedata(data);

		var $ReturnChart = $("#fundreturnchart");
		var svg = ReturnChart
			.append("svg")
			.attr("viewBox","0 0 500 500")
			.attr("preserveAspectRatio","xMinYMin meet")
			.attr("width", width)
			.attr("height",height)

    	x.domain([new Date("2017"),new Date((chartdata[0].length-1 + 2017).toString())]);
    	var ymax = Math.max(Math.ceil(chartdata[0][chartdata[0].length-1].value),iar0 * 1.1);
		y.domain([0, ymax]);
		var frg = svg.append("g")
			.attr("width", width_g)
			.attr("height",height_g)
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

		//create stacked area	graphs	
		var areagroup = frg.append("g")
						.attr("class","areagroup");
		areagroup.append("path")
			.datum(data)
			.attr("class","area1");
		areagroup.append("path")
			.datum(data)
			.attr("class","area2");

		areagroup.append("path")
			.datum(data)
			.attr("class","area3");

		areagroup.append("path")
			.datum(data)
			.attr("class","area4");

		//create plot lines
		var linegroup = frg.append("g")
							.attr("class","linegroup");
		var linepaths = linegroup.selectAll("path")
							.data(chartdata)
							.enter()
							.append("path")

		var iarline = frg.append("path")
						.datum(chartdata[0].map(function(d){

							d.value = iar0;
							return d;
						}))
						.attr("class","iarline");

		var xAxis = d3.axisBottom()
			.scale(x);
		var yAxis = d3.axisLeft()
	    	.scale(y);

		frg.append("g")
			.attr("class","axis yaxis")
			//.attr("transform", "translate(" + width_g + " ,0)")
			.call(yAxis)
			.attr("font-size",20);
		frg.append("g")
			.attr("class","axis xaxis")
			.attr("transform", "translate(0," + (height_g) + ")")
			.call(xAxis)
			.attr("font-size",20);

		//label for the xais
		frg.append("text")
			.attr("transform",
            "translate(" + (width_g/2) + " ," + 
                           (height_g + 60) + ")")
      		.style("text-anchor", "middle")
      		.text("年")
      		.attr("font-size",20);

      	// text label for the y axis
		frg.append("text")
			.attr("transform", "rotate(-90)")
			.attr("y", 0 - 70)
			.attr("x",0 - (height_g / 2))
			.attr("dy", "1em")
			.style("text-anchor", "middle")
			.text("百萬")
			.attr("font-size",20);

		updateReturnChart();

    }

    this.update = function(data,iar0) { 
    	data.unshift({"year": 2017, "five_percentile": 1, "twentyfive_percentile": 1, "fifty_percentile": 1,"seventyfive_percentile": 1,"ninetyfive_percentile":1});


    	var chartdata = parsedata(data);
    	
    	x.domain([new Date("2017"),new Date((chartdata[0].length-1 + 2017).toString())]);
		var ymax = Math.max(Math.ceil(chartdata[0][chartdata[0].length-1].value),iar0 * 1.1);
		y.domain([0, ymax]);


    	ReturnChart.select(".area1")
    		.datum(data);
    	ReturnChart.select(".area2")
    		.datum(data);
    	ReturnChart.select(".area3")
    		.datum(data);
    	ReturnChart.select(".area4")
    		.datum(data);
    	ReturnChart.select(".linegroup").selectAll("path")
    		.data(chartdata);
    	ReturnChart.select(".iarline")
    				.datum(chartdata[0].map(function(d){
							d.value = iar0;
							return d;
						}));



		var xAxis = d3.axisBottom()
			.scale(x);
		var yAxis = d3.axisLeft()
	    	.scale(y);

	   	ReturnChart.select(".yaxis")
	   		.call(yAxis);
		ReturnChart.select(".xaxis")
	   		.call(xAxis);
    	updateReturnChart();

    }
}

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

function interactivedashboardSetUp(yur0,rts0,iar0,fr50,fr25) {
	$("#showYUR").html("我預計" + parseInt(yur0) + "年後退休");
	$("#showRTS").html("我所願意接受的投資風險為" + parseInt(rts0));
	$("#showYUR2").html("未來" + parseInt(yur0) + "年資產配置建議");
	$("#showYUR3").html("未來" + parseInt(yur0) + "年資產配置建議");
	$("#showIAR").html("退休後我希望有" + parseInt(iar0) + "百萬元存款");
	$("#showFR50").html(parseFloat(fr50).toFixed(2) + "百萬");
	$("#showFR25").html(parseFloat(fr25).toFixed(2) + "百萬");
}




$(document).ready(function(){

	var ALMData,
		yur,
		rts,
		age,
		iar,
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

			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr50,fr25);
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
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr50,fr25);		
		});
		$("#form1").hide();
		$("#description").html("資產配置建議");
		$("#interactivedashboard").show();
		return false;
	});

	$("#yur_id_input").on("input change", function(){
		yur = $("#yur_id_input").val();
		$("#showYUR2").html("未來" + parseInt(yur) + "年資產配置建議");
		$("#showYUR").html("預計" + parseInt(yur) + "年後退休");
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			//alert(data);
			ALMData = JSON.parse(data);
			AssetAllocationPie0.update(ALMData,0);
			FundReturnChart0.update(ALMData,iar);
			AssetAllocationTable0.update(ALMData);
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr50,fr25);
		});
	});


	$("#rts_id_input").on("input change", function(){
		rts = $("#rts_id_input").val();
		$("#showRTS").html("我所願意接受的投資風險為" + parseInt(rts));
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			//alert(data);
			ALMData = JSON.parse(data);
			AssetAllocationPie0.update(ALMData,0);
			FundReturnChart0.update(ALMData,iar);
			AssetAllocationTable0.update(ALMData);
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr50,fr25);
		});
	});

	$("#iar_id_input").on("input change", function(){
		iar = $("#iar_id_input").val();
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			ALMData = JSON.parse(data);
			FundReturnChart0.update(ALMData,parseInt(iar));
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr50,fr25);
		});
	});

	$("#calculateRTS").on("click",function(){
		rts = eval($("#q1").val() + "+" + $("#q2").val()+ "+" + $("#q3").val()+ "+" + $("#q4").val() + "+"+ $("#q5").val()+ "+" +$("#q6").val());
		$("#showRTS").html(rts_calculated);
		$("#rts").val(rts_calculated)
		$("#showRTS2").html("我所願意接受的投資風險為" + $("#rts").val());
	});

	$("#form2submit").on("click",function(){
		rts = calculateRTSForm2(age);
		$("#showRTSForm2").html("投資風險承受能力:" + parseInt(rts));
		interactivedashboardSetUp(yur,rts,iar);
		$.post('db/alm.php',{yur: yur, rts: rts}, function(data){
			ALMData = JSON.parse(data);
			AssetAllocationPie0.update(ALMData,0);
			FundReturnChart0.update(ALMData,iar);
			AssetAllocationTable0.create(ALMData);
			fr50 = ALMData[ALMData.length-1].fifty_percentile;
			fr25 = ALMData[ALMData.length-1].twentyfive_percentile;
			interactivedashboardSetUp(yur,rts,iar,fr50,fr25);
		});


	});

	$("#openForm2Modal").on("click",function(){
		$("#tab6").removeClass("active");
		$("#tab1").addClass("active");
	});
});


