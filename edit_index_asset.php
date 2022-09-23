<?php include("auth.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_SESSION["branch_name"].'- EDIT AASET-'.date("Ymd") ; ?></title>

</head>
<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
<?php include 'header.php';?>


<br/>
     



<?php
include 'db.php';

$query='';
$count=1;
//$con = mysqli_connect("localhost", "root", "", "lib");
$output = '';
	$branch_name=$_SESSION["branch_name"];
	$ifsc= $_SESSION["ifsc"];
	//echo $branch_name.'<------';
	//$search = mysqli_real_escape_string($con, $_POST["key"]);
	
	
	
	$query = "select * from asset_table where cat='CPU' AND ifsc='$ifsc'";


$result = mysqli_query( $con, $query);
if(mysqli_num_rows($result) > 0)
{
	echo '<br/>
	
	<center><div class="w3-panel w3-blue w3-card-4"><b><h3 style="color:black;">'.$_SESSION['bank_name'].','. $_SESSION['branch_name'].'<h3></b></div></center>
	
	<CENTER>
	<table class="w3-table-all  w3-responsive  ">
						<tr><th colspan="11"><center>DESKTOPS</center></th></tr>
						<tr class="w3-hover-grey w3-red">
						
<th>SI.NO</th>							
<th>DATE</th>
							
<th>ASSET TYPE</th>
<th >CATAGERY</th>
<th >MANIFARTURER</th>
<th >SERIAL NO YEAR</th>
<th >MODEL</th>
<th >CONDITION</th>
<th >CONFIGRATION</th>
<th >MAC</th>
<th >IP</th>
<th >REMARKS</th>
<th colspan="2">OPTIONS</th>

				</tr>';
while($row = mysqli_fetch_array($result))
	{
		//echo'?>
			<tr class="w3-hover-grey ">
			
	
	
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["date"]; ?></td>
<td align="center"><?php echo $row["asset_type"]; ?></td>
<td align="center"><?php echo $row["cat"]; ?></td>

<td align="center"><?php echo $row["mf"]; ?></td>
<td align="center"><?php echo $row["sno"]; ?></td>
<td align="center"><?php echo $row["model"]; ?></td>
<td align="center"><?php echo $row["cond"]; ?></td>
<td align="center"><?php echo $row["pro"].'/'.$row["hdd"].'/'.$row["ram"].'/'.$row["os"].'/' ?></td>
<td align="center"><?php echo $row["mac"]; ?></td>
<td align="center"><?php echo $row["ip"]; ?></td>
<td align="center"><?php echo $row["remarks"]; ?></td>
<td><button onclick="window.location.href ='delete.php?id=<?php echo $row["id"]; ?>';"> DEELTE </button><br></td>
<td><button onclick="window.location.href ='edit_asset.php?id=<?php echo $row["id"]; ?>';"> EDIT </button><br></td>

		</tr>
		<?php
		$count++;
		//';
	}
	
}
else
{
	echo '<h1 class="w3-panel w3-green w3-round">NO DESKTOP DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>

</table></CENTER>




<!--//////////////////////////////////////////////////////////////////////////-->

<?php

$query2 = "select * from asset_table where cat='PRINTER' AND branch_name='$branch_name'";

$count2=1;
$result2 = mysqli_query( $con, $query2);
if(mysqli_num_rows($result2) > 0)
{
	echo '<br/>
	
	
	<CENTER>
	<table class="w3-table-all  w3-responsive  ">
						<tr><th colspan="11"><center>PRINTERS</center></th></tr>
						<tr class="w3-hover-grey w3-red">
						
<th>SI.NO</th>							
<th>DATE</th>
							
<th>ASSET TYPE</th>
<th >CATAGERY</th>
<th >MANIFARTURER</th>
<th >SERIAL NO YEAR</th>
<th >MODEL</th>
<th >CONDITION</th>
<th >REMARKS</th>
<th colspan="2">OPTIONS</th>

				</tr>';
while($row2 = mysqli_fetch_array($result2))
	{
		//echo'?>
			<tr class="w3-hover-grey ">
			
	
	
<td align="center"><?php echo $count2; ?></td>
<td align="center"><?php echo $row2["date"]; ?></td>
<td align="center"><?php echo $row2["asset_type"]; ?></td>
<td align="center"><?php echo $row2["cat"]; ?></td>

<td align="center"><?php echo $row2["mf"]; ?></td>
<td align="center"><?php echo $row2["sno"]; ?></td>
<td align="center"><?php echo $row2["model"]; ?></td>
<td align="center"><?php echo $row2["cond"]; ?></td>


<td align="center"><?php echo $row2["remarks"]; ?></td>
<td><button onclick="window.location.href ='delete.php?id=<?php echo $row2["id"]; ?>';"> DEELTE </button><br></td>
<td><button onclick="window.location.href ='edit_asset.php?id=<?php echo $row2["id"]; ?>';"> EDIT </button><br></td>

		</tr>
		<?php
		$count2++;
		//';
	}
	
}
else
{
	echo '<h1 class="w3-panel w3-green w3-round">NO PRINTERS DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>

</table></CENTER>


<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php

$query3 = "select * from asset_table where cat='MONITER' AND branch_name='$branch_name'";

$count3=1;
$result3 = mysqli_query( $con, $query3);
if(mysqli_num_rows($result3) > 0)
{
	echo '<br/>
	
	
	<CENTER>
	<table class="w3-table-all  w3-responsive  ">
						<tr><th colspan="11"><center>MONITER</center></th></tr>
						<tr class="w3-hover-grey w3-red">
						
<th>SI.NO</th>							
<th>DATE</th>
							
<th>ASSET TYPE</th>
<th >CATAGERY</th>
<th >MANIFARTURER</th>
<th >SERIAL NO YEAR</th>
<th >MODEL</th>
<th >CONDITION</th>
<th >REMARKS</th>
<th colspan="2">OPTIONS</th>

				</tr>';
while($row3 = mysqli_fetch_array($result3))
	{
		//echo'?>
			<tr class="w3-hover-grey ">
			
	
	
<td align="center"><?php echo $count3; ?></td>
<td align="center"><?php echo $row3["date"]; ?></td>
<td align="center"><?php echo $row3["asset_type"]; ?></td>
<td align="center"><?php echo $row3["cat"]; ?></td>

<td align="center"><?php echo $row3["mf"]; ?></td>
<td align="center"><?php echo $row3["sno"]; ?></td>
<td align="center"><?php echo $row3["model"]; ?></td>
<td align="center"><?php echo $row3["cond"]; ?></td>


<td align="center"><?php echo $row3["remarks"]; ?></td>
<td><button onclick="window.location.href ='delete.php?id=<?php echo $row3["id"]; ?>';"> DEELTE </button><br></td>
<td><button onclick="window.location.href ='edit_asset.php?id=<?php echo $row3["id"]; ?>';"> EDIT </button><br></td>

	
		</tr>
		<?php
		$count3++;
		//';
	}
	
}
else
{
	echo '<h1 class="w3-panel w3-green w3-round">NO MONITER DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>

</table></CENTER>


<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php

$query4 = "select * from asset_table where cat='SERVER' AND branch_name='$branch_name'";

$count4=1;
$result4= mysqli_query( $con, $query4);
if(mysqli_num_rows($result4) > 0)
{
	echo '<br/>
	
	<center><div class="w3-panel w3-blue w3-card-4"><b><h3 style="color:black;">INDIAN BANK '.$branch_name.'<h3></b></div></center>
	
	<CENTER>
	<table class="w3-table-all  w3-responsive  ">
						<tr><th colspan="11"><center>SERVER</center></th></tr>
						<tr class="w3-hover-grey w3-red">
						
<th>SI.NO</th>							
<th>DATE</th>
							
<th>ASSET TYPE</th>
<th >CATAGERY</th>
<th >MANIFARTURER</th>
<th >SERIAL NO YEAR</th>
<th >MODEL</th>
<th >CONDITION</th>
<th >CONFIGRATION</th>
<th >IP</th>
<th >MAC</th>
<th >REMARKS</th>
<th colspan="2">OPTIONS</th>

				</tr>';
while($row4 = mysqli_fetch_array($result4))
	{
		//echo'?>
			<tr class="w3-hover-grey ">
			
	
	
<td align="center"><?php echo $count4; ?></td>
<td align="center"><?php echo $row4["date"]; ?></td>
<td align="center"><?php echo $row4["asset_type"]; ?></td>
<td align="center"><?php echo $row4["cat"]; ?></td>

<td align="center"><?php echo $row4["mf"]; ?></td>
<td align="center"><?php echo $row4["sno"]; ?></td>
<td align="center"><?php echo $row4["model"]; ?></td>
<td align="center"><?php echo $row4["cond"]; ?></td>
<td align="center"><?php echo $row4["pro"].'/'.$row4["hdd"].'/'.$row4["ram"].'/'.$row4["os"].'/' ?></td>
<td align="center"><?php echo $row4["ip"]; ?></td>
<td align="center"><?php echo $row4["mac"]; ?></td>
<td align="center"><?php echo $row4["remarks"]; ?></td>
<td><button onclick="window.location.href ='delete.php?id=<?php echo $row4["id"]; ?>';"> DEELTE </button><br></td>
<td><button onclick="window.location.href ='edit_asset.php?id=<?php echo $row4["id"]; ?>';"> EDIT </button><br></td>

		</tr>
		<?php
		$count4++;
		//';
	}
	
}
else
{
	echo '<h1 class="w3-panel w3-green w3-round">NO SERVER DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>

</table></CENTER>


<!--//////////////////////////////////////////////////////////////////////////-->

<?php

$query5 = "select * from asset_table where cat='SCANNER' AND branch_name='$branch_name'";

$count5=1;
$result5 = mysqli_query( $con, $query5);
if(mysqli_num_rows($result5) > 0)
{
	echo '<br/>
	
	
	<CENTER>
	<table class="w3-table-all  w3-responsive  ">
						<tr><th colspan="11"><center>PRINTERS</center></th></tr>
						<tr class="w3-hover-grey w3-red">
						
<th>SI.NO</th>							
<th>DATE</th>
							
<th>ASSET TYPE</th>
<th >CATAGERY</th>
<th >MANIFARTURER</th>
<th >SERIAL NO YEAR</th>
<th >MODEL</th>
<th >CONDITION</th>
<th >REMARKS</th>
<th colspan="2">OPTIONS</th>

				</tr>';
while($row5 = mysqli_fetch_array($result5))
	{
		//echo'?>
			<tr class="w3-hover-grey ">
			
	
	
<td align="center"><?php echo $count5; ?></td>
<td align="center"><?php echo $row5["date"]; ?></td>
<td align="center"><?php echo $row5["asset_type"]; ?></td>
<td align="center"><?php echo $row5["cat"]; ?></td>

<td align="center"><?php echo $row5["mf"]; ?></td>
<td align="center"><?php echo $row5["sno"]; ?></td>
<td align="center"><?php echo $row5["model"]; ?></td>
<td align="center"><?php echo $row5["cond"]; ?></td>


<td align="center"><?php echo $row5["remarks"]; ?></td>
<td><button onclick="window.location.href ='delete.php?id=<?php echo $row5["id"]; ?>';"> DEELTE </button><br></td>
<td><button onclick="window.location.href ='edit_asset.php?id=<?php echo $row5["id"]; ?>';"> EDIT </button><br></td>

		</tr>
		<?php
		$count5++;
		//';
	}
	
}
else
{
	echo '<h1 class="w3-panel w3-green w3-round">NO PRINTERS DATA FOUND FROM '.$branch_name.' ' .'BRANCH</h1>';
}


?>

</table></CENTER>

<!--//////////////////////////////////////////////////////////////////////////-->

<?php

$query6 = "select * from asset_table where cat='OTHERS' AND branch_name='$branch_name'";

$count6=1;
$result6 = mysqli_query( $con, $query6);
if(mysqli_num_rows($result6) > 0)
{
	echo '<br/>
	
	
	<CENTER>
	<table class="w3-table-all  w3-responsive  ">
						<tr><th colspan="11"><center>PRINTERS</center></th></tr>
						<tr class="w3-hover-grey w3-red">
						
<th>SI.NO</th>							
<th>DATE</th>
							
<th>ASSET TYPE</th>
<th >CATAGERY</th>
<th >MANIFARTURER</th>
<th >SERIAL NO YEAR</th>
<th >MODEL</th>
<th >CONDITION</th>
<th >REMARKS</th>
<th colspan="2">OPTIONS</th>

				</tr>';
while($row6 = mysqli_fetch_array($result6))
	{
		//echo'?>
			<tr class="w3-hover-grey ">
			
	
	
<td align="center"><?php echo $count6; ?></td>
<td align="center"><?php echo $row6["date"]; ?></td>
<td align="center"><?php echo $row6["asset_type"]; ?></td>
<td align="center"><?php echo $row6["cat"]; ?></td>

<td align="center"><?php echo $row6["mf"]; ?></td>
<td align="center"><?php echo $row6["sno"]; ?></td>
<td align="center"><?php echo $row6["model"]; ?></td>
<td align="center"><?php echo $row6["cond"]; ?></td>


<td align="center"><?php echo $row6["remarks"]; ?></td>
<td><button onclick="window.location.href ='delete.php?id=<?php echo $row6["id"]; ?>';"> DEELTE </button><br></td>
<td><button onclick="window.location.href ='edit_asset.php?id=<?php echo $row6["id"]; ?>';"> EDIT </button><br></td>

		</tr>
		<?php
		$count6++;
		//';
	}
	
}
else
{
	echo '<h1 class="w3-panel w3-green w3-round">NO OTHERS </h1>';
}


?>

</table></CENTER>

<br/>
<center><button  class="w3-button w3-red w3-xxlarge"onclick="window.open('print_asset_auto.php?branch_name=<?php echo $_SESSION["branch_name"]; ?>&ifsc=<?php echo $_SESSION["ifsc"]; ?>&bank_name=<?php echo $_SESSION["bank_name"]; ?>','popUpWindow','height=500,width=400,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">PRINT ASSET</button></center>








<?php include 'footer.php';?>
	   
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
