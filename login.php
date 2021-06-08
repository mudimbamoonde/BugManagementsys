<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bug Tracking System</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

</head>

<?php
$host = 'localhost';
$db_name = 'bugmon';
$username = 'root';
$password = '';
 $conn = new PDO('mysql:host='.$host.';dbname='.$db_name, $username,$password);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  session_start();
  if (isset($_SESSION["email"])) {
      exit(header("Location:index.php"));
  }
?>

<body style="font-size: 15px">
<div class="container-scroller">

<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<div class="row">
    <div class="col-md-1"></div>
  

    <div class="col-md-3"></div>
            <div class="col-md-4">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card  border border-danger">
                
                    <div class="card-body">
                      <h1 class="card-title text-dark" align="center"><img src="images/bug.jpeg" width="100" height="100"> </h1>
                      <h2 align="center">Welcome to B.T.S</h2>
                   
                      <?php 
                         if(isset($_POST["loginBTN"])){
                           $username = $_POST["loginusernname"];
                           $password = trim(md5($_POST["password"]));

                           $sql = "SELECT*FROM users WHERE email =? or username=? AND password=?";
                           $binder = $conn->prepare($sql);
                           $binder->bindValue(1,$username);
                           $binder->bindValue(2,$username);
                           $binder->bindValue(3,$password);
                           $binder->execute();
                           if($binder->rowCount() > 0){
                             $row = $binder->fetch(PDO::FETCH_OBJ);
                             session_start();
                             $_SESSION["fname"] = $row->firstName;
                             $_SESSION["lname"] = $row->lastName;
                             $_SESSION["username"] = $row->username;
                             $_SESSION["email"]  = $row->email;
                             $_SESSION["role"] = $row->accessLevel;
                              header("Location:index.php");
                           }else{
                             echo "<p class='text-danger text-sm-center' align='center'>Username or password incorrect</p>";
                           }
                         }
                      ?>
                  
                      
                      <form method="post">
                        <div class="form-group">
                          <input type="text" name="loginusernname" class="form-control" id="exampleInputEmail1" placeholder="Username">
                        </div>
                        
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                          <button type="submit" name="loginBTN" class="btn btn-success">Sign In</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>

</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php
include "include/javaSc.php";
?>
</body>

</html>