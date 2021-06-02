s<!DOCTYPE html>
<html lang="en">
<?php

include "include/head.php";
?>

<body style="font-size: 15px">
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo bg-success" href="index.php">
                <!--          <img src="images/logo.svg" alt="logo" />-->
                Bug Tracking System
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.php">
                <!--          <img src="images/logo-mini.svg" alt="logo" />-->
                Bug Tracking System
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
    
            <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                            </p>
                            <span class="badge badge-pill badge-warning float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                                <p class="font-weight-light small-text">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                                <p class="font-weight-light small-text">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-email-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                                <p class="font-weight-light small-text">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="profile-text">Hello, Mudimba Moonde</span>
                        <img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <a class="dropdown-item p-0">
                            <div class="d-flex border-bottom">
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                                </div>
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                                </div>
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                                </div>
                            </div>
                        </a>
                        <a  href="#" class="dropdown-item mt-2">
                            Manage Accounts
                        </a>
                        <a href="#"  class="dropdown-item">
                            Change Password
                        </a>
                        <a href="logout.php" class="dropdown-item">
                            Logout Out
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php
        include "include/Leftmenu.php";
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-10 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php 
                                                $sql = "SELECT*FROM repository WHERE rid=?";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindValue(1,$_GET["repid"]);
                                                $stmt->execute();
                                                $row = $stmt->fetch(PDO::FETCH_OBJ);                                        
                                            ?>
                                            
                                            <div class="d-flex align-items-center p-3 my-3 text-white bg-primary rounded shadow-sm">
                                                <img class="me-3 img-thumbnail" src="images/bug.jpeg"  alt="" width="48" height="38">
                                                <div class="lh-1">
                                                <h1 class="h6 mb-0 text-white lh-1"><h2><?php echo $row->reponame ?></h1>
                                                </div>
                                            </div>
                                            <hr>


                                            <?php if(isset($_GET["repid"]) && isset($_GET["state"])){?>
                                                <?php if($_GET["state"] =="issues"){ ?>
                                                 
                                                    <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Add Issue +
                                                </button>
                                                    <br>
                                                    <br>
                                                    <ul class="list-group">
                                                    <?php
                                                        $chek = $conn->prepare("
                                                        SELECT *FROM issues WHERE rid=?
                                                        ");
                                                        $chek->bindValue(1,$_GET["repid"]);
                                                        $chek->execute();
                                                        if ($chek->rowCount() > 0) {
                                                            while ($ro = $chek->fetch(PDO::FETCH_OBJ)) {
                                                                ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php if ($ro->status == "active") { ?>
                                                   <b><?php echo $ro->issueName ?>  <span class="badge badge-warning"><?php echo $ro->status ?></span></b> <br>
                                                   <?php
                                                   } else {
                                                       ?>

                                                    <b><?php echo $ro->issueName ?>  <span class="badge badge-success"><?php echo $ro->status ?></span></b>
                                                   <?php
                                                   }
                                                            ?>
                                                
                                                   <span class="btn btn-sm btn-danger">x</span>
                                                </li>
                                               
                                
                                                            <?php
                                                            }

                                                        }else{
                                                            ?>

                                                <p> <h1>Welcome to issues!</h1><br>
                                                Issues are used to track todos, bugs, feature requests, and more.
                                                As issues are created, they’ll appear here in a 
                                                searchable and filterable list. 
                                                To get started, you should create an issue.</p>

                                                    <?php } ?>
                                                    </ul>
                                                <?php }?>



                                                <?php if($_GET["state"] =="task"){ ?>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalTask">Assign Task +</button>
                                                <ul class="list-group">
                                                    <?php
                                                        $assigned = $conn->prepare("
                                                        SELECT *FROM assignedissues AS ai INNER JOIN issues AS iss ON iss.issueID = ai.issueID  
                                                        INNER JOIN users AS u ON 
                                                        u.userID = ai.userID WHERE iss.rid=?
                                                        ");
                                                       $assigned->bindValue(1,$_GET["repid"]);
                                                        $assigned->execute();
                                                        if ($assigned->rowCount() > 0) {
                                                            while ($rox = $assigned->fetch(PDO::FETCH_OBJ)) {
                                                                ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">


                                                    <h4><?php echo $rox->firstName ." " .$rox->lastName ?><br><b class="text-muted"><?php echo $rox->issueName ?></b></h4>
                                                    
                                                   <?php
                                                   }
                                                            ?>
                                                
                                                   <span class="btn btn-sm btn-danger">x</span>
                                                </li>
                                               
                                
                                                            <?php
                                                            } else{
                                                            ?>

                                                <p> <h1>Assign task to User!</h1><br>
                                                You will be able to track the person assigned to a task!!</p>

                                                    <?php } ?>
                                                    </ul>






                                                <?php } ?>

                                                <!-- repid & state -->
                                                <?php }else{?>

                                                    <main class="container">


<div class="my-3 p-3 bg-body rounded shadow-sm">
  <h2 class="border-bottom pb-2 mb-0">Issues</h2>
  <span class="border-bottom pb-2 mb-0">Issues Log on the System</span>
  <?php 
      $sqlq = "SELECT*FROM issues WHERE rid=?";
      $stmtq = $conn->prepare($sqlq);
      $stmtq->bindValue(1,$_GET["repid"]);
      $stmtq->execute();
      while ($rowq = $stmtq->fetch(PDO::FETCH_OBJ)) {
          ?>
  <div class="d-flex text-muted pt-3">
    <!-- <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg> -->
    <p class="pb-3 mb-0 small lh-sm border-bottom">
      <strong class="d-block text-dark"><?php echo $rowq->issueName ?> </strong>
      <?php  if($rowq->status == "active" ){?>
      <span class="badge badge-danger"><?php echo $rowq->status ?> </span>
      <?php }else{?>
          <span class="badge badge-success"><?php echo $rowq->status ?> </span>
      <?php }?>
    </p>
  </div>
  <?php
      } ?>


<div class="my-3 p-3 bg-body rounded shadow-sm">
  <h6 class="border-bottom pb-2 mb-0">Assiged Issues</h6>

  <?php 
      $sqlw = "SELECT *FROM assignedissues AS ai INNER JOIN issues AS iss ON iss.issueID = ai.issueID  
      INNER JOIN users AS u ON  u.userID = ai.userID WHERE iss.rid=?";
      $stmtw = $conn->prepare($sqlw);
      $stmtw->bindValue(1,$_GET["repid"]);
      $stmtw->execute();
      while ($roww = $stmtw->fetch(PDO::FETCH_OBJ)) {
          ?>
  <div class="d-flex text-muted pt-3">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <div class="d-flex justify-content-between">
        <strong class="text-gray-dark"><?php echo $roww->issueName ?></strong>
        <a href="#"><?php echo $roww->description; ?></a>
      </div>
      <span class="d-block"><?php echo $roww->firstName ." ".$roww->lastName ?></span>
    </div>
  </div>

  <?php
      } ?>


</div>
</main>

                                                <?php } ?>


            
                                        
                                        </div>
                            </div>
                       
                    </div>

                    <!-- col 2 -->
                    <div class="col-2 grid-margin">
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">Quick Link</li>
                            <li class="list-group-item"><a href="?repid=<?php echo $row->rid ?>&state=issues">Issues</a></li>
                            <li class="list-group-item"><a href="?repid=<?php echo $row->rid ?>&state=task">Assign Task</a></li>
                         
                        </ul>
                    </div>
                    <!-- col2 end -->
                    <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Issue</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div id="msg"></div>
                        <form>
                          <div class="row">
                              <div class="col-md-8">
                                 <label for="issuename">Issue Name</label>
                                 <input type="hidden" name="rid" id="rid" value="<?php echo $_GET["repid"] ?>" class="form-control">
                                 <input type="text" name="issuename" id="issuename" class="form-control">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-8">
                                 <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option selected disabled>SELECT STATUS</option>
                                    <option value="active">Active</option>
                                    <option value="resolved">Resolved</option>
                                </select>
                              </div>
                          </div>
                      
                    </div>
                    <div class="modal-footer pull-left">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="saveIssues" class="btn btn-primary">Save Issue</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                <!-- End modal -->


                <!-- Assign Task -->
                <div class="modal fade" id="exampleModalTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div id="msg2"></div>
                        <form>
                          <div class="row">
                              <div class="col-md-8">
                                 <label for="issueID">Issue Name</label>
                                 <input type="hidden" name="rid" id="rid" value="<?php echo $_GET["repid"] ?>" class="form-control">
                                 <select name="issueID" id="issueID" class="form-control">
                                   
                                 <?php 
                                 
                                 $chek2 = $conn->prepare("SELECT*FROM issues WHERE rid=? AND status='active'");
                                 $chek2->bindValue(1,$_GET["repid"]);
                                 $chek2->execute();
                                 if ($chek2->rowCount() > 0) {
                                     echo " <option selected disabled>SELECT ISSUE</option>";
                                     while ($rowx = $chek2->fetch(PDO::FETCH_OBJ)) {
                                         echo "<option value='$rowx->issueID'>$rowx->issueName</option>";
                                        }
                                     }else{
                                        echo "<option disabled selected>No Pending Issues!!</option>";
                                     }    
                                         ?> 
                                </select>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-8">
                                 <label for="userID">Users</label>
                                 <select name="userID" id="userID" class="form-control">
                                    <option selected disabled>SELECT ISSUE</option>
                                 <?php 
                                 
                                 $pt = $conn->prepare("SELECT*FROM users");
                                 $pt->execute();
                                 if ($pt->rowCount() > 0) {
                                     while ($rx = $pt->fetch(PDO::FETCH_OBJ)) {
                                         echo "<option value='$rx->userID'>$rx->email</option>";
                                        }
                                     }    
                                         ?> 
                                </select>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-8">
                                 <label for="desc">Description</label>
                                <textarea id="desc" name="desc" class="form-control"></textarea>
                              </div>
                          </div>
                      
                    </div>
                    <div class="modal-footer pull-left">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="assignIssue" class="btn btn-primary">Assign Issue</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                <!-- End Task -->
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php
    include "include/footer.php";
    ?>
    <!-- partial -->
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