<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sensornode";

	$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
	if ($conn->connect_error) {     // Check connection
		die("Connection failed: " . $conn->connect_error);
	} 

	$topic = $_REQUEST['topic'];
	$data = $_REQUEST['data'];
	$nodeId = preg_replace('/\D/', '', $topic);
	
	$sql = "INSERT INTO sensornode" .$nodeId. " (Topic, Data) VALUES ('$topic', '$data')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Page saved!";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>