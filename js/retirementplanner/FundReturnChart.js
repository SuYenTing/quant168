function FundReturnChart() {
	var circlegrouplist = []
	var ReturnChart = d3.select("#fundreturnchart");
	var margin = {top: 50, right: 50, bottom: 80, left: 80},
	    width = 1000,
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

		ReturnChart.selectAll("circle")
					.attr("cx",function(d) {
						return x(new Date(d.year.toString()));
					})
					.attr("cy", function(d) {
						return y(d.value)
					})

		var circlelabel = ReturnChart.selectAll(".circlelabel")
					.attr("transform", function(d) { 
						var pos = []
						pos.push(x(new Date(d.year.toString())));
						pos.push(y(d.value));
						return "translate(" + pos + ")"; 
					})
					.attr("dy","-10px")
					.attr("dx","-1em")
					.attr("font-size","18px")
					.attr("visibility","hidden")
					.html(function(d){return parseFloat(d.value).toFixed(2).toString() ;})

		ReturnChart.selectAll("circle")
					.on("mouseover", function(){
						console.log($(this).next()[0]);
						return $(this).next().css("visibility", "visible");
					})
					.on("mousemove", function(){return $(this).next().css("top",(d3.event.pageY-10)+"px").css("left",(d3.event.pageX+10)+"px");})
					.on("mouseout", function(){return $(this).next().css("visibility", "hidden");});


	}

	this.create = function(data,iar0) {
		//add year 0 values
		data.unshift({"year": 2017, "five_percentile": 1, "twentyfive_percentile": 1, "fifty_percentile": 1,"seventyfive_percentile": 1,"ninetyfive_percentile":1});
		//parse data
		var chartdata = parsedata(data);
		var $ReturnChart = $("#fundreturnchart");
		var svg = ReturnChart
			.append("svg")
			.attr("viewBox","0 0 1000 500")
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

		var iardata = []
		for (var i = 0; i < chartdata[0].length; i++){
			iardata.push({
				"year": chartdata[0][i].year,
				"value": iar0
			});
		}

		var iarline = frg.append("path")
					.datum(iardata)
					.attr("class","iarline");

		// create circles
		var circlegroup = frg.append("g")
							.attr("class","circlegroup")
		
		for (var i = 0; i < chartdata.length; i++) {
			circlegrouplist[i] = circlegroup
			.append("g")

			var cgroup = circlegrouplist[i]
			.selectAll("g")
			.data(chartdata[i])
			.enter()
			.append("g")
			.attr("class","circlegroup")

			cgroup.append("circle")
			.attr("r",3)

			cgroup.append("text")
			.attr("class","circlelabel")
			.attr("font-size","20px")

		}


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
		var iardata = []
		for (var i = 0; i < chartdata[0].length; i++){
			iardata.push({
				"year": chartdata[0][i].year,
				"value": iar0
			});
		}
    	
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
    				.datum(iardata);
    	for (var i = 0; i < chartdata.length; i++)
    	{
    		circlegrouplist[i].selectAll("g").remove()
			var cgroup = circlegrouplist[i]
			.selectAll("g")
			.data(chartdata[i])
			.enter()
			.append("g")
			.attr("class","circlegroup")

			cgroup.append("circle")
			.attr("r",3)

			cgroup.append("text")
			.attr("class","circlelabel")
			.attr("font-size","20px")

    	}
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