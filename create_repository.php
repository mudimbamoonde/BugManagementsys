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
                <div class="row purchace-popup">

                </div>


                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title"><h1>Create Repository</h1></div>
                                            <hr>
                                            <div id="adminMessage"></div>
                                            <form class="form-sample">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Repostory Name:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="rname" name="rname" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Description:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text"  id="desc" name="desc" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <!--                                                            CourseName 	CourseCode 	year 	semester -->
                                                            <label class="col-sm-3 col-form-label">Access Level:</label>
                                                            <div class="col-sm-9">
                                                                <select  id="role" name="role" style="border: groove" class="form-control">
                                                                    <option selected>SELECT ROLE</option>
                                                                    <option>Developers</option>
                                                                    <option>Tester</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="#" id="saverepo" class="btn btn-success">Save</a>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--End of Form Add School         -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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