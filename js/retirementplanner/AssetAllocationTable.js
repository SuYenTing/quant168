function AssetAllocationTable() {
	var table = d3.select("#assetallocationtable").append('table');
	var thead = table.append("thead");
	var tbody = table.append("tbody");
	var columns = ['年', '股票','債券','貨幣'];
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
