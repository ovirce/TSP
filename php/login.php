<?php
include 'php/session.php';

if ($logged_in) {
    header('Location: /account.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        login();
        header('Location: /account.php');
        exit;
    } 
}
?>
<?php include 'php/header.php'; ?>
<h1> Login </h1>
<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <button type="submit">Login</button>
</form>
<?php include 'php/footer.php'; ?>