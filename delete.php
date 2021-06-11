<?php 
require_once "include/config.php";

if (isset($_GET["delete"])) {
    if($_GET["view"]=='resolved'){
        $chek = $conn->prepare("
        UPDATE issues SET status=? WHERE issueID=?
     ");
         $chek->bindValue(1, $_GET["view"]);
         $chek->bindValue(2, trim($_GET["delete"]),PDO::PARAM_INT);
         if($chek->execute()){
             header("location:index.php");
         }
    }else if($_GET["view"]=='deleted'){
        $chek = $conn->prepare("
        DELETE FROM issues  WHERE issueID=?
     ");
        //  $chek->bindValue(1, $_GET["view"]);
         $chek->bindValue(1, trim($_GET["delete"]),PDO::PARAM_INT);
         if($chek->execute()){
             header("location:index.php");
         }
    }
   

}