function AssetAllocationChart() {
	var AssetAllocationChart = d3.select("#assetallocationchart");
	var margin = {top: 50, right: 70, bottom: 80, left: 80},
	    width = 1000,
	    height = 500,
	    width_g = width - margin.left - margin.right,
	    height_g = height - margin.top - margin.bottom;
	var x = d3.scaleTime()
	    .range([0, width_g]);
	var y = d3.scaleLinear()
	    .range([height_g,0]);
	var line = d3.area()
    	.x(function (d) {
            return x(new Date(d.year.toString()));
                })
        .y(function (d) {
            return y(d.value);
        });
   	var parsedata = function(data) {	
		var chartdata = [[],[],[]];
		for (var i = 0; i < data.length; i++) {
			chartdata[2].push({year:data[i]["year"], value: parseFloat(data[i]["stock_weight"])});
			chartdata[1].push({year:data[i]["year"], value: parseFloat(data[i]["money_weight"])});
			chartdata[0].push({year:data[i]["year"], value: parseFloat(data[i]["bonds_weight"])});
		}
		return chartdata;
	}

	var updateChart = function(){
		var colorList = [
						"#005A31",
						"#A8CD1B",
						"#CBE32D"
					]
		var labelList = [
						"債卷",
						"貨幣",
						"股票"
					]
		var i = -1
		AssetAllocationChart.select(".linegroup").selectAll("g").selectAll("path")
			.attr("d",line)
			.style("stroke", function (d) {
					i = i + 1;
					return colorList[i];
                })
			.attr("stroke-width",4)
		var i = -1
		var yPositionList = [];
		AssetAllocationChart.select(".linegroup")
			.selectAll("g")
			.selectAll("text")
			.attr("font-size",22)
			.text(function(d){
				i = i + 1;
				return labelList[i];	
			})
			.attr("transform", function(d){
				yPosition = y(d[d.length-1].value);
				for (var i = 0; i < yPositionList.length; i++) {
					if (Math.abs(yPosition-yPositionList[i]) < 10){
						if (y(d[d.length-1].value) > y(d[d.length-3].value)) {
							yPosition = yPosition - 30;
						}
						else {
							yPosition = yPosition + 30;
						}
					}
				}
				yPositionList.push(yPosition);
				return "translate(" + x(new Date(d[d.length-1].year.toString())) + "," + yPosition + ")";
			})
	}

	this.create = function(data){
		var chartdata = parsedata(data);
		var $AssetAllocationChart = $("#assetallocationchart");
		var svg = AssetAllocationChart
			.append("svg")
			.attr("viewBox","0 0 1000 500")
			.attr("preserveAspectRatio","xMinYMin meet")
			.attr("width", width)
			.attr("height",height)
		x.domain([new Date("2018"),new Date((chartdata[0].length-1 + 2018).toString())]);
    	var ymax = Math.ceil(chartdata[0][chartdata[0].length-1].value);
		y.domain([0, ymax]);

		var xAxis = d3.axisBottom()
			.scale(x);
		var yAxis = d3.axisLeft()
	    	.scale(y)
	    	.tickFormat( d3.format(".0%"));
	    var frg = svg.append("g")
			.attr("width", width_g)
			.attr("height",height_g)
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

		//create plot lines
		var linegroup = frg.append("g")
							.attr("class","linegroup");
		var linepaths = linegroup.selectAll("g")
							.data(chartdata)
							.enter()
							.append("g")
							.append("path")
		linegroup.selectAll("g")
				.append("text")

		frg.append("g")
			.attr("class","axis yaxis")
			//.attr("transform", "translate(" + width_g + " ,0)")
			.call(yAxis)
			.attr("font-size",22)

		frg.append("g")
			.attr("class","axis xaxis")
			.attr("transform", "translate(0," + (height_g) + ")")
			.call(xAxis)
			.attr("font-size",22);

		//label for the xais
		frg.append("text")
			.attr("transform",
            "translate(" + (width_g/2) + " ," + 
                           (height_g + 75) + ")")
      		.style("text-anchor", "middle")
      		.text("年")
      		.attr("font-size",30);

      	// text label for the y axis
		// frg.append("text")
		// 	.attr("transform", "rotate(-90)")
		// 	.attr("y", 0 - 70)
		// 	.attr("x",0 - (height_g / 2))
		// 	.attr("dy", "0.5em")
		// 	.style("text-anchor", "middle")
		// 	.text("百分比")
		// 	.attr("font-size",30);
		updateChart();
	}


	this.update = function(data){
		var chartdata = parsedata(data);
		x.domain([new Date("2018"),new Date((chartdata[0].length-1 + 2018).toString())]);
		var ymax = Math.ceil(chartdata[0][chartdata[0].length-1].value);
		y.domain([0, ymax]);
		var xAxis = d3.axisBottom()
			.scale(x);
		var yAxis = d3.axisLeft()
	    	.scale(y)
	    	.tickFormat( d3.format(".0%"));
	   	AssetAllocationChart.select(".linegroup").selectAll("path")
    		.data(chartdata);
    	AssetAllocationChart.select(".linegroup").selectAll("text")
    		.data(chartdata);
	   	AssetAllocationChart.select(".yaxis")
	   		.call(yAxis);
		AssetAllocationChart.select(".xaxis")
	   		.call(xAxis);
	   	updateChart();
	}

}
