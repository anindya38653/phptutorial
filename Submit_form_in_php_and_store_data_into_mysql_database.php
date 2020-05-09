<?php
$host = "localhost";
$username = "root";
$password = "";

try 
{
    $conn = new PDO("mysql:host=$host;dbname=phptest", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

// FORM SUBMITTED DATA CAN ACCESSED BY:
// 1. $_REQUEST : CAN BE USED FOR BOTH get AND post METHOD
// 2. $_POST : CAN BE USED ONLY FOR post METHOD
// 3. $_GET : CAN BE USED ONLY FOR get METHOD

if(isset($_POST['save_contact']))
{
	//print_r($_POST);
	$sql = "INSERT INTO contacts(name, phone, email) VALUES('".addslashes($_POST['name'])."', '".addslashes($_POST['phone'])."', '".addslashes($_POST['email'])."')";
	$conn->query($sql);
}

?>

<html>
	<head>
		<title>PHP Form</title>
	</head>
	<body>
		<form action="" method="post">
			<div> Name: <input type="text" name="name" value="" /></div>
			<div> Phone: <input type="text" name="phone" value="" /></div>
			<div> Email: <input type="text" name="email" value="" /></div>
			<div> <input type="submit" name="save_contact" value="Save" /></div>
		</form>
	</body>
</html>
