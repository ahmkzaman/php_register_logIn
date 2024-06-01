<?php
session_start();
require_once('dbcon.php');
if (isset($_POST['registerBtn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $errors = [];

    if ($name == '' || $phone == '' || $email == '' || $password == '') {
        array_push($errors, 'Please fill in all fields');
    }

    if ($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, 'Please enter a valid email');
    }
    if ($email != '') {
        $userCheck = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
        if ($userCheck) {
            if (mysqli_num_rows($userCheck) > 0) {
                array_push($errors, 'Email already exists');
            }
        } else {
            array_push($errors, "Something went wrong");
        }
    }

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('location: register.php');
        exit();
    }

    $query = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
    $userResult = mysqli_query($conn, $query);

    if ($userResult) {
        $_SESSION['message'] = 'Successfully registered';
        header('location: index.php');
        exit();
    } else {
        $_SESSION['message'] = 'Something went wrong';
        header('location: register.php');
        exit();
    }
}
