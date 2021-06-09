<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo text-danger" href="index.php">
               Bug Tracking System
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.php">
                <!--          <img src="images/logo-mini.svg" alt="logo" />-->
               Bug Tracking System
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
    
            <ul class="navbar-nav navbar-nav-right">
               <?php
               require_once "config.php";
                 $owp = $conn->prepare("SELECT * FROM issues inner join repository ON repository.rid = issues.rid WHERE status=?");
                 $owp->bindValue(1,"active");
                 $owp->execute();

                 $count = $owp->rowCount();
               
               ?>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count"><?php echo $count ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have <?php echo $count ?> new notifications
                            </p>
                           
                        </a>
                        <div class="dropdown-divider"></div>
                        <?php 
                        
                        while ($rw = $owp->fetch(PDO::FETCH_OBJ)) {
                            ?>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark"><?php echo $rw->issueName ?></h6>
                                <p class="font-weight-light small-text">
                                    <?php echo $rw->reponame ?>
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <?php
                        } ?>
                       
                        <!-- <a class="dropdown-item preview-item">
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
                        </a> -->
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="profile-text">Hi, <?php echo $_SESSION["fname"] ." ". $_SESSION["lname"] ?></span>
                        <!-- <img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image"> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                
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