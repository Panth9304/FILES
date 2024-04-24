<?php
if (isset($_POST['register'])) {
    include('../includes/connection.php');
    $query = "insert into patients values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
    $query_result = mysqli_query($connection, $query);
    if ($query_result) {
        echo "<script type='text/javascript'>
              alert('Patient registered successfully...');
            window.location.href = 'login.php';  
          </script>";
    } else {
        echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
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
    <title>Login Page</title>
    
    <?php include('header.php'); ?>
    <style>
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

    <div class="container-fluid">
        <div class="row" style="margin-top: 5%;">
            <div class="col-md-4 mx-auto" id="login-container">
                <center>
                    <h4>Registration Page</h4>
                </center>
                <hr><br>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                    </div><br>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email ID" required>
                    </div><br>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div><br>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile No." required>
                    </div><br>
                    <input type="submit" class="btn btn-danger" value="Register" name="register">
                    <strong>Already registered? </strong><a href="login.php">Login here</a>
                    </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="footer">
                &copy 2024 www.charusat.ac.in
            </div>
        </div>
    </div>  
    </body>

</html>