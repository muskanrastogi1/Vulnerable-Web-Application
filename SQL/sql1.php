<!DOCTYPE html>
<html>

<head>
	<title>SQL Injection</title>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
	<link rel="stylesheet" href="../Resources/button.css">
</head>

<body style="background: #2F3FB0; color: white;">

	<div style="background-color:#ffffff;color: #037BFE;border-radius: 30px;box-shadow: 0 0 1px 1px gray;padding: 10px;">
		<button type="button" name="homeButton" onclick="location.href='../homepage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Home Page</button>
		<button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Main Page</button>
	</div>

	<div align="center">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<p>John -> Doe</p>
			First name : <input type="text" name="firstname">
			<button type="submit" name="submit" value="Submit" class="button" style="margin-top: 30px;margin-bottom: 30px;">Submit</button>
		</form>
	</div>


	<?php
	$servername = 'localhost';
	$username = "akshatvg";
	$password = "qwerty";
	$db = "1ccb8097d0e9ce9f154608be60224c7c";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);

	if (isset($_POST["submit"])) {
		$firstname = $_POST["firstname"];
		$sql = "SELECT lastname FROM users WHERE firstname='$firstname'"; //String
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) {
				echo $row["lastname"];
				echo "<br>";
			}
		} else {
			echo "0 results";
		}
	}

	

	?>
</body>

</html>