  <?php
	$sName = $_POST['sName'];
	$improve = $_POST['improve'];
	$rate = $_POST['rate'];
	$email = $_POST['email'];
	$module = $_POST['module'];
	$topic = $_POST['topic'];
	$ments= $_POST['ments'];
	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(sName, improve, rate, email, module, topic, ments) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $sName, $improve, $rate, $email, $module, $topic, $ments);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thank You For Rating The Lesson";
		$stmt->close();
		$conn->close();
	}
?>