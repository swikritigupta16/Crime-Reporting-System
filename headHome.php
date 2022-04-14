<!DOCTYPE html>
<html>
<head>
    
<?php
session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    if(isset($_POST['s1']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cid=$_POST['cid'];
        $_SESSION['cid']=$cid;
        header("location:head_case_details.php");
    }
    }
    
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $loc=$_POST['loc'];
        $_SESSION['loc']=$loc;
        header("location:headHome1.php");
    }
    }
    

    $query="select c_id,a_no,location,type_crime,d_o_c,description,inc_status,pol_status, p_id
            from complaint order by c_id";
    $result=mysqli_query($conn,$query);  
        
?>

	<title>HQ Homepage</title>
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
          alert("Blank Field Not Allowed");
        }
        
       
}
    
    
    
    </script>
</head>
<body style="background:#4d2600;">
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
        <li ><a href="official_login.php">Official Login</a></li>
        <li ><a href="headlogin.php">HQ Login</a></li>
        <li class="active"><a href="headHome.php">HQ Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active" ><a href="headHome.php">View Complaints</a></li>
        <li ><a href="head_view_police_station.php">Incharge</a></li>
        <li><a href="h_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

 <div>
    <form style="margin-top: 10%; margin-left: 40%;" method="post">
      <input type="text" name="cid" style="width: 250px; height: 30px;" placeholder="&nbsp Complaint Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-primary" type="submit" value="Search" name="s1" style="margin-top: 10px; margin-left: 11%; border:black; border-width:2px; border-style:solid;">
     </div>
     </form>
        
     <form style="margin-top: 3%; margin-left: 40%;" method="post">
     <select name="loc" class="form-control" style="width: 250px;">
         
						<?php
                        $loc=mysqli_query($conn,"select DISTINCT location from complaint");
                        while($row=mysqli_fetch_array($loc))
                        {
                            ?>
                                	<option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>
     </select>
        
          <input class="btn btn-primary" type="submit" value="Search" name="s2" style="margin-top: 10px; margin-left: 11%; border:black; border-width:2px; border-style:solid;">
    </form>


    <div style="padding:50px;">
      <table class="table table-bordered">
       <thead class="thead-dark" style="background-color: black; color: white;">
         <tr>
          <th scope="col">Complaint Id</th>
          <th scope="col">Aadhar No.</th>
          <th scope="col">Location</th>
          <th scope="col">Type of Crime</th>
          <th scope="col">Date of Crime</th>
          <th scope="col">Description</th>
          <th scope="col">Incharge Status</th>
          <th scope="col">Case Status</th>
          <th scope="col">Police Id</th>
        </tr>
      </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['a_no']; ?></td>     
        <td><?php echo $rows['location']; ?></td>          
        <td><?php echo $rows['type_crime']; ?></td>  
        <td><?php echo $rows['d_o_c']; ?></td>
        <td><?php echo $rows['description']; ?></td>     
        <td><?php echo $rows['inc_status']; ?></td>          
        <td><?php echo $rows['pol_status']; ?></td>
        <td><?php echo $rows['p_id']; ?></td>          
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
      </table>
    </div>






 </div>
    

    

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>