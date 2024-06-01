<?php
$conn = mysqli_connect('localhost', 'root', '', 'user_registration');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
