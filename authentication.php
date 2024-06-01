<?php
session_start();
if (!isset($_SESSION['loggedInStatus'])) {
    $_SESSION['message'] = "Please login to continue";
    header('Location: login.php');
    exit();
}
