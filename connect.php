
<?php
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
if(isset($_REQUEST['submit']))
{


	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message Recorded Successfully...";
		$stmt->close();
		$conn->close();
	}
}
?>
