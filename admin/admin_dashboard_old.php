<?php


include("admin_auth.php");
include("db.php"); //include auth.php file on all secure pages ?>
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

                                       <a class="w3-bar-item w3-button" href="admin_dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="admin_logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
             <?php include 'header.php';?>



     
<br/>
<br/>
<br/>
<br/>


<table>
<tr>


<td>

<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class=" w3-red w3-hover-blue">NO.OF ASSET </h3>
<?php 
$noofbook_query="Select * from asset_table ;";
$result = mysqli_query($con,$noofbook_query);
$nofbook_result_count=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result_count.'</h1></center>';
?>

</div>
</td>



<td>

<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class=" w3-red w3-hover-blue">NO.OF BRNCHES DONE</h3>
<?php 
$noofbook_query="SELECT  branch FROM ib where collection_status=1;";
$result=mysqli_query($con,$noofbook_query);
$nofbook_result=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result.'</h1></center>';
?>

</div>
</td>
<td>

</td>
</tr>
<tr>
<td>



</td>


<td>



</td>
<td>


</td>
</tr>
<tr>

<?php 
$sql_query="select * from asset_table order by branch_name";
?>
<br/>
<table  class="w3-table-all  " >

<tr><center><button class="w3-button w3-xxlarge w3-yellow w3-card-4" onclick="window.location.href ='export.php?sql=<?php echo $sql_query; ?>';">EXPORT ALL<?php echo '-'. $nofbook_result_count.'ASSET'; ?></button></center>
</tr>
</table>


<td colspan="3">




<div class="   w3-responsive" style=" height:400px;">






<thead>






<table  class="w3-table-all  " >


<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>
<th>BRANCH  NAME</th>
<th>BRANCH CODE</th>
<th>OPTIONS</th>

</tr>
<tr colspan="6"><h3  class="w3-red w3-hover-white">SUBMITED BRANCHES</h3></tr>

</thead>

<tbody>
<?php

$count=1;
$sel_query="SELECT * FROM ib where collection_status=1 ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr class="w3-hover-grey ">
<td align="center"><?php echo $count; ?></td>
<td align="center"><a href='branch__galary.php?branch_name=<?php echo $row["branch"]; ?>' ><?php echo $row["branch"]; ?></a></td>
<td align="center"><?php echo $row["ifsc"]; ?></td>
<td align="center"><a href='give_eng_access.php?branch_name=<?php echo $row["branch"]; ?>' >UNLOCK</a></td>

</tr>

<?php $count++; }?>
</tbody>
</table>

</div>


</td>
</tr>





<tr>
<td colspan="3">





</td>
</tr>




</table>


<br/>
<br/>


<?php include 'footer.php';?>

</div>
 </body>
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


</html>
