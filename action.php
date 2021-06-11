<?php
include "include/config.php";
$output = "";

/**Admin Management section*/
if(isset($_POST["saveAccount"])){
    // const firstname = $("#fname").val();
    //     const lastname = $("#lname").val();
    //     const username = $("#username")
    //     const pword = $("#pword")
    //     const conpass = $("#conpass")
    //     const  email= $("#email").val();
    //     const  role = $("#role").val();
    // saveAdmin:1,firstname:firstname,lastname:lastname,username:username,
    // email:email,role:role,pword:pword,conpass:conpass

    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $pword = $_POST["pword"];
    $conpass = $_POST["conpass"];

    try{

      if(!empty($fname) && !empty($lname) && !empty($username) && !empty($email)){
        //password Validation
        if ($pword == $conpass) {
        //userValidation
        $sqli = "SELECT * FROM users WHERE email=?";
        $th = $conn->prepare($sqli);
        $th->bindValue(1,$email);
        $th->execute();
        if($th->rowCount() > 0){
            $output .= "<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>User Already Exist</b>
         </div>";
        }else{
            $hashedpassword = md5($pword);

        $sql = "INSERT INTO users VALUES(?,?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(1,NULL,PDO::PARAM_INT);
        $stmt->bindValue(2,$fname,PDO::PARAM_STR);
        $stmt->bindValue(3,$lname,PDO::PARAM_STR);
        $stmt->bindValue(4,$username,PDO::PARAM_STR);
        $stmt->bindValue(5,$email);
        $stmt->bindValue(6,$role,PDO::PARAM_STR);
        $stmt->bindValue(7,$hashedpassword,PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Submitted</b>

        </div>";
        }
    }
}else{
    $output .= "<div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Password Doesn't Match</b>
 </div>";
}
      }else{
        $output .= "<div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Dont Leave Blank</b>
     </div>";
      }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }


}


//DANGER ZONE ADMIN AT WORK
if (isset($_POST["saverepo"])){
    $reponame = $_POST["reponame"];
    $desc = $_POST["desc"];
    
    $accessLevel= $_POST["accesslevel"];
  
    try{
        if (empty($reponame)) {
            $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Dont leave repository Name  blank</b>
        </div>";
        }else{
            // Check if the repo exist
            $valid = "SELECT*FROM repository WHERE reponame=?";
            $stm = $conn->prepare($valid);
            $stm->bindValue(1,$reponame,PDO::PARAM_STR);
            $stm->execute();
            if($stm->rowCount() > 0){
                $output .= "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Repository Already Exist</b>
             </div>";
            }else{
                $sql = "INSERT INTO repository VALUES(?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1,NULL,PDO::PARAM_INT);
                $stmt->bindValue(2,$reponame,PDO::PARAM_STR);
                $stmt->bindValue(3,$desc,PDO::PARAM_STR);
                $stmt->bindValue(4,$accessLevel,PDO::PARAM_STR);
                if ($stmt->execute()){
                    $output .= "<div class='alert alert-success'>
               <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Added</b>
            </div>";
                }
            }
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}

if(isset($_POST["repositoryView"])){
           $valid = "SELECT*FROM repository";
            $stm = $conn->prepare($valid);
            $stm->execute();
            if($stm->rowCount() > 0){
                while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                    $output .="
                  <tr>
                     <td>".$row->rid."</td>
                     <td><a href='detail.php?repid=".$row->rid."'>".$row->reponame."</a></td>
                     <td>".$row->description."</td>
                     <td>".$row->accessLevel."</td>
                
                  </tr>
                ";
                }
            }
}

if(isset($_POST["assignTask"])){
           $valid = "SELECT*FROM repository";
            $stm = $conn->prepare($valid);
            $stm->execute();
            if($stm->rowCount() > 0){
                while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                    $output .="
                  <tr>
                     <td>".$row->rid."</td>
                     <td><a href='detail.php?repid=".$row->rid."&state=task'>".$row->reponame."</a></td>
                    
                     <td>".$row->accessLevel."</td>
                
                  </tr>
                ";
                }
            }
}

//fetch Admin
if (isset($_POST["fetchAdmin"])){

    try{
        $sql = "SELECT*FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $n = 0;
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
                //First Name 	Last Name 	username 	Email 	access Level 	Status 	Action
//              	user_id	firstname	lastname	username	gender	accessLevel	address	email	phone	status
                $n++;
                $id = $row->userID;
                $fname = $row->firstName;
                $lname = $row->lastName;
                $username = $row->username;
                $accessLevel = $row->accessLevel;
                $email = $row->email;
            $output .=" <tr>
                        <td>$n</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$username</td>
                        <td>$email</td>
                        <td>$accessLevel</td>
              
                        <td><a href='#' id='createAccountAdmin' class='btn btn-warning'>Edit</a> | <a href='#'  class='btn btn-danger'>
                        <span class='mdi mdi-delete-circle'></span></a> </td>
                    </tr> ";

            }

        }


    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}


///Admin
if (isset($_POST["createAccountAdmin"])) {
//username 	password 	nrc 	access_level 	name 	email
//    {createAccountAdmin:1,name:name,nrc:nrc,email:email,user_id:user_id

    try {
//        createAccountStudent:1,name:name,email:email,internalID:internalID
        $nrcx= $_POST["nrc"];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $accessLevel = $_POST["accessLevel"];
        $user_id = $_POST["user_id"];
        $username = $_POST["username"];
//        echo $nrct;

        $query = "SELECT*FROM user WHERE email='$email'";
        $query1 = $conn->prepare($query);
        $query1->execute();

        if ($query1->rowCount() == 1) {

            $qu = "UPDATE admin SET status=1 WHERE user_id=$user_id";
            $qu1 = $conn->prepare($qu);
            $qu1->execute();


            $hash = md5($username);

            $sql = "INSERT INTO user VALUES (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $username, PDO::PARAM_INT);
            $stmt->bindValue(2, $hash, PDO::PARAM_STR);
            $stmt->bindValue(3, $nrcx, PDO::PARAM_STR);
            $stmt->bindValue(4, $accessLevel, PDO::PARAM_STR);
            $stmt->bindValue(5, $name, PDO::PARAM_STR);
            $stmt->bindValue(6, $email, PDO::PARAM_STR);


            if ($stmt->execute()) {
                $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Created</b>
        </div>";
            }

        } else {
            $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Email Already used</b>
        </div>";

        }

    } catch (Exception $e) {
        $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}

//message
if (isset($_POST["message"])){
    try{
        $sql = "SELECT*FROM message";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0 ) {
            while ($row=$stmt->fetch(PDO::FETCH_OBJ)) {
                //from	to	subject	message	date	read	msg_id
                $from = $row->from;
                $to = $row->to;
                $subject = $row->subject;
                $message = $row->message;
                $date = $row->date;
                $msg_id = $row->msg_id;

                //2012-01-17 00:23:33
                $da = explode("-",$date);
                $year = $da[0];
                $month = $da[1];
                $day = $da[2];
//
//                $hour = $da[4];
//                $minute = $da[5];
//                $second = $da[6];

                $output .="
    <div class=\"row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3\">
    <div class=\"col-md-1\">
        <img class=\"img-sm rounded-circle mb-4 mb-md-0\" src=\"images/faces/face1.jpg\" alt=\"profile image\">
    </div>
    <div class=\"ticket-details col-md-9\">
        <div class=\"d-flex\">
            <p class=\"text-dark font-weight-semibold mr-2 mb-0 no-wrap\">$from:</p>
            <p class=\"text-primary mr-1 mb-0\">[$from]</p>
            <p class=\"mb-0 ellipsis\">$subject</p>
        </div>
        <p class=\"text-gray ellipsis mb-2\">
        $message
        </p>
        <div class=\"row text-gray d-md-flex d-none\">
            <div class=\"col-4 d-flex\">
                <small class=\"Last-responded mr-2 mb-0 text-muted text-muted\">3 hours ago</small>
            </div>
            <div class=\"col-4 d-flex\">
                <small class=\"mb-0 mr-2 text-muted text-muted\">Due in :</small>
                <small class=\"Last-responded mr-2 mb-0 text-muted text-muted\">6 Days</small>
            </div>
        </div>
    </div>
    <div class=\"ticket-actions col-md-2\">
        <div class=\"btn-group dropdown\">
            <button type=\"button\" class=\"btn btn-success dropdown-toggle btn-sm\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Manage
            </button>
            <div class=\"dropdown-menu\">
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fa fa-reply fa-fw\"></i>reply</a>
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fa fa-history fa-fw\"></i>Delete</a>
                <div class=\"dropdown-divider\"></div>
              
            </div>
        </div>
    </div>
</div>";
            }
        }
    }catch (Exception $e){
        $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }


}

//saveIs:1,issuename:issuename,status:status
if(isset($_POST["saveIs"])){
    $issuename = $_POST["issuename"];
    // $desc = $_POST["desc"];
    $rid = $_POST["rid"];

    if(empty($issuename) && empty($desc)){
         $output .="Dont Leave Empty";    
    }else{
        $sql = "INSERT INTO issues (issueID,issueName,rid) VALUE(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(1,null);
        $stmt->bindvalue(2,$issuename);
        // $stmt->bindvalue(3,$desc);
        $stmt->bindvalue(3,$rid);
        if($stmt->execute()){
            $output .="<div class='alert alert-success'>
            <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Logged !!</b>
         </div>";
        }else{
            $output .="<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Not Logged!!</b>
         </div>";
        }
    }
}

if(isset($_POST["assignIssue"])){
    $issueID = $_POST["issueID"];
    $desc = $_POST["desc"];
    $userID = $_POST["userID"];

    if(empty($issueID) && empty($desc)){
         $output .="Dont Leave Empty";    

    }else{

        $ue  = $conn->prepare("SELECT*FROM users WHERE userID=?");
        $ue->bindvalue(1,$userID);
        $ue->execute();
        $p = $ue->fetch(PDO::FETCH_OBJ);

        $uex  = $conn->prepare("SELECT*FROM issues WHERE issueID=?");
        $uex->bindvalue(1,$issueID);
        $uex->execute();
        $px = $uex->fetch(PDO::FETCH_OBJ);



        $sql = "INSERT INTO assignedissues (assignedID,description,issueID,userID) VALUE(?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(1,null);
        $stmt->bindvalue(2,$desc);
        $stmt->bindvalue(3,$issueID);
        $stmt->bindvalue(4,$userID);
        if($stmt->execute()){
            $output .="<div class='alert alert-success'>
            <b>$px->issueName</b>
            <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Assigned to $p->firstName $p->lastName!!</b>
         </div>";
        }else{
            $output .="<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to Assign!!</b>
         </div>";
        }
    }
}

echo $output;