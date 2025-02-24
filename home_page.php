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
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="scripts/index.js"></script>
</head>
<body>
    
        <?php
        if (isset($_POST["login"])) { //php for the login form
           $email = $_POST["username"]; //posts the email
           $password = $_POST["password"];//posts the password
            require_once "database.php";//requires the database.php file
            $sql = "SELECT * FROM users WHERE username = '$username'"; //selects the username from the database
            $result = mysqli_query($conn, $sql); //gets the sql query 
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC); //fetches the users from the database to see if it is already stored
            if ($user) {
                if (password_verify($password, $user["password"])) { //verifies the password
                    session_start(); //starts the session
                    $_SESSION["user"] = "yes"; //sets the session
                    header("Location: index.php"); //redirects to the index.php page
                    die(); //kills the script
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>"; //displays an error message
                }
            }else{
                echo "<div class='alert alert-danger'>Username does not match</div>"; //displays an error message
            }
        }
        ?>
    <div class="container">
        <h1>Student Login Form</h1>
      <form action="home_page.php" method="post" name="studentForm">
        <div class="form-group">
            <input type="username" placeholder="Enter Username:" name="username" id="studentUsername" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" id="studentPassword" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" id="studentLogin" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="student_registration.php">Register Here</a></p></div>
    
    <h1>Teacher Login Form</h1>
    <form action="home_page.php" method="post" name="teacherForm">
        <div class="form-group">
            <input type="username" placeholder="Enter username:" name="username" id="teacherUsername" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" id="teacherPassword" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" id="teacherLogin" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</div>
</body>
</html>