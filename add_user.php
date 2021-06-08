<!DOCTYPE html>
<html lang="en">
<?php

include "include/head.php";
?>

<body style="font-size: 15px">
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "include/account.php" ?>
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
                                            <div class="card-title"><h1>Add Users</h1></div>
                                            <hr>
                                            <div id="adminMessage"></div>
                                            <form class="form-sample">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">First Name:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="fname" name="fname" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Last Name:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text"  id="lname" name="lname" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Username:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="username" name="username" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Email:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="email" name="email" style="border: groove" class="form-control" />
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
                                                                    <option>Developer</option>
                                                                    <option>Tester</option>
                                                                    <option>Admin</option>
                                                                    <option>Both</option>
                                                                    <!-- 'developer','tester','admin','both' -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Password:</label>
                                                            <div class="col-sm-9">
                                                                <input type="password" id="pword" name="pword" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Confirm Password:</label>
                                                            <div class="col-sm-9">
                                                                <input type="password" id="conpass" name="conpass" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- <a href="#" id="saveUser" class="btn btn-lg btn-success">Save</a> -->
                                                        <a href="#" id="createAccount" class="btn btn-lg btn-primary">Create Account</a>
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