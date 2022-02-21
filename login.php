 <?php require('include/connection.php');
 session_start();
 if (isset($_POST['sub'])) {
    $email=$_POST['email'];
    $pass=$_POST['password'];
    "SELECT * FROM admin WHERE email='$email' AND password='$pass'";
    $query=mysqli_query($con,"SELECT * FROM admin where email='$email' AND password='$pass'");
    $row=mysqli_fetch_assoc($query);
      if ($query == TRUE ) {
        $_SESSION['id']=$row['id'];
        header('location: categories.php');
       
    }
   
 }


  ?>
 <!doctype html>
<html  lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Log IN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!--link rel="stylesheet" type="text/css" href="css/bootstrap-rtl.css"-->
    <link rel="stylesheet" type="text/css" href="css/Dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style >
        .login{
            width: 300px;
            margin: 80px auto;
        }
        .login h5{
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }
    </style>

</head>
<body>
    <div class="login">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <h5 >Log IN</h5>
            <div class="form-group">
                <label for="mail">Enter Your Email</label>
                <input type="email" name="email" class="form-control" id="mail" required>
            </div>
            <div class="form-group">
                <label for="password">Enter Your Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
              <br>  <input type="submit" name="sub" class="btn-custom form-control" value="LOG IN" >
            </div>

        </form>
    </div>
    <!-- Bootstarp.js-->
     <script src="js/jquery5.min.js" type="text/javascript"></script>
     <script src="https://kit.fontawesome.com/03757ac844.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>