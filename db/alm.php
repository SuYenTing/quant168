<?php
$servername = "140.119.86.174";
$username = "nccu";
$password = "nccu";

if (isset($_POST["yur"]) && isset($_POST["rts"])) {
	$length = $_POST["yur"];
	$risk_level = $_POST["rts"];
// Create connection
	set_time_limit(0);

	$conn = mysql_connect($servername, $username, $password);


	mysql_select_db("web_data");
	mysql_query("set names utf-8");

	$query_text = "SELECT year, stock_weight, money_weight, bonds_weight, five_percentile, twentyfive_percentile, fifty_percentile, seventyfive_percentile, ninetyfive_percentile FROM alm WHERE length=" . $length . " and risk_level=". $risk_level. " ORDER BY year";

	$data = mysql_query($query_text);
	$json = array();
	while ($row = mysql_fetch_assoc($data)) {
		$row["year"] = $row["year"] + 2017;
		$json[] = $row;
	}
	$json = json_encode($json);
	echo $json;

}
?>