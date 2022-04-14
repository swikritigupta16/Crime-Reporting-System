<!DOCTYPE html>
<html>
<head>
    
    <?php
    session_start();
    $conn=mysqli_connect('localhost','root','','crime_portal');
    if(!isset($_SESSION['x']))
        header("location:inchargelogin.php");
    
    
    if(!$conn)
    {
        die('could not connect'.mysqli_error());
    }
    mysqli_select_db($conn,'crime_portal');
    
    $i_id=$_SESSION['email'];

    $result1=mysqli_query($conn,"SELECT location FROM police_station where i_id='$i_id'");
      
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];



    if(isset($_POST['s3']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {

          
            $pid=$_POST['p_id'];

            
           
            $p_name=$_POST['p_name'];
            $p_sp=$_POST['p_sp'];
            $p_loc=$_POST['p_loc'];
          
           
            if($_POST['p_name']){
              
              $q4=mysqli_query($conn,"update police set p_name='$p_name' where p_id='$pid'");
              echo "<script type='text/javascript'>alert('Police Name Updated!!');</script>";
            }

            elseif($_POST['p_sp']){
              
              $q4=mysqli_query($conn,"update police set spec='$p_sp' where p_id='$pid'");
              echo "<script type='text/javascript'>alert('Speciality Updated!!');</script>";
            }

            elseif($_POST['p_loc']){
              
              $q4=mysqli_query($conn,"update police set location='$p_loc' where p_id='$pid'");
              echo "<script type='text/javascript'>alert('Location Updated!!');</script>";
            }
    
            else{
              
            } 

        }
      }  

    
     if(isset($_POST['s2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $pid=$_POST['pid'];
            
            $q1=mysqli_query($conn,"delete from police where p_id='$pid'");
            $q3=mysqli_query($conn,"update complaint set pol_status='null',inc_status='Unassigned',p_id='Null' where p_id='$pid'");
        }
    }
    
    
    $result=mysqli_query($conn,"select p_id,p_name,spec,location from police where location='$location'");  
    
   
    ?>
	<title>Incharge View Police</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
    <script>
     function f1()
        {
          
            var sta2=document.getElementById("ciid").value;
            var x2=sta2.indexOf(' ');
            if(sta2!="" && x2>=0){
            document.getElementById("ciid").value="";
            alert("Blank Field not Allowed");
        }
        
       }



       function ShowHideDiv() {
        var edit = document.getElementById("edit");

        var i = document.getElementById("i");
        var n = document.getElementById("n");
        var sp = document.getElementById("sp");
        var l = document.getElementById("l");

        i.style.display = edit.value == "ID" ? "block" : "none";
        n.style.display = edit.value == "Name" ? "block" : "none";
        sp.style.display = edit.value == "Sp" ? "block" : "none";
        l.style.display = edit.value == "Loc" ? "block" : "none";
    }



    </script>
</head>
<body style="background-color: rgb(0, 0, 77);">
	<nav  class="navbar navbar-default navbar-fixed-top">
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
        <li><a href="official_login.php">Official Login</a></li>
        <li><a href="inchargelogin.php">Incharge Login</a></li>
        <li class="active"><a href="incharge_view_police.php">Incharge Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Incharge_complain_page.php">View Complaints</a></li>
        <li class="active" ><a href="incharge_view_police.php">Police Officers</a></li>
        <li><a href="inc_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
 <div  style="margin-top: 10%;margin-left: 45%">
   <a href="police_add.php"><input style="background: #d1e0e0; color:black;" type="button" name="add" value="Add Police" class="btn btn-primary"></a>
 </div>
    
    <div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Police Id</th>
        <th scope="col">Police Name</th>
        <th scope="col">Specialist</th>
        <th scope="col">Location</th>
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['p_id']; ?></td>
        <td><?php echo $rows['p_name']; ?></td>     
        <td><?php echo $rows['spec']; ?></td>          
        <td><?php echo $rows['location']; ?></td>          
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>
    
    <form style="margin-top: 5%; margin-left: 40%;" method="post">


    <input type="text" name="p_id" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Police Id" id="ciid" onfocusout="f1()" >
    <br> <br>
    <select class="form-control" name="edit" id="edit" onchange = "ShowHideDiv()" style="width:250px;">

                        <option>Choose to Edit</option>
						            
                        <option value="Name">Police Name</option>
                        <option value="Sp">Specialist</option>
                        <option value="Loc">Location</option>
                  
				    </select>
				
          </div>

        <div id="i" style="display: none">
                <hr>
                <h4 style="color:white;">Police ID </h4>
                <input type="text" />
               </div>  

        <div id="n" style="display: none">
                <hr>
                <h4 style="color:white;">Police Name </h4>
                <input type="text" name="p_name"/>
               </div>  

        <div id="sp" style="display: none;">
                <hr>
                <h4 style="color:white;">Specialist </h4>
                <input type="text" name="p_sp"/>
               </div>  

        <div id="l" style="display: none">
                <hr>
                <h4 style="color:white;">Location </h4>
                <input type="text" name="p_loc"/>
               </div>  
       

        <div>
      <input class="btn btn-warning" type="submit" value="Update Police" name="s3" style="margin-top: 10px; margin-left: 9%;">
        </div>

      <br> <br>



      <input type="text" name="pid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Police Id" id="ciid" onfocusout="f1()" >
        <div>
      <input class="btn btn-danger" type="submit" value="Delete Police" name="s2" style="margin-top: 10px; margin-left: 9%;">
        </div>
    </form>
    
    


 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>