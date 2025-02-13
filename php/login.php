<?php
declare(strict_types = 1);                 
use PhpBook\Validate\Validate;             

include '../src/bootstrap.php';            

$username   = '';                          
$errors  = [];                             
$success = $_GET['success'] ?? null;                   

if ($_SERVER['REQUEST_METHOD'] == 'POST') {              
    $username = $_POST['username'];                     
    $password = $_POST['password'];                     

    $errors['email']    = Validate::isUsername($username)
        ? '' : 'Please enter username';    
    $errors['password'] = Validate::isPassword($password)
        ? '' : 'Passwords must be at least 8 characters and have:<br> 
                A lowercase letter<br>An uppercase letter<br>A number<br>
                And a special character';  
    $invalid = implode($errors);                  

    if ($invalid) {                                           
        $errors['message'] = 'Please try again.';              
    } else {                                                  
        $member = $cms->getMember()->login($username, $password); 
        if ($member and $member['role'] == 'suspended') {      
            $errors['message'] = 'Account suspended';          
        } elseif ($member) {                                   
            $cms->getSession()->create($member);               
            redirect('member.php', ['id' => $member['id'],]);  
        } else {                                               
            $errors['message'] = 'Please try again.';         
        }
    }
}

$data['navigation'] = $cms->getCategory()->getAll();         
$data['success'] = $success;                             
$data['username'] = $username;                             
$data['errors'] = $errors;                               

echo $twig->render('login.html', $data);                     