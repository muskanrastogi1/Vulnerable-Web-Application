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
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
			<p>Give me book's number and I give you...</p>
			Book's number : <input type="text" name="number">
			<button type="submit" name="submit" value="Submit" class="button" style="margin-top: 30px;margin-bottom: 30px;">Submit</button>
		</form>
	</div>
	<!--Admin password is in the secret table. I hope, anyone doesn't see it.-->
	<?php
	$servername = 'localhost';
	$username = "akshatvg";
	$password = "qwerty";
	$db = "1ccb8097d0e9ce9f154608be60224c7c";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";
	$source = "";
	if (isset($_GET["submit"])) {
		$number = $_GET['number'];
		#$query = "SELECT bookname,authorname FROM books WHERE number = '$number'";
		$query = "SELECT * FROM books WHERE number = " . $_GET["number"];
		$result = mysqli_query($conn, $query);
		$row = @mysqli_num_rows($result);
		echo "<hr>";
		if ($row > 0) {
			echo "<pre>There is a book with this index.</pre>";
		} else {
			echo "Not found!";
		}
	}

	?>
</body>

</html>