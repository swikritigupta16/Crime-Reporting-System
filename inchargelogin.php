<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


  <link href="inchargelogin.css" rel="stylesheet">

	<title>Incharge Login</title>
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
        $result=mysqli_query($conn,"SELECT i_id,i_pass FROM police_station where i_id='$name' and i_pass='$pass' ");
        
        $_SESSION['email']=$name;
        if(!$result || mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:incharge_complain_page.php");
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
      if(sta2!="" && x2>=0)
      {
        document.getElementById("exampleInputEmail1").value="";
        document.getElementById("exampleInputEmail1").focus();
        alert("Space Not Allowed");
      }
      else if(sta3!="" && x3>=0)
      {
        document.getElementById("exampleInputPassword1").value="";
        document.getElementById("exampleInputPassword1").focus();
        alert("Space Not Allowed");
      }

}
</script>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
    
    <div class="navbar-header">
      &nbsp; 
      <a class="navbar-brand" href="home.php"><b> &nbsp; &nbsp; &nbsp; Crime Diaries</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="official_login.php">Official Login</a></li>
        <li class="active"><a href="inchargelogin.php">Incharge Login</a></li>
        
      </ul>
    </div>
  
 </nav>



 <div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="post">
        <h2> <b> Incharge Panel  <b> </h2>
				<div class="login__field">
					<i class="login__icon fa fa-user"></i>
					<input type="text" class="login__input" placeholder="Username" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required onfocusout="f1()" >
				</div>
				<div class="login__field">
					<i class="login__icon fa fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password" name="password" id="exampleInputPassword1" required onfocusout="f1()" >
				</div>
				<button class="button login__submit" name="s">
					<span class="button__text">Log In </span>
					<i class="button__icon fa fa-chevron-right"></i>
				</button>				
			</form>
		</div>
    
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>


</body>
</html>