s<!DOCTYPE html>
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