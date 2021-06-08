/**
 * Created by MudimbaSoftware on 08/20/2018.
 */
$("document").ready(function () {

    $("#saveSchool").click(function (event) {
        event.preventDefault();
        var schname = $("#schname").val();
        //alert(schname);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{addSchool:1,schname:schname},
            success:function (data) {
                $("#SchoolMessage").html(data);
                fetchSchool();
                countSchools();
            }
        });
    });
  

    //deleteSchool
    $("body").delegate("#delSchool","click",function (event) {
       event.preventDefault();
       var deleteID = $(this).attr("deleteSchool");
       // alert(deleteID);

        $.ajax({
            url:"action.php",
            method:"POST",
            data:{deleteSchool:1,deleteID:deleteID},
            success:function (data) {
                $("#SchoolMessage").html(data);
                fetchSchool();
                countSchools();
            }
        });

    });

    //deleteSchool
    $("body").delegate("#saveEditSchool","click",function (event) {
       event.preventDefault();
       var editID = $(this).attr("editSchool");
       var schname = $("#schname-"+editID).val();
       // var s = getElementByName("Editschname");
      //alert(editID+" "+schname);

        $.ajax({
            url:"action.php",
            method:"POST",
            data:{editSchool:1,schname:schname,SchooleditID:editID},
            success:function (data) {
                $("#SchoolMessage").html(data);
                fetchSchool();

            }
        });

     });


    //send values
    $("#saveProgram").click(function (event) {
        event.preventDefault();
        var programName = $("#progName").val();
        var school = $("#schools").val();
        var shortName = $("#shortName").val();
        // alert(shortName);
       $.ajax({
           url:"action.php",
           method:"POST",
           data:{saveProgram:1,programName:programName,school:school,shortName:shortName},
           success:function (data) {
               $("#ProgMessage").html(data);
               fetchProgram();
               countSchools();

           }
       });
    });

    
    //delete Program
    $("body").delegate("#delProgram","click",function (event) {
        event.preventDefault();
        var deleteID = $(this).attr("deleteProgram");

        // alert(deleteID);

        $.ajax({
            url:"action.php",
            method:"POST",
            data:{deleteProgram:1,deletePID:deleteID},
            success:function(data) {
                $("#ProgMessage").html(data);
                fetchProgram();

            }
        });

    });


  

    //save Semester
    $("#saveSemester").click(function (event) {
        event.preventDefault();
        var semester = $("#semesterValue").val();
        // alert(semester);
        $.ajax({
            url:"action",
            method:"POST",
            data:{saveSemester:1,semester:semester},
            success:function (data) {
                $("#semesterMessage").html(data);
                fetchSemester();
            }
        });
    });



    //save Course
    $("#saveCourse").click(function (event) {
        event.preventDefault();
        var CourseName = $("#CourseName").val();
        var CourseCode = $("#CourseCode").val();
        var year = $("#year").val();
        var semester = $("#semesters").val();
        // alert(semester);
        $.ajax({
            url:"action",
            method:"POST",
            data:{saveCourse:1,courseName:CourseName,courseCode:CourseCode,year:year,semester:semester},
            success:function (data) {
                $("#CourseMessage").html(data);
                   fetchCourse();
                Countcourses();
            }
        });
    });




    //get Program
    $("body").delegate("#assignCourseID","click",function (event) {
        var programName =$(this).attr("programName");
        var prid =$(this).attr("prid");

        
       // var name =  prompt("Please enter your name");
       // alert(name);
        //confirm("Are you sure you want to assign courese");
        //alert(programName+ " is the program Selected and its ID is "+ prid);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{courseAssign:1,programName:programName,prid:prid},
            success:function (data) {
                $("#assgprog").html(data);

            }
        });
    });


    //bulk
    $("body").delegate("#saveCourses","click",function (event) {

        var CourseName = [];
        var cNane = $("#proName").val();
        var programName = $("#selectTerm").val();

        $(':checkbox:checked').each(function(i){
            CourseName[i] = $(this).val();

           // alert(programName[i]);
        });
        if(CourseName.length === 0) //tell you if the array is empty
        {
            alert("Please Select atleast one checkbox");
        } else {

            $.ajax({
                url: "action.php",
                method: "POST",
                data: {BulkcourseAssign:1,CourseName:CourseName,programName:programName,cNane:cNane},
                success: function (data) {
                    $("#fame").html(data);
                    // for(var i=0; i<programName.length; i++)
                    // {
                    //     $("#fame").html(programName[i]);
                    // }

                }
            });
        }
    });


    //saveAssign single Program Assign
    $("#saveAssign").click(function (event) {
        var ProgramName = $("#ProgramNameAssin").val();
        var programID= $("#programID").val();
        var CourseName = $("#courseNameAssign").val();
        // alert(CourseName +" "+ ProgramName );
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{saveAssignSingle:1,ProgramName:ProgramName,CourseName:CourseName,programID:programID},
            success:function (data) {
                $("#AssignMessage").html(data);

            }
        });

    });

    /**
     * Admin management section*/
    $("#createAccount").click(function (event) {
        event.preventDefault();
        const firstname = $("#fname").val();
        const lastname = $("#lname").val();
        const username = $("#username").val();
        const pword = $("#pword").val();
        const conpass = $("#conpass").val();
        const  email= $("#email").val();
        const  role = $("#role").val();
    //    alert(role)
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{saveAccount:1,firstname:firstname,lastname:lastname,username:username,
                pword:pword,conpass:conpass,email:email,role:role},
            success:function (data) {
                $("#adminMessage").html(data);
                // console.log(data);
            }
           
        });

    });
  

    //*
    // Search students**/
    //onkeyup="showstudent(this.value)

    //approve application
    $("body").delegate("#approve","click",function (event) {
        event.preventDefault();
    var studentID = $(this).attr("student_id");
    var StudentfieldID = $(this).attr("studentFID");
    var status = $(this).attr("status");
    var date_enroll = $(this).attr("date_enroll");
    var programName = $(this).attr("programName");
    var programCode = $(this).attr("programCode");

   // alert("Student ID-> "+studentID+" " + "\n Field ID-> "+StudentfieldID+" "+ "\nStatus->"+status + " \n"+ date_enroll)
    //student_id='$studentID' studentFID='$st_id'
    //     status='$status'  date_enroll='$doe'
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{approveApplication:1,studentID:studentID,StudentfieldID:StudentfieldID,status:status,
                date_enroll:date_enroll,programName:programName,programCode:programCode},
            success:function (data) {
                $("#StudentApprovedMessage").html(data);
                fetchStudent();
            }
        });
    });


    //Reject application
    $("body").delegate("#rejectLearner","click",function (event) {
        event.preventDefault();
    var rejectFID = $(this).attr("rejectFID");

    /* rejectLearner rejectFID rejectID*/

    // alert(rejectFID);
        if(confirm("Are you sure?")) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {rejectApplication: 1, rejectFID: rejectFID},
                success: function (data) {
                    $("#StudentApprovedMessage").html(data);
                    fetchStudent();
                }
            });
        }

    });


    /**
     * Danger zone Adminstrator at work
     * */
    $("#saverepo").click(function (event) {
        event.preventDefault();
        var reponame = $("#rname").val();
        var desc = $("#desc").val();
        var accesslevel= $("#role").val();

       // alert(nrc);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{saverepo:1,reponame:reponame,desc:desc,accesslevel:accesslevel},
            success:function (data) {
                $("#adminMessage").html(data);
            }
        });
    });

//create Account

    $("body").delegate("#createAccounts","click",function(event) {
       event.preventDefault();
        // internalID= '$st_id' nrc='$nrc' name='$fname $lname' email='$email' id='createAccounts'
        var internalID = $(this).attr("internalID");
        var nrc = $(this).attr("nrc");
        var name = $(this).attr("name");
        var email = $(this).attr("email");

        // alert(name);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{createAccountStudent:1,name:name,nrc:nrc,email:email,internalID:internalID},
            success:function (data) {
                $("#messageActivation").html(data);
            }
        });

    });

    ///user_id='$id' nrc='$snrc' name='$fname $lname' email='$email' id='createAccountAdmin'
    $("body").delegate("#createAccountAdmin","click",function(event) {
       event.preventDefault();
        // internalID= '$st_id' nrc='$nrc' name='$fname $lname' email='$email' id='createAccounts'
        var user_id = $(this).attr("user_id");
        var nrc = $(this).attr("nrc");
        var name = $(this).attr("name");
        var email = $(this).attr("email");
        var accessLevel = $(this).attr("accessLevel");
        var username = $(this).attr("username");

        // alert(name);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{createAccountAdmin:1,username:username,name:name,nrc:nrc,email:email,accessLevel:accessLevel,user_id:user_id},
            success:function (data) {
                $("#adminUser").html(data);
            }
        });
    });

    //message
    messages();
    function messages() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{message:1},
            success:function (data) {
                $("#message").html(data);
            }
        });
    }





    approvepaymenttudents();
function approvepaymenttudents() {
    //  id 	student_id 	semester_id 	paid 	paymentType 	paymentimg
    // 	BatchNumber 	Narration 	due 	balance 	date_updated
    $.ajax({
        url:"action.php",
        method:"POST",
        data:{approvepaymenttudents:1},
        success:function (data) {
            $("#approvepaymenttudents").html(data);
        }
    });
}


//approvePayment='$BatchNumber' id='approveP'
    $("Body").delegate("#approveP","click",function (event) {
       var approveID = $(this).attr("approvePayment");
       // alert(approveID + " Payment Approved!");
        if (confirm("Are you sure?")){
            // alert(approveID + " Payment Approved!");

            $.ajax({
                url:"action.php",
                method:"POST",
                data:{makeApprovePayment:1,approveID:approveID},
                success:function (data) {
                    $("#StudentApprovedPayment").html(data);
                }
            });

        }else{
            alert(approveID + " Payment Cancelled!");
        }

    });

    repositoryView();
    function repositoryView() {
    
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{repositoryView:1},
            success:function (data) {
                $("#repositoryView").html(data);
            }
        });
    }
    fetchAdmin();
    function fetchAdmin() {
    
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchAdmin:1},
            success:function (data) {
                $("#ManageAdmin").html(data);
            }
        });
    }

    assignTask();
    function assignTask() {
    
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{assignTask:1},
            success:function (data) {
                $("#assignTask").html(data);
            }
        });
    }

    // saveIssues
    $("#saveIssues").click(function(event){
        const issuename = $("#issuename").val();
        const status = $("#status").val();
        const rid = $("#rid").val();
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{saveIs:1,issuename:issuename,status:status,rid:rid},
            success:function(data){
                $("#msg").html(data);
            }
        });
    });


    // assignedissues
    $("#assignIssue").click(function(event){
        event.preventDefault();
        const issueID = $("#issueID").val();
        const desc = $("#desc").val();
        const userID = $("#userID").val();
        // alert(issueID);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{assignIssue:1,issueID:issueID,userID:userID,desc:desc},
            success:function(data){
                $("#msg2").html(data);
                // alert(data);
            }
        });
    });


    //End of Body
});