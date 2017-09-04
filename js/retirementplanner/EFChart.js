function EFChart() {
	var EFChart = d3.select("#efchart");
	var margin = {top: 20, right: 20, bottom: 90, left: 110},
	    width = 500,
	    height = 500,
	    width_g = width - margin.left - margin.right,
	    height_g = height - margin.top - margin.bottom;
	var x = d3.scaleLinear()
	    .range([0, width_g]);
	var y = d3.scaleLinear()
	    .range([height_g,0]);
	var line = d3.area()
    	.x(function (d) {
            return x(parseFloat(d.mean));
        })
        .y(function (d) {
            return y(parseFloat(d.std));
        });

	var updateChart = function(rts){
		// EFChart.select("path")
		// 	.attr("d",line)
		// 	.style("stroke","#005A31")
		// 	.attr("stroke-width",2)


		EFChart.select(".circlegroup").selectAll("circle")
			.attr("cx",function(d) {
				if (d !== null){
					return x(parseFloat(d.mean));
				}
			})
			.attr("cy", function(d) {
				if (d !== null){
					return y(parseFloat(d.std));
				}
			})
			.attr("r",4)
			.attr("fill",function(d){ return "#A8CD1B";})
		EFChart.select(".currentcircle").select("circle")
			.attr("cx",function(d) {
				return x(parseFloat(d.mean));
			})
			.attr("cy", function(d) {
				return y(parseFloat(d.std));
			})
			.attr("r",5.5)
			.attr("fill",function(d){ return "#005A31";})
		EFChart.select(".currentcircle").select("text")
				.attr("transform", function(d){
					return "translate(" + x(parseFloat(d.mean)) + "," + y(parseFloat(d.std)) + ")"
				})
				.text("願意接受的投資風險" + rts)
				.attr("dx",function(d){
					if (rts > 50) {
						return -150;
					}
					else {
						return -10;
					}
				})
				.attr("dy",-30)
				.attr("font-size",18)

	}

	this.create = function(data,rts){
		var $EFChart = $("#efchart");
		var svg = EFChart
			.append("svg")
			.attr("viewBox","0 0 500 500")
			.attr("preserveAspectRatio","xMinYMin meet")
			.attr("width", width)
			.attr("height",height)

		xmax = 0;
		ymax = 0;
		xmin = 10;
		ymin = 10;
		for (var i = 0; i < data.length; i++) {
			xmax = Math.max(xmax,data[i].mean);
			xmin = Math.min(xmin,data[i].mean);
			ymax = Math.max(ymax,data[i].std);
			ymin = Math.min(ymin,data[i].std);
		}
		x.domain([xmin * 0.9,xmax * 1.1]);
		y.domain([ymin * 0.9,ymax * 1.1]);

		var xAxis = d3.axisBottom()
			.scale(x)
			.ticks(5)
		var yAxis = d3.axisLeft()
	    	.scale(y)
	    	.ticks(10)
	    	.tickFormat(d3.format(".2",1e-3))
	    var frg = svg.append("g")
			.attr("width", width_g)
			.attr("height",height_g)
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

		//create plot line
		// var efficientline = frg.append("path")
		// 			.data([data])

		var efCircles = frg.append("g").attr("class","circlegroup")
		efCircles.selectAll("circle")
				.data(data)
				.enter()
				.append("circle")
		var currentCircle = frg.append("g")
						.datum(data[rts-1])
						.attr("class","currentcircle")
		currentCircle.append("circle")
		currentCircle.append("text")

		frg.append("g")
			.attr("class","axis yaxis")
			//.attr("transform", "translate(" + width_g + " ,0)")
			.call(yAxis)
			.attr("font-size",22)

		frg.append("g")
			.attr("class","axis xaxis")
			.attr("transform", "translate(0," + (height_g + 10) + ")")
			.call(xAxis)
			.attr("font-size",22);

		//label for the xais
		frg.append("text")
			.attr("transform",
            "translate(" + (width_g/2) + " ," + 
                           (height_g + 70) + ")")
      		.style("text-anchor", "middle")
      		.text("平均值")
      		.attr("font-size",22);

      	//text label for the y axis
		frg.append("text")
			.attr("transform", "rotate(-90)")
			.attr("y", 0 - 95)
			.attr("x",0 - (height_g / 2))
			.attr("dy", "0.5em")
			.style("text-anchor", "middle")
			.text("標準差")
			.attr("font-size",22);
		updateChart(rts);
	}


	this.update = function(data,rts){

		xmax = 0;
		ymax = 0;
		xmin = 10;
		ymin = 10;
		for (var i = 0; i < data.length; i++) {
			xmax = Math.max(xmax,data[i].mean);
			xmin = Math.min(xmin,data[i].mean);
			ymax = Math.max(ymax,data[i].std);
			ymin = Math.min(ymin,data[i].std);
		}
		x.domain([xmin * 0.9,xmax * 1.1]);
		y.domain([ymin * 0.9,ymax * 1.1]);


		EFChart.select(".circlegroup").selectAll("circle").data(data)
		EFChart.select(".currentcircle").datum(data[rts-1])
		var xAxis = d3.axisBottom()
			.scale(x);
		var yAxis = d3.axisLeft()
	    	.scale(y);
	   	updateChart(rts);
	}

}
