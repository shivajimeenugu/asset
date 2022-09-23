<?php
include("admin_auth.php");
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="table2excel.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $("#btnExport").click(function () {
            $("#maintbl").table2excel({
                filename: "Table.xls"
            });
        });
    });
</script>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome DASHBOARD</title>

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
<div class="w3-card-4 w3-padding-32  ">
<form  action="" method="POST" >

<input type="hidden" name="new" value="1" />



<input  class="w3-input w3-panel w3-border w3-responsive w3-card w3-pale-red w3-round-xxlarge" list="brow" name="bank_name" placeholder="ENTER BANK NAME">
<datalist id="brow">
  <?php
$query_bank='SELECT DISTINCT bank_name FROM bank';


$result = mysqli_query($con,$query_bank) or die(mysql_error($con));

while($row = mysqli_fetch_array($result))
	{ 
?>

<option value="<?php echo $row['bank_name'];?>"><?php echo $row['bank_name'];?></option>
	<?php } ?>
</datalist> 



<br/>

<select class="w3-input w3-panel w3-border w3-responsive w3-card w3-pale-red w3-round-xxlarge" name="dist_name">
  <?php
$query_bank='SELECT DISTINCT district FROM bank where state="ANDHRA PRADESH"';
$result = mysqli_query($con,$query_bank) or die(mysql_error($con));
while($row = mysqli_fetch_array($result))
{ 
?>
<option value="<?php echo $row['district'];?>"><?php echo $row['district'];?></option>
<?php } ?>
</select>




<center><input align="center"  type="submit" class="w3-btn  w3-center w3-blue" value="VIEW DETAILS" > </center>
</form>

<br/>
<br/>
<?php
 
if(isset($_REQUEST['bank_name']))
{
$bank_name=$_REQUEST['bank_name'];
$dist=$_REQUEST['dist_name'];



echo'
<input  type="button" id="btnExport" value="Export Data To Excel" /><br/>
<table id="maintbl" class="w3-table-all w3-responsive " >


<tr class="w3-hover-grey w3-red">
<th>S.NO</th>
<th>IFSC</th>
<th>BRANCH NAME</th>
<th>PC</th>
<th>CRP</th>
<th>DMP</th>
<th>HS DMP</th>
<th>PBP</th>
<th>SCANNER</th>
<th>LASER PRINTER</th>
</tr>


</thead>

<tbody>';


$count=1;
$sel_query="SELECT DISTINCT branch_name,ifsc FROM asset_table WHERE bank_name='$bank_name'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {

$flag_ifsc=$row["ifsc"];
$branch_name=$row["branch_name"];
$get_dist_q="SELECT * FROM bank WHERE ifsc='$flag_ifsc'";
$get_dist_res=mysqli_query($con,$get_dist_q);
$get_dist_row=mysqli_fetch_assoc($get_dist_res);

if($get_dist_row['district']==$dist)
{?>
<tr class="w3-hover-grey ">
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $flag_ifsc; ?></td>
<td align="center"><?php echo $branch_name; ?></td>

<td align="center"><?php 
$sel_pc_q="SELECT * FROM asset_table WHERE ifsc='$flag_ifsc' AND asset_type='CPU'";
$sel_pc_res=mysqli_query($con,$sel_pc_q);
$sel_pc_count=mysqli_num_rows($sel_pc_res);
echo $sel_pc_count;

 ?></td>

<td align="center"><?php 
$sel_pc_q="SELECT * FROM asset_table WHERE ifsc='$flag_ifsc' AND asset_type='RECIPT PRINTER'";
$sel_pc_res=mysqli_query($con,$sel_pc_q);
$sel_pc_count=mysqli_num_rows($sel_pc_res);
echo $sel_pc_count;

 ?></td>

<td align="center"><?php 
$sel_pc_q="SELECT * FROM asset_table WHERE ifsc='$flag_ifsc' AND asset_type='132 COL PRINTER'";
$sel_pc_res=mysqli_query($con,$sel_pc_q);
$sel_pc_count=mysqli_num_rows($sel_pc_res);
 

$sel_pc1_q="SELECT * FROM asset_table WHERE ifsc='$flag_ifsc' AND asset_type='80 COL PRINTER'";
$sel_pc1_res=mysqli_query($con,$sel_pc1_q);
$sel_pc1_count=mysqli_num_rows($sel_pc1_res);

$tc_count=$sel_pc1_count+$sel_pc_count;

echo $tc_count;



 ?></td>

 <td align="center"><?php 
$sel_pc_q="SELECT * FROM asset_table WHERE ifsc='$flag_ifsc' AND asset_type='LINE PRINTER'";
$sel_pc_res=mysqli_query($con,$sel_pc_q);
$sel_pc_count=mysqli_num_rows($sel_pc_res);
echo $sel_pc_count;

 ?></td>

<td align="center"><?php 
$sel_pc_q="SELECT * FROM asset_table WHERE ifsc='$flag_ifsc' AND asset_type='PASSBOOK'";
$sel_pc_res=mysqli_query($con,$sel_pc_q);
$sel_pc_count=mysqli_num_rows($sel_pc_res);
echo $sel_pc_count;

 ?></td>

<td align="center"><?php 
$sel_pc_q="SELECT * FROM asset_table WHERE ifsc='$flag_ifsc' AND asset_type='SCANNER'";
$sel_pc_res=mysqli_query($con,$sel_pc_q);
$sel_pc_count=mysqli_num_rows($sel_pc_res);
echo $sel_pc_count;

 ?></td>
<td align="center"><?php 
$sel_pc_q="SELECT * FROM asset_table WHERE ifsc='$flag_ifsc' AND asset_type='LASER PRINTER'";
$sel_pc_res=mysqli_query($con,$sel_pc_q);
$sel_pc_count=mysqli_num_rows($sel_pc_res);
echo $sel_pc_count;

 ?></td>

</tr>
<?php
 $count++;
}
 }
echo '</tbody>
</table>';





}

?>
</div>
<br/>
<?php include 'footer.php';?>


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
