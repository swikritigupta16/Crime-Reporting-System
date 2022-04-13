<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<title>Police Login</title>


  <style>


html {
    height: 100%;
}
body {
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

/* Text Align */
.text-c {
    text-align: center;
}
.text-l {
    text-align: left;
}
.text-r {
    text-align: right
}
.text-j {
    text-align: justify;
}

/* Text Color */
.text-whitesmoke {
    color: whitesmoke
}
.text-darkyellow {
    color: rgba(255, 235, 59, 0.432)
}

/* Lines */

.line-b {
    border-bottom: 1px solid #FFEB3B !important;
}

/* Buttons */
.button {
    border-radius: 3px;
}
.form-button {
    background-color: rgba(255, 235, 59, 0.24);
    border-color: rgba(255, 235, 59, 0.24);
    color: #e6e6e6;
}
.form-button:hover,
.form-button:focus,
.form-button:active,
.form-button.active,
.form-button:active:focus,
.form-button:active:hover,
.form-button.active:hover,
.form-button.active:focus {
    background-color: rgba(255, 235, 59, 0.473);
    border-color: rgba(255, 235, 59, 0.473);
    color: #e6e6e6;
}
.button-l {
    width: 100% !important;
}

/* Margins g(global) - l(left) - r(right) - t(top) - b(bottom) */

.margin-g {
    margin: 15px;
}
.margin-g-sm {
    margin: 10px;
}
.margin-g-md {
    margin: 20px;
}
.margin-g-lg {
    margin: 30px;
}

.margin-l {
    margin-left: 15px;
}
.margin-l-sm {
    margin-left: 10px;
}
.margin-l-md {
    margin-left: 20px;
}
.margin-l-lg {
    margin-left: 30px;
}

.margin-r {
    margin-right: 15px;
}
.margin-r-sm {
    margin-right: 10px;
}
.margin-r-md {
    margin-right: 20px;
}
.margin-r-lg {
    margin-right: 30px;
}

.margin-t {
    margin-top: 15px;
}
.margin-t-sm {
    margin-top: 10px;
}
.margin-t-md {
    margin-top: 20px;
}
.margin-t-lg {
    margin-top: 30px;
}

.margin-b {
    margin-bottom: 15px;
}
.margin-b-sm {
    margin-bottom: 10px;
}
.margin-b-md {
    margin-bottom: 20px;
}
.margin-b-lg {
    margin-bottom: 30px;
}

/* Bootstrap Form Control Extension */

.form-control,
.border-line {
    background-color: #5f5f5f;
    background-image: none;
    border: 1px solid #424242;
    border-radius: 1px;
    color: inherit;
    display: block;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
}
.form-control:focus,
.border-line:focus {
    border-color: #FFEB3B;
    background-color: #616161;
    color: #e6e6e6;
}
.form-control,
.form-control:focus {
    box-shadow: none;
}
.form-control::-webkit-input-placeholder { color: #BDBDBD; }

/* Container */

.container-content {
    background-color: #3a3a3aa2;
    color: inherit;
    padding: 15px 20px 20px 20px;
    border-color: #FFEB3B;
    border-image: none;
    border-style: solid solid none;
    border-width: 1px 0;
}

/* Backgrounds */

.main-bg {

    background: #424242;
    background: linear-gradient( #424242, #212121);
}

/* Login & Register Pages*/

.login-container {
    max-width: 400px;
    z-index: 100;
    margin: 0 auto;
    padding-top: 100px;
}
.login.login-container {
    width: 300px;
}
.wrapper.login-container {
    margin-top: 140px;
}
.logo-badge {
    color: #e6e6e6;
    font-size: 80px;
    font-weight: 800;
    letter-spacing: -10px;
    margin-bottom: 0;
}


</style>











  <?php

if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $result=mysqli_query($conn,"SELECT p_id,p_pass FROM police where p_id='$name' and p_pass='$pass' ");
        $_SESSION['pol']=$name;       
        if(!$result || mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:police_pending_complain.php");
        }
    }                
}
?> 
    
    <script>
     function f1()
        {
          
        var sta2=document.getElementById("exampleInputEmail1").value;
        var sta3=document.getElementById("exampleInputPassword1").value;
        var x2=sta2.indexOf(' ');
        var x3=sta3.indexOf(' ');
if(sta2!="" && x2>=0){
    document.getElementById("exampleInputEmail1").value="";
    document.getElementById("exampleInputEmail1").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("exampleInputPassword1").value="";
    document.getElementById("exampleInputPassword1").focus();
      alert("Space Not Allowed");
        }

}
</script>
    
    
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="home.php"><b>Crime Diaries</b></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
           <li><a href="official_login.php">Official Login</a></li>
           <li class="active"><a href="policelogin.php">Police Login</a></li>
        </ul>
    </div>
  </div>
 </nav>




 <body class="main-bg">
        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><i class="fa fa-user-circle-o"></i></h1>
                </div>
                    <h3 class="text-whitesmoke">Police Panel</h3>

                <div class="container-content">
                    <form class="margin-t" method="post">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Police ID" required="" id="exampleInputEmail1" aria-describedby="emailHelp"  onfocusout="f1()">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" id="exampleInputPassword1" onfocusout="f1()" >
                        </div>
                        <button type="submit" class="form-button button-l margin-b" name="s">Sign In</button>
                    </form>
                    
                </div>
            </div>
</body>











 



 <!--
 <div  align="center" >
	<div class="form" style="margin-top: 15%">
		<form method="post">
  <div class="form-group" style="width: 30%">
    <label for="exampleInputEmail1"  ><h1 style="color:white">Police Id</h1></label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" size="5" placeholder="Enter user id" required onfocusout="f1()">
     </div>
  <div class="form-group" style="width:30%">
    <label for="exampleInputPassword1"><h1 style="color:white">Password</h1></label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required onfocusout="f1()">
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="s">Submit</button>
</form>
	</div>
</div>

-->






</body>
</html>