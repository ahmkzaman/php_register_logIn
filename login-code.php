<?php
session_start();
require_once('dbcon.php');
if (isset($_POST['loginBtn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $errors = [];
    if ($email == '' || $password == '') {
        array_push($errors, 'All fields are mandetory');
    }
    if ($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, 'Please enter a valid email');
    }
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('location: login.php');
        exit();
    }

    $userQuery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $userQuery);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['loggedInStatus'] = true;
            $_SESSION['message'] = "Logged in successfully";
            header('Location: dashboard.php');
            exit();
        } else {
            array_push($errors, 'Invalid email or password');
            $_SESSION['errors'] = $errors;
            header('Location: login.php');
            exit();
        }
    } else {
        array_push($errors, "Something went wrong");
        $_SESSION['errors'] = $errors;
        header('Location: login.php');
        exit();
    }
}
