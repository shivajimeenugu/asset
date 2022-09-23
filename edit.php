<?php
include('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from bookdb where id='".$id."'";
$result = mysqli_query($con,$query) or die(mysql_error($con));
$row= mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome Home</title>

</head>
<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
             <div class="w3-container w3-blue">

   <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>

        <center><img src="logo.png"  class="logo" alt="LOGO GOSE HEAR" ></img></center>
        <center><h2>Dr.YC JAMES YEN GOVT POLYTECHNIC,KUPPAM </h2></center>
        <center><h3>LIBRARY MANAGEMENT SYSTEM</h3></center>
        

</div>


<br/>

     

<div class="w3-container" >







<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];

$no=$_REQUEST['no'];
$name=$_REQUEST['name'];
$author=$_REQUEST['author'];
$bookcategory=$_REQUEST['bookcategory'];
$publisher=$_REQUEST['publisher'];
$pyear=$_REQUEST['pyear'];
$edition=$_REQUEST['edition'];
$pages=$_REQUEST['pages'];
$price=$_REQUEST['price'];
$rack=$_REQUEST['rack'];

$update="update bookdb set no='".$no."',name='".$name."',author='".$author."',bookcategory='".$bookcategory."',publisher='".$publisher."',pyear='".$pyear."',edition='".$edition."',pages='".$pages."',price='".$price."',rack='".$rack."',status='1',pin='0' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Record Updated Successfully. </br></br><a href='book_view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div class="w3-card w3-padding-16">
<center><form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />


<input name="id" type="hidden" value="<?php echo $row['id'];?>" />

<p><input type="text" name="no" placeholder="Enter ACC NO" required value="<?php echo $row['no'];?>"/></p>					
<p><input  type="text" name="name"  placeholder="Enter Name" required value="<?php echo $row['name'];?>" /><p>
<p><input  type="text" name="author"  placeholder="Enter Author" required value="<?php echo $row['author'];?>" /><p>
<p><input  type="text" name="bookcategory"  placeholder="Enter Author" required value="<?php echo $row['bookcategory'];?>" /><p>
<p><input  type="text" name="publisher"  placeholder="Enter Author" required value="<?php echo $row['publisher'];?>" /><p>
<p><input  type="text" name="pyear"  placeholder="Enter Author" required value="<?php echo $row['pyear'];?>" /><p>
<p><input  type="text" name="edition"  placeholder="Enter Author" required value="<?php echo $row['edition'];?>" /><p>
<p><input  type="text" name="pages"  placeholder="Enter Author" required value="<?php echo $row['pages'];?>" /><p>
<p><input  type="text" name="price"  placeholder="Enter Author" required value="<?php echo $row['price'];?>" /><p>
<p><input  type="text" name="rack"  placeholder="Enter Author" required value="<?php echo $row['rack'];?>" /><p>




<p><input name="submit" type="submit" value="Update" /></p>
</form></center></div>
<?php } ?>

<br /><br /><br /><br />







<div class="w3-container w3-blue">
<p>COPYRIGHT©SHIVAJI MEENUGU</p>
       </div></div>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</div>
 </body>



</html>
