<?php 
require_once "config.php";
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <!-- <div class="profile-image">
                        <img src="images/faces/face1.jpg" alt="profile image">
                    </div> -->
                    <div class="text-wrapper">
                        <p class="profile-name"><?php echo $_SESSION["fname"] ." ". $_SESSION["lname"] ?></p>
                        <div>
                            <small class="designation text-muted text-capitalize"><?php echo $_SESSION["role"] ?></small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                    
                </div>
                <a href="../create_repository.php" class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
                </a>
            </div>
            
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Home</span>
            </a>
        </li> 
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#paymnents" aria-expanded="false"
                aria-controls="paymnents">
                <i class="menu-icon mdi mdi-file"></i>
                <span class="menu-title">Repository</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="paymnents">
                <ul class="nav flex-column sub-menu">
                <?php 
                  if ($_SESSION["role"]=='admin') {
                      ?>
                    <li class="nav-item">
                        <a class="nav-link" href="create_repository.php">Create Repository</a>
                    </li>
                    <?php
                  } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_repository.php">Manage Repository</a>
                    </li>
                </ul>
            </div>
        </li>
<!-- 
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cid" aria-expanded="false" aria-controls="cid">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title" title="Continous Integration / Development">CI/CD</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cid">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="">Deploy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Reverse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Manage Version</a>
                    </li>
                </ul>
            </div>
        </li> -->
        <?php 
           if ($_SESSION["role"]=='admin') {
        ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#m_user" aria-expanded="false" aria-controls="m_user">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="m_user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="add_user.php">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_user.php">Manage User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="assignTask.php">Assign Task</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php } ?>

        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>