<?php include "include/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php

include "include/head.php";
?>

<body style="font-size: 55px">
<div class="container-scroller">

<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<div class="row">
    <div class="col-md-1"></div>
  
    <div class="col-md-3"></div>
            <div class="col-md-4 d">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h1 class="card-title text-dark" align="center"><img src="images/bug.jpeg" width="100" height="100"> </h1>
                      <h2 align="center">Welcome to B.T.S</h2>
                      <form class="forms-sample">
                        <div class="form-group">
                          <!-- <label for="exampleInputEmail1">Email address</label> -->
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Username">
                        </div>
                        <div class="form-group">
                          <!-- <label for="exampleInputPassword1">Password</label> -->
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                          <button type="submit" class="btn btn-success">Sign In</button>
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