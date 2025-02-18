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
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Username does not match</div>";
            }
        }
        ?>
    <div class="container">
        <h1>Student Login Form</h1>
      <form action="login.php" method="post" name="studentForm">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" id="studentUsername" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" id="studentPassword" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" id="studentLogin class="btn btn-primary>
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    
    <h1>Teacher Login Form</h1>
    <form action="login.php" method="post" name="teacherForm">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" id="teacherUsername" class="form-control">
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