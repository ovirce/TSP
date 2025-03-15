<?php 
session_start(); 
include "db_conn1.php";

if (isset($_POST['uname']) && isset($_POST['password']) 
    && isset($_POST['name']) && isset($_POST['re_password'])
    && isset($_POST['email'])) {

	function validate($data) {
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);

	$user_data = 'uname='. $uname. '&name='. $name. '&email='. $email;

	if (empty($uname)) {
		header("Location: Tsignup.php?error=User Name is required&$user_data");
	    exit();
	} else if (empty($email)) {
        header("Location: Tsignup.php?error=Email is required&$user_data");
	    exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: Tsignup.php?error=Invalid email format&$user_data");
	    exit();
    } else if (empty($pass)) {
        header("Location: Tsignup.php?error=Password is required&$user_data");
	    exit();
	} else if (empty($re_pass)) {
        header("Location: Tsignup.php?error=Re Password is required&$user_data");
	    exit();
	} else if (empty($name)) {
        header("Location: Tsignup.php?error=Name is required&$user_data");
	    exit();
	} else if ($pass !== $re_pass) {
        header("Location: Tsignup.php?error=The confirmation password does not match&$user_data");
	    exit();
	} else {
		// Hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' OR email='$email'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: Tsignup.php?error=The username or email is already taken&$user_data");
	        exit();
		} else {
           $sql2 = "INSERT INTO users(user_name, password, name, email) VALUES('$uname', '$pass', '$name', '$email')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: Tsignup.php?success=Your account has been created successfully");
	         exit();
           } else {
	           	header("Location: Tsignup.php?error=Unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
} else {
	header("Location: Tsignup.php");
	exit();
}
