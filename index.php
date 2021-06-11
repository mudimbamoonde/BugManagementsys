<?php include "include/config.php"; ?>
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
        <!-- partial:partials/_s idebar.html -->
        <?php
        include "include/Leftmenu.php";
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
        
                <div class="row">
                    <div class="col-12 grid-margin">
                      <div class="jumbotron text-danger"><h1>Bug Tracking</h1></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                        <main class="container">
                                        
                                        <div class="row">
                                         <div class="col-md-6">

                                         <div class="my-3 p-3 bg-body rounded shadow-sm">
                                                <h2 class="border-bottom pb-2 mb-0">Issues</h2>
                                                <!-- <span class="border-bottom pb-2 mb-0">Issues Log on the System</span> -->
                                                <?php 
                                                    $sqlq = "SELECT*FROM issues";
                                                    $stmtq = $conn->prepare($sqlq);
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
                                             </div>





                                        </div>

                                        <div class="col-md-5">
                                           <div class="my-3 p-3 bg-body rounded shadow-sm">
                                                    <h2 class="border-bottom pb-2 mb-0">Assiged Issues</h2>
                                                    <?php 
                                                        $sqlw = "SELECT *FROM assignedissues AS ai INNER JOIN issues AS iss ON iss.issueID = ai.issueID  
                                                        INNER JOIN users AS u ON  u.userID = ai.userID ";
                                                        $stmtw = $conn->prepare($sqlw);
                                                        $stmtw->execute();
                                                        while ($roww = $stmtw->fetch(PDO::FETCH_OBJ)) {
                                                            ?>
                                                    <div class="d-flex text-muted pt-3">
                                                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                                                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                        <div class="d-flex justify-content-between">
                                                            <strong class="text-dark"><?php echo $roww->issueName ?></strong>
                                                        </div>
                                                        <span class="d-block">@<?php echo $roww->firstName ." ".$roww->lastName ?></span>
                                                        <br>
                                                        <p class="text-dark"><?php echo $roww->description; ?></p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        } ?>
                                                    </div>
                                        </div>
                                    </main>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--                                            -->
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