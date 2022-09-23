<?php include("auth.php"); ?>
<!DOCTYPE html>
<html>
<head>
<style>
@page {
  /*margin: 2mm*/
}

@media screen {
  div.divFooterms {
    display: none;
  }
}
@media print {
  div.divFooterms {
    position: fixed;
    bottom: 0;
  }
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_SESSION["ifsc"].'-AASET-'.date("Ymd") ; ?></title>

</head>
<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
<?php //include 'header.php';?>
<div class="w3-container w3-border-theme-d4  " ">

   <button id="openNav" class="w3-button  w3-xlarge" onclick="w3_open()"></button>

        <center><img src="logo.png"  class="logo" alt="LOGO GOSE HEAR" ></img></center>
        <!--<center><h2 >RAPIDTECH IT SERVICES PVT LTD. </h2></center>
        <center><h3>ASSET MANAGEMENT SYSTEM</h3></center>-->
      <div  class="w3-panel w3-xlarge w3-theme "></div>

</div>

<br/>
     



<?php
include 'db.php';

$query='';
$count=1;
//$con = mysqli_connect("localhost", "root", "", "lib");
$output = '';
	$bank_name=$_REQUEST["bank_name"];
	$branch_name= $_REQUEST["branch_name"];
	$ifsc=$_REQUEST['ifsc'];
	//echo $branch_name.'<------';
	//$search = mysqli_real_escape_string($con, $_POST["key"]);
	

	
$query_bank_date="select date from asset_table where  ifsc='$ifsc' ";
$result_date = mysqli_query($con,$query_bank_date) or die(mysqli_error($con));
$row_date = mysqli_fetch_array($result_date);
$branch_date=$row_date['date'];
	
	
	
	
	
	
	
	
	$query = "select * from asset_table where cat='CPU' AND ifsc='$ifsc'";
echo'<center><table style="border-collapse: collapse; border: 1px solid black;" class="w3-table-all" class="w3-table w3-bordered w3-responsive">
<tr>

<th>BRANCH NAME</th>
<th>IFSC</th>
<th>DATE COLLECTED</th>

</tr>
<tr>
<td style="border: 1px solid black;"><div ><b><h4 style="color:black;">'.$bank_name.' , '.$branch_name.'<h4></b></div></td>
	<td style="border: 1px solid black;"><div ><b><h4 style="color:black;">'.$ifsc.'<h4></b></div></td>
	<td style="border: 1px solid black;"><div ><b><h4 style="color:black;">'.$branch_date.'<h4></b></div></td>
	
<tr>	
	

</table></center>';
echo '
	


<br/>
	<table style="border-collapse: collapse; border: 1px solid black;" class="w3-table-all">
						<thead>
					<tr class="w3-indigo">
							
<th>SI.NO</th>							
<th>ASSET TYPE</th>
<th >SERIAL NO</th>							
<th >INVOICE VALUE</th>


<th >DATE OF PURCHASE</th>

<th >MANIFARTURER</th>
				</tr>
				
				</thead>
				<tbody>
				
				
				
				
				';
$result = mysqli_query( $con, $query);
$row_count=mysqli_num_rows($result);
if(mysqli_num_rows($result) > 0)
	{
	
$row_span_flag=1;		
		
while($row = mysqli_fetch_array($result))
	{
		echo'
			<tr class="w3-hover-grey ">';
			if($row_span_flag==1)
			{
				//echo '';
				$row_span_flag++;
			}
			
			?>
			
<td style="border: 1px solid black;" align="center"><?php echo $count; ?></td>	
<td  style="border: 1px solid black;" class="w3-red"><center>CPU</center></td>	


<td  style="border: 1px solid black;" align="center"><?php echo $row["sno"]; ?></td>

<td  style="border: 1px solid black;" align="center"> </td>
<td  style="border: 1px solid black;" align="center"><?php echo $row["dop"]; ?></td>
<td style="border: 1px solid black;"  align="center"><?php echo $row["mf"]; ?></td>

		</tr>
		<?php
		$count++;
		
	}
	
}
else
{
	
	//echo '<h1 class="">NO DESKTOP DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
	
}


?>










<!--//////////////////////////////////////////////////////////////////////////-->

<?php

$query2 = "select * from asset_table where asset_type='80 COL PRINTER' AND ifsc='$ifsc'";

$count2=1;
$result2 = mysqli_query( $con, $query2);
$row_count=mysqli_num_rows($result2);
if(mysqli_num_rows($result2) > 0)
{
	echo '<br/>
	
	
					';
$row_span_flag=1;				
while($row2 = mysqli_fetch_array($result2))
	{
		echo'
			<tr class="w3-hover-grey ">';
			if($row_span_flag==1)
			{
				//echo '<td rowspan="'.$row_count.'" style="border: 1px solid black;"  class="w3-green"><center>PRINTERS</center></td>';
				$row_span_flag++;
			}
			
			?>
			
	
	
<td style="border: 1px solid black;" align="center"><?php echo $count; ?></td>	
<td  style="border: 1px solid black;" class="w3-blue"><center>180 COL </center></td>	
<td  style="border: 1px solid black;" align="center"><?php echo $row2["sno"]; ?></td>
<td  style="border: 1px solid black;" align="center"> </td>
<td  style="border: 1px solid black;" align="center"><?php echo $row2["dop"]; ?></td>
<td style="border: 1px solid black;"  align="center"><?php echo $row2["mf"]; ?></td>
		</tr>
		<?php
		$count++;
		//';
	}
	
}
else
{
	//echo '<h1 >NO PRINTERS DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php

$query3 = "select * from asset_table where asset_type='132 COL PRINTER' AND ifsc='$ifsc'";

$count3=1;
$result3 = mysqli_query( $con, $query3);
$row_count=mysqli_num_rows($result3);
if(mysqli_num_rows($result3) > 0)
{
	//echo '<br/>
	
	
	$row_span_flag=1;				
while($row3 = mysqli_fetch_array($result3))
	{
		echo'
			<tr class="w3-hover-grey ">';
			if($row_span_flag==1)
			{
				//echo '<td rowspan="'.$row_count.'"  style="border: 1px solid black;" class="w3-yellow"><center>MONITERS</center></td>';
				$row_span_flag++;
			}
			
			?>
			
	
	
<td style="border: 1px solid black;" align="center"><?php echo $count; ?></td>	
<td  style="border: 1px solid black;" class="w3-green"><center>132 COL </center></td>	
<td  style="border: 1px solid black;" align="center"><?php echo $row3["sno"]; ?></td>
<td  style="border: 1px solid black;" align="center"> </td>
<td  style="border: 1px solid black;" align="center"><?php echo $row3["dop"]; ?></td>
<td style="border: 1px solid black;"  align="center"><?php echo $row3["mf"]; ?></td>
		</tr>
		<?php
		$count++;
		//';
	}
	
}
else
{
	//echo '<h1>NO MONITER DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>




<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->




<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php

$query31 = "select * from asset_table where asset_type='PASSBOOK' AND ifsc='$ifsc'";

$count31=1;
$result31 = mysqli_query( $con, $query31);
$row_count=mysqli_num_rows($result31);
if(mysqli_num_rows($result31) > 0)
{
	//echo '<br/>
	
	
	$row_span_flag=1;				
while($row31 = mysqli_fetch_array($result31))
	{
		echo'
			<tr class="w3-hover-grey ">';
			if($row_span_flag==1)
			{
				//echo '<td rowspan="'.$row_count.'"  style="border: 1px solid black;" class="w3-yellow"><center>MONITERS</center></td>';
				$row_span_flag++;
			}
			
			?>
			
	
	
<td style="border: 1px solid black;" align="center"><?php echo $count; ?></td>	
<td  style="border: 1px solid black;" class="w3-aqua"><center>PASSBOOK</center></td>	
<td  style="border: 1px solid black;" align="center"><?php echo $row31["sno"]; ?></td>
<td  style="border: 1px solid black;" align="center"> </td>
<td  style="border: 1px solid black;" align="center"><?php echo $row31["dop"]; ?></td>
<td style="border: 1px solid black;"  align="center"><?php echo $row31["mf"]; ?></td>
		</tr>
		<?php
		$count++;
		//';
	}
	
}
else
{
	//echo '<h1>NO MONITER DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>




<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php

$query33 = "select * from asset_table where asset_type='SCANNER' AND ifsc='$ifsc'";

$count33=1;
$result33 = mysqli_query( $con, $query33);
$row_count=mysqli_num_rows($result33);
if(mysqli_num_rows($result33) > 0)
{
	//echo '<br/>
	
	
	$row_span_flag=1;				
while($row33 = mysqli_fetch_array($result33))
	{
		echo'
			<tr class="w3-hover-grey ">';
			if($row_span_flag==1)
			{
				//echo '<td rowspan="'.$row_count.'"  style="border: 1px solid black;" class="w3-yellow"><center>MONITERS</center></td>';
				$row_span_flag++;
			}
			
			?>
			
	
	
<td style="border: 1px solid black;" align="center"><?php echo $count; ?></td>	
<td  style="border: 1px solid black;" class="w3-orange"><center>PASSBOOK</center></td>	
<td  style="border: 1px solid black;" align="center"><?php echo $row33["sno"]; ?></td>
<td  style="border: 1px solid black;" align="center"> </td>
<td  style="border: 1px solid black;" align="center"><?php echo $row33["dop"]; ?></td>
<td style="border: 1px solid black;"  align="center"><?php echo $row33["mf"]; ?></td>
		</tr>
		<?php
		$count++;
		//';
	}
	
}
else
{
	//echo '<h1>NO MONITER DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>




<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->



<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php

$query32 = "select * from asset_table where asset_type='LASER PRINTER' AND ifsc='$ifsc'";

$count32=1;
$result32 = mysqli_query( $con, $query32);
$row_count=mysqli_num_rows($result32);
if(mysqli_num_rows($result32) > 0)
{
	//echo '<br/>
	
	
	$row_span_flag=1;				
while($row32 = mysqli_fetch_array($result32))
	{
		echo'
			<tr class="w3-hover-grey ">';
			if($row_span_flag==1)
			{
				//echo '<td rowspan="'.$row_count.'"  style="border: 1px solid black;" class="w3-yellow"><center>MONITERS</center></td>';
				$row_span_flag++;
			}
			
			?>
			
	
	
<td style="border: 1px solid black;" align="center"><?php echo $count; ?></td>	
<td  style="border: 1px solid black;" class="w3-sand"><center>LASER PRINTER</center></td>	
<td  style="border: 1px solid black;" align="center"><?php echo $row32["sno"]; ?></td>
<td  style="border: 1px solid black;" align="center"> </td>
<td  style="border: 1px solid black;" align="center"><?php echo $row32["dop"]; ?></td>
<td style="border: 1px solid black;"  align="center"><?php echo $row32["mf"]; ?></td>
		</tr>
		<?php
		$count++;
		//';
	}
	
}
else
{
	//echo '<h1>NO MONITER DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>



</tbody>
</table>
<br/><br/>
<br/><br/>
<br/>























<table>
<tr>
<td><h4 align="left">ENGINEER SIGNATURE</h4></td>


<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td><td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td><td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> <td></td> 
<td></td> 

<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>  
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td></td>
<td><h4 align="right">CUSTOMER SIGNATURE</h4></td>
</tr>
</table>
<!--<center><button onclick="window.print()" class="w3-button w3-red">PRINT ASSET</button></center>-->
<br/>

<!--<div class="divFooterms">
<img src="FOOTER.jpg"></img>
</div>-->
<script>window.print();</script>





<?php //include 'footer.php';?>
	   
	   </div>
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
