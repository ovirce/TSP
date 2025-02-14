<?php
declare(strict_types = 1);                 
use PhpBook\Validate\Validate;             

if ($cms->getSession()->role !== 'public') {             // If user is already logged in
    redirect('member/' . $cms->getSession()->id);        // Redirect to their page
    exit;                                                // Stop code running
}         

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

    if ($invalid) {                                            // If data is not valid
        $errors['message'] = 'Please try again.';              // Store error message
    } else {                                                   // If data was valid
        $member = $cms->getMember()->login($username, $password); // Get member details
        if ($member and $member['role'] == 'suspended') {      // If member is suspended
            $errors['message'] = 'Account suspended';          // Store message
        } elseif ($member) {                                   // Otherwise for members
            $cms->getSession()->create($member);               // Create session
            redirect('member/' . $member['id']);               // Redirect to their page
        } else {                                               // Otherwise
            $errors['message'] = 'Please try again.';          // Store error message
        }
    }
}

$data['navigation'] = $cms->getCategory()->getAll();         
$data['success'] = $success;                             
$data['username'] = $username;                             
$data['errors'] = $errors;                               

echo $twig->render('index.html', $data);                     