
 <!DOCTYPE html>
<html>
<?php
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $u_name=$_POST['name'];
        $u_id=$_POST['email'];
        $u_pass=$_POST['password'];
        $u_addr=$_POST['adress'];
        $a_no=$_POST['aadhar_number'];
        $gen=$_POST['gender'];
        $mob=$_POST['mobile_number'];
       // $password=md5($u_pass);
       $reg="insert into user values('$u_name','$u_id','$u_pass','$u_addr','$a_no','$gen','$mob')";
        mysqli_select_db($con,"crime_portal");
        $res=mysqli_query($con,$reg);
        if(!$res)
        {
        $message1 = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            else
    {
        $message = "User Registered Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>
  
<script>
     function f1()
        {
            var sta=document.getElementById("name1").value;
            var sta1=document.getElementById("email1").value;
            var sta2=document.getElementById("pass").value;
            var sta3=document.getElementById("addr").value;
            var sta4=document.getElementById("aadh").value;
            var sta5=document.getElementById("mobno").value;
	   
  var x=sta.trim();
  var x1=sta1.indexOf(' ');
  var x2=sta2.indexOf(' ');
  var x3=sta3.trim();
  var x4=sta4.indexOf(' ');
	var x5=sta5.indexOf(' ');
	if(sta!="" && x==""){
		document.getElementById("name1").value="";
		document.getElementById("name1").focus();
		  alert("Space Not Allowed");
        }
        
         else if(sta1!="" && x1>=0){
    document.getElementById("email1").value="";
    document.getElementById("email1").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("pass").value="";
    document.getElementById("pass").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3==""){
    document.getElementById("addr").value="";
    document.getElementById("addr").focus();
      alert("Space Not Allowed");
        }
        else if(sta4!="" && x4>=0){
    document.getElementById("aadh").value="";
    document.getElementById("aadh").focus();
      alert("Space Not Allowed");
        }
        else if(sta5!="" && x5>=0){
    document.getElementById("mobno").value="";
    document.getElementById("mobno").focus();
      alert("Space Not Allowed");
        }
}
</script>    
    
<head>
<title>User Registration</title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<!-- <link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" /> -->

<!-- Icons font CSS-->
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
   
<link href="register.css" rel="stylesheet" type="text/css" smedia="all">

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Crime Diaries</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="registration.php">Registration</a></li>
       </ul>
    </div>
  </div>
</nav>
	

			<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Register</h2>
                    <form action="#" method="post">
                    <div class="one-field">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Full Name" name="name" required="" id="name1" onfocusout="f1()" />
                        </div>
                      </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="email" placeholder="Email-ID" name="email" required="" id="email1" onfocusout="f1()"/>
                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group-select">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="one-field">
                        <div class="input-group">
                               
                                 <input class="input--style-2" type="password" name="password" placeholder="Password" pattern=".{6,}" id="pass" onfocusout="f1()"/>
                                
      
                        </div> </div>

                        <div class="one-field">
                        <div class="input-group">
                           
                                    <input class="input--style-2" type="text" placeholder="Address" name="adress" required="" id="addr" onfocusout="f1()"/>
                              
                           
                        </div></div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Aadhar Number" name="aadhar_number" minlength="12" maxlength="12" required pattern="[123456789][0-9]{11}" id="aadh" onfocusout="f1()">
                                    
                                </div>
                            </div>
                           <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <input class="input--style-2" type="text" placeholder="Mobile Number" name="mobile_number" required pattern="[6789][0-9]{9}" minlength="10" maxlength="10" id="mobno" onfocusout="f1()"/>  
                                      
                                    
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" name="s">Submit</button>
                        </div>
                    </form>
               
            </div>
        </div>
    </div>

     <!-- Jquery JS-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    

 <script src="register.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
