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
        require_once "database.php";//requires the database.php file
        if (isset($_POST["login"])) { //php for the login form
           $username = $_POST["username"]; //posts the email
           $password = $_POST["password"];//posts the password
        
           $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?"); //prepares the statement
           mysqli_stmt_bind_param($stmt, "s", $username); //binds the parameters
           mysqli_stmt_execute($stmt); //executes the statement
           $result = mysqli_stmt_get_result($stmt); //gets the result from the database
           $user = mysqli_fetch_array($result, MYSQLI_ASSOC); //fetches the users from the database to see if it is already stored
            if ($user) {
                if (password_verify($password, $user["password"])) { //verifies the password
                    session_start(); //starts the session
                    $_SESSION["user"] = $username; //sets the session
                    header("Location: index.php"); //redirects to the index.php page
                    die(); //kills the script
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>"; //displays an error message
                }
            }else{
                echo "<div class='alert alert-danger'>Username does not match</div>"; //displays an error message
            }
        }//view model topic 7 on canvas
        ?>
    <div class="container">
        <h1>Student</h1>
      <form action="home_page.php" method="post" name="studentForm" id="studentForm">
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
     <div><p>Add Class <a href="student_registration.php">Register Here</a></p></div>
    
    <h1>Teacher</h1>
    <form action="" method="post" name="teacherForm" id="teacherForm">
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
     <div><p>Guest</a></p></div>
    </div>
</div>
</body>
</html>