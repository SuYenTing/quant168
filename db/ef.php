<?php
$servername = "140.119.86.174";
$username = "nccu";
$password = "nccu";

if (isset($_POST["yur"])) {
	$length = $_POST["yur"];
	$year = 1;
// Create connection
	set_time_limit(0);

	$conn = mysql_connect($servername, $username, $password);


	mysql_select_db("web_data");
	mysql_query("set names utf-8");

	$query_text = "SELECT risk_level, mean, std FROM alm WHERE length=" . $length . " and year=". $year. " ORDER BY risk_level";

	$data = mysql_query($query_text);
	$json = array();
	while ($row = mysql_fetch_assoc($data)) {
		$json[] = $row;
	}
	$json = json_encode($json);
	echo $json;

}
?>