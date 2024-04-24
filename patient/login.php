<?php
session_start();
if (isset($_POST['login'])) {
    include('../includes/connection.php');
    $query = "select id,email,password,name from patients where email = '$_POST[email]' AND password = '$_POST[password]'";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_num_rows($query_run)) {
        $_SESSION['email'] = $_POST['email'];
        while ($row = mysqli_fetch_assoc($query_run)) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['uid'] = $row['id'];
        }
        echo "<script type='text/javascript'>
          window.location.href = 'patient_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
          alert('Please enter correct email and password.');
          window.location.href = 'login.php';
      </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>

    <?php include('header.php'); ?>

    <style>
        body {
            position: relative;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        #login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #dc3545;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto" id="login-container">
                <center>
                    <h4>Patient Login Page</h4>
                </center>
                <hr><br>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email ID" required>
                    </div><br>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div><br>
                    <input type="submit" class="btn btn-danger" value="Login" name="login">
                    <strong>Don't have an account? </strong><a href="register.php">Register here</a>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-danger" id="footer">
                &copy 2024 www.charusat.ac.in
            </div>
        </div>
    </div>
</body>

</html>
