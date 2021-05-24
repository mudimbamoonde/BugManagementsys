<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="images/faces/face1.jpg" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">Mudimba Moonde</p>
                        <div>
                            <small class="designation text-muted">System Engineer</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
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
                <i class="menu-icon mdi mdi-currency-usd"></i>
                <span class="menu-title">Repository</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="paymnents">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pending_payments.php">Create Repository</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="balance.php">Manage Repository</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#m_user" aria-expanded="false" aria-controls="cid">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title" title="Continous Integration / Development">CI/CD</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="m_user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="add_user.php">Deploy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_user.php">Reverse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="activate_student.php">Manage Version</a>
                    </li>
                </ul>
            </div>
        </li>

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
                        <a class="nav-link" href="activate_student.php">Assign Task</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>