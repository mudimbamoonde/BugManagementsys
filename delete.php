<?php 
require_once "config.php";

if (isset($_GET["delete"])) {
    if(isset($_GET["resolve"])){
        
    }
    $chek = $conn->prepare("
DELETE FROM issues WHERE issueName=?
");
    $chek->bindValue(1, $_GET["delete"]);
    if($chek->execute()){
        header("location:detail.php?repid=1&state=issues");
    }

}