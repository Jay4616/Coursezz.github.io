<?php
	$firstName = $_POST['firstName'];
	// $lastName = $_POST['lastName'];
	// $gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['subject'];
	$number = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName,$email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your message has been sent. Thank you!";
		$stmt->close();
		$conn->close();
	}
?>