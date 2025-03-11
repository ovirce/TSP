<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="scripts/accountCreation.js"></script>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) { //check if the form is submitted
           $username = $_POST["username"]; //send the username from the form
           $email = $_POST["email"]; //send the email from the form
           $password = $_POST["password"]; //send the password from the form
           $passwordRepeat = $_POST["repeat_password"]; //send the repeat password from the form
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT); //hash the password for security purposes

           $errors = array(); //create an empty array to store the errors
           
           if (empty($username) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required"); //check if the fields are empty
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid"); //check if the email is valid
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long"); //check if the password is less than 8 characters
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");//check if the password and repeat password are the same
           }
           require_once "database.php"; //include the database file
           $sql = "SELECT * FROM users WHERE username = '$username'"; //check if the username already exists
           $result = mysqli_query($conn, $sql); //make a query to the database
           $rowCount = mysqli_num_rows($result); //count the number of rows the username has in the database
           if ($rowCount>0) { //if the row count is more than 0 then the username already exists
            array_push($errors,"username already exists!");
           }
           if (count($errors)>0) { //if there are errors in the array
            foreach ($errors as  $error) { //loop through the errors
                echo "<div class='alert alert-danger'>$error</div>"; //display the errors
            }
           }else{
            
            $sql = "INSERT INTO users (username, email, password) VALUES ( ?, ?, ? )"; //insert the data into the database
            $stmt = mysqli_stmt_init($conn); //initialize the statement
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql); //prepare the statement
            if ($prepareStmt) { //if the statement is prepared
                mysqli_stmt_bind_param($stmt,"sss",$username, $email, $passwordHash);//bind the parameters
                mysqli_stmt_execute($stmt);//execute the statement
                echo "<div class='alert alert-success'>You are registered successfully.</div>";//message to say the user is registered
            }else{
                die("Something went wrong"); //if the statement is not prepared, display an error message and kill the script
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post" name="accountCreationForm" id="accountCreationForm">
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" id="repeatPassword" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" id="registration" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="home_page.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>