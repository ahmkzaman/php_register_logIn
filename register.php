<?php
session_start();
if (isset($_SESSION['loggedInStatus'])) {
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form in php mysql with session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="mt-4 card card-body shadow">

                    <h4>Register</h4>
                    <hr>
                    <?php
                    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
                        foreach ($_SESSION['errors'] as $error) {
                            echo '<div class="alert alert-warning">' . $error . '</div>';
                        }
                        unset($_SESSION['errors']);
                    }
                    if (isset($_SESSION['message'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
                        unset($_SESSION['message']);
                    }
                    ?>

                    <form action="register-code.php" method="POST">

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="registerBtn" class="btn btn-primary w-100">Submit</button>
                        </div>
                        <div class="text-center">
                            <a href="login.php">Click here to Login</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>