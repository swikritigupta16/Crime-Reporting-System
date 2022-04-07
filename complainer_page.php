<!DOCTYPE html>
<html>
 
<?php
session_start();
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    $u_id=$_SESSION['u_id'];
        
        $result=mysqli_query($conn,"SELECT a_no FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result);
        $a_no=$q2['a_no'];
    
        $result1=mysqli_query($conn,"SELECT u_name FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result1);
        $u_name=$q2['u_name'];
    
    
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
      
        $location=$_POST['location'];

        $type_crime = "type_crime";
        $type_crime1 = "type_crime1";

        if($_POST[$type_crime1]){
          $type_crime=$_POST['type_crime1'];

        }
        elseif($_POST[$type_crime]){
          $type_crime=$_POST['type_crime'];
        }

        else{
          
        }


        $d_o_c=$_POST['d_o_c'];
        $description=$_POST['description'];
        
        $var=strtotime(date("Ymd"))-strtotime($d_o_c);
   
        
    if($var>=0)
    {
          
      $comp="INSERT into complaint(a_no,location,type_crime,d_o_c,description) values('$a_no','$location','$type_crime','$d_o_c','$description')";
      mysqli_select_db($conn,"crime_portal"); 
      $res=mysqli_query($conn,$comp);
      
      if(!$res)
      {
        $message1 = "Complaint already filed";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Complaint Registered Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    else
    {
     $message = "Enter Valid Date";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}
?>
    
 <script>
     function f1()
        {
           var sta1=document.getElementById("desc").value;
           var x1=sta1.trim();
          if(sta1!="" && x1==""){
          document.getElementById("desc").value="";
          document.getElementById("desc").focus();
          alert("Space Found");
        }
}



function ShowHideDiv() {
        var crime = document.getElementById("crime");
        var dvcrime = document.getElementById("dvcrime");
        dvcrime.style.display = crime.value == "Other" ? "block" : "none";
    }
     




 </script>
   
<head>
	<title>Complainer Home Page</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body style=" background: #222D32;">
	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Home</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="userlogin.php">User Login</a></li>
        <li class="active"><a href="complainer_page.php">User Home</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="complainer_page.php">Log New Complain</a></li>
        <li><a href="complainer_complain_history.php">Complaint History</a></li>
        <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
    
    
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">
			<br><br>
			<div class="login-form"><p><h2 style="color:white">Welcome <?php echo "$u_name" ?></h2></p><br>
                                    <p style="color:#0DB8DE;"><h2>Log New Complain</h2></p><br>	
				<form action="#" method="post" style="color: gray">Aadhar
					<input type="text"  name="aadhar_number" placeholder="Aadhar Number" required="" disabled value=<?php echo "$a_no"; ?>>
					
          
          <div class="top-w3-agile" style="color: gray">Upload Aadhar Card/ Govt. Official ID 
          <br><br>
          <input type="file" style="top-padding:10px;" name="aadhar_pic" placeholder="" required=""> 
          </div>
          <br>

				<div class="top-w3-agile" style="color: gray">Location of Crime
        <input type="text"  name="location" placeholder="Enter State" required="">
				</div>

				<div class="top-w3-agile" style="color: gray" >Type of Crime
					<select class="form-control" name="type_crime" id="crime" onchange = "ShowHideDiv()" >

						            <option>Theft</option>
                        <option>Pick Pocket</option>
                        <option>Murder</option>
                        <option>Rape</option>
                        <option>Molestation</option>
                        <option>Kidnapping</option>
                        <option>Missing Person</option>
                        <option>Dowry</option>
                        <option>Domestic Violence</option>
                        <option>Assault</option>
                        <option value="Other">Other</option>
				    </select>
				
          </div>

        <div id="dvcrime" style="display: none">
                <hr>
                Specify Crime
                <input type="text" name="type_crime1"/>
               </div>  
  


        <div class="top-w3-agile" style="color: gray">Upload Proof (if any)
          <br><br>
          <input type="file" style="top-padding:10px;" name="proof"> 
          </div>
          <br>

					<div class="Top-w3-agile" style="color: gray">
					Date Of Crime : &nbsp &nbsp  
						<input style="background-color: #313131;color: white" type="date" name="d_o_c" required>
					</div>
					<br>
					<div class="top-w3-agile" style="color: gray">
					Description
						<textarea  name="description" rows="20" cols="50" placeholder="Describe the incident in details along with time and full address." onfocusout="f1()" id="desc" required></textarea>
					</div>
					<input type="submit" value="Submit" name="s" style="background: #0DB8DE;">
				</form>	
			</div>	
		</div>
	</div>	
</div>	

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>