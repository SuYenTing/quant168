function AssetAllocationPie() {
	var PieChart = d3.select("#assetallocationpie");
	var margin = {top: 5, right: 5, bottom: 5, left: 5},
	    width = 500,
	    height = 500,
	    width_g = width - margin.left - margin.right,
	    height_g = height - margin.top - margin.bottom,
		radius = Math.min(width, height) / 2;
	var color = d3.scaleOrdinal()
		.range(["#005A31","#A8CD1B","#CBE32D"]);
	
	var parseData = function(data,year) {
		var pieData = [
			{"label":"股票", "value": parseFloat(data[year]["stock_weight"])},
			{"label":"貨幣", "value": parseFloat(data[year]["money_weight"])},
			{"label":"債券", "value": parseFloat(data[year]["bonds_weight"])}
		];
		return pieData;
	}

	var pie = d3.pie()
		.value(function(d) {
		return d.value;
	}).sort(null);

	var arc = d3.arc()
		.outerRadius(radius - 20)
		.innerRadius(radius - 70);


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
		.attr("font-size","28px")	
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
		.attr("font-size","28px")	
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
		.attr("viewBox","0 0 500 500")
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