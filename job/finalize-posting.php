<?php
error_reporting(0);
session_start();
include '../database/config.php';
$error="";
if(!$_SESSION["login_user"]){
header('location:../Home','_self');
}else {
  $user =$_SESSION["login_user"];
  $user_id=$_SESSION["job_id"];
}
if($_SERVER["REQUEST_METHOD"]=="POST"){


if(isset($_POST['submit'])){

    $error=array();

    $target_folder="../uploads/";
    $target_file= $target_folder . basename($_FILES["logo"]["name"]);
    $check =1;
    $imagetype = pathinfo($target_file,PATHINFO_EXTENSION);
    $checkupload = getimagesize($_FILES["logo"]["tmp_name"]);

if($checkupload ==false){
$error="Please upload a valid company logo";
}
    if (empty($image)==true) {
    $error="Please upload your company logo";
    $check=0;
  }
        if ($_FILES["logo"]["size"] > 200000) {
        $error= "Your file is too large.";
        $check = 0;
    }

    if($imagetype !="jpg" && $imagetype !="png" && $imagetype !="gif"){
      $error="Only jpg,png and gif images are allowed";
    }elseif (move_uploaded_file($_FILES["logo"]["tmp_name"],$target_file)) {
    }
    else {
    $error="There was an error when uploading file";
    }
  $id = $_SESSION['update_id'];
$query ="UPDATE job SET company_logo='$target_file' WHERE id='$id' ";
$result =mysqli_query($conn,$query);
if($result=true){

?>
<script>
setTimeout(function() {
$(".loader-bg").show(100);
},1000);
setTimeout(function() {
window.open('job-post-complete?complete=imadsgeds33283bewe9039nJJHSKLsj','_self');
},7000)
</script>
<?php
}else {
  echo "string";
}

}
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Company logo | Acejob.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="AceJob,Jobless,Jobseeker,jobresume,AceJob Jobseeker">
<meta http-equiv="X-UA-Compatible" content="IE-edge">


    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=brn05v6l7cdvvoxeaim585h5fe9dlaaz94f0qv05w3e81bp0"></script>
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" media="screen, projection" href="http://www.learningjquery.com/wp-content/themes/ljq/styles/ie.css" />
<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=brn05v6l7cdvvoxeaim585h5fe9dlaaz94f0qv05w3e81bp0"></script>
<![endif]-->
<!--[if lte IE 6]>
<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=brn05v6l7cdvvoxeaim585h5fe9dlaaz94f0qv05w3e81bp0"></script>
<script type="text/javascript">document.createElement('abbr');</script>
<![endif]-->
<!--[if lt IE 9]>
<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=brn05v6l7cdvvoxeaim585h5fe9dlaaz94f0qv05w3e81bp0"></script>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<style media="screen">

.create-container-content .progress-bar-process-6{
  margin-top: 50px;
  width:90%;
  height: 5px;
background-color: #F1892D;
border: none;
border-radius: 5px;
-webkit-box-shadow: 0px 0px 1px 0px rgba(0, 0, 0, 0.5);
-ms-box-shadow: 0px 0px 1px 0px rgba(0, 0, 0, 0.5);
-moz-box-shadow: 0px 0px 1px 0px rgba(0, 0, 0, 0.5);
-o-box-shadow: 0px 0px 1px 0px rgba(0, 0, 0, 0.5);
box-shadow: 0px 0px 1px 0px rgba(0, 0, 0, 0.5);

}

.loader-bg{
    display: none;
  position: absolute;
  width: 100%;
  height: 114.7%;
  background-color:  rgba(255,246,246,0.9);
z-index: 9999;
}

.loader {
  position: fixed;
  border: 5px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #C9BFBF;
  width: 50px;
  height: 50px;
  margin-left: 50%;
  margin-top: 20%;
  -webkit-animation: spin 1.3s linear infinite;
  animation: spin 1.3s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg);}
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg);}
  100% { transform: rotate(360deg);}
}

</style>

<script type="text/javascript">
$(document).ready(function(){
$("form").submit(function() {

//event.preventDefault();
});

});
</script>

</head>
<body >

  <div class="loader-bg" id="loader-bg">
    <div class="loader">
<p>Uploading image</p>
    </div>
  </div>

                   <div class="sign-in-bg" style="z-index:9999">
                     <p class="close-sign-in" style="cursor:pointer">X</p>

                     <div class="sign-in-bg-content">
               <form class="login" action="" method="post">
               <p>Email Address</p><input id="username" type="text" name="user" value="">
               <p>Password</p><input id="password" type="password" name="pass" value="">
               <br><p id="throw_error" style="color:#FC7474;font-size:12px;"></p>
                       <br><p id="forgot-pass">forgot password? <a href="#">click here</a></p>
               <p id="not-member">Not a member? <a href="#" id="signup-login">Create an Account</a></p>
               <input type="submit" name="login" value="Login" id="login">
               </form>

               <br><br><br><br><br>
               <p id="terms-p"><a href="#">Terms and Conditions</a></p>
               <p id="privacy-p"><a href="#">Privacy and Policy</a></p>
               <p id="about-p"><a href="about">About AceJob.com</a></p>
                     </div>

               <div class="sign-up" style="display:none">
                 <p id="post-p">Post jobs for thousands of unemployed people to get employed <br>
                    Post your resume and get employed by thousands of Company ing for employee's</p>
               <br><br><br><br>
               <a href="employersignup?acejobTHD=SsjS"><button type="button" name="signupemployer" class="signup-employer">Post A Job</button></a>
               <a href="#"><button type="button" name="signupjobseeker" class="signup-jobseeker">Post Resume</button></a>
               <p id="post-p1">Already have an account? &nbsp<a href="#" id="login-signup">Log In</a></p>

               <br><br><br><br><br><br><br>
               <p id="terms-p"><a href="#">Terms and Conditions</a></p>
               <p id="privacy-p"><a href="#">Privacy and Policy</a></p>
               <p id="about-p"><a href="../about">About AceJob.com</a></p>
               </div>

                       </div>



                       <nav id="navigation" class="navigation">
                         <a href="../Home" class="logoa"><img id="Logo" src="../img/acelog.png" alt="ACELOG.com" ></a>
                       <img src="../img/menu_30px.png" class="menulogo"  style="display:none" id="menu-open"/>
                       <img src="../img/delete.png" class="menulogo" id="menu-close"/>
                             <div  class="menu">
                             <ul id="menu-ul">
                               <li><a href="../acejobfind" target="_self">Find Job</a></li>
                               <li><a href="../jobresume">Find Job Seekers</a></li>
                               <li><a href="../about?hr=aboutacejob.com?get&amp&ampabpu">About &nbspACE<span id="jobspan">JOB</span>.com</a></li>
                               <li><a href="#" class="sign-in" id="sign-in-click">Sign In</a></li>
                             </ul>
                             </div>

                             <div id="search-web-web">
                               <label  for="search" id="label-img" hidden="hidden"><img src="../img/search.png" width="17px" id="search-img"></label>
                               <input id="search"  class="search-web" type="text" name="search" placeholder="Search AceJob.com"  />
                           </div>


                         <ul id="Menu">

                           <li><a href="../acejobfind" target="_self">Find Job</a></li>
                           <li><a href="../jobresume">Find Job Seekers</a></li>
                           <li><a href="../about?hr=aboutacejob.com?">About &nbspACE<span id="jobspan">JOB</span>.com</a></li>
                         </ul>
                         <ul id="signup">
                           <li><a href="#"><img src="../img/phone-call.png">Contact Us</a></li>
                             <li class="sign-in" id="sign-in" ><img src="../img/login.png"  id="sign-in-img"><p id="sign-in-p">Sign In</p></li>
                         </ul>
                       </nav>


<p id="post-job">Post a Job<a href="#" style="text-decoration:underline"><span style="margin-left:60%;font-size:12px;">Need help?</span></a></p>
<hr id="post-job-hr">

<form method="post" class="create-container-content" enctype="multipart/form-data" style="height:40%">
<p style="position:relative;top:45px;font-size:20px;">Upload Company logo</p>
<div class="progress-bar">
  <div class="progress-bar-process-6">
  </div>
</div>
  <input id="img" type="file" accept="image/*" name="logo" onchange="loadFile(event)" >
  <img id="output" width="150px" height="120px" style="margin-top:20px;"/>
  <script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
    };
  </script>

<br><p id="throw_error" style="color:#FC7474;font-size:12px;margin-left:300px"><?php echo $error;?></p>
<a href="confirmation"><p id="back" style="margin-top:-80px;width:30px;height:0px;">Back</p></a>
<input type="submit" name="submit" value="Complete" id="job-continue" style="margin-top:10px;">
  </form>


  <footer class="footer">
                <ul class="footer-ul-1" style="position:relative;top:30px;">
                  <li><a href="#">Disclaimer</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                </ul>

                <ul class="footer-ul-2" style="position:relative;top:30px;">
                  <li ><a href="#">About &nbspACE<span id="jobspan">JOB</span>.com</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Services </a></li>
                  <li><a href="#">Corporate Responsibilty</a></li>
                  <li><a href="#">FAQs</a></li>
                </ul>

              <p id="footer-p">&#169; Copyright  <a href="Home">AceJob.com</a>, ACJ. All rights reserved.</p>
            </footer>
            <script src="../acejob-js/job.js" charset="utf-8"></script>

        

</body>
