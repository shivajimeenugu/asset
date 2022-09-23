
<?php
if(!isset($_SESSION["ifsc"])){
	
	echo'
<style>

.w3-theme {color:#fff !important;background-color:#3f51b5 !important}
.w3-theme-light {color:#000 !important;background-color:#e8eaf6 !important}
.w3-theme-dark {color:#fff !important;background-color:#1a237e !important}

.w3-theme-l5 {color:#000 !important;background-color:#e8eaf6 !important}
.w3-theme-l4 {color:#000 !important;background-color:#c5cae9 !important}
.w3-theme-l3 {color:#000 !important;background-color:#9fa8da !important}
.w3-theme-l2 {color:#fff !important;background-color:#7986cb !important}
.w3-theme-l1 {color:#fff !important;background-color:#5c6bc0 !important}
.w3-theme-d1 {color:#fff !important;background-color:#3949ab !important}
.w3-theme-d2 {color:#fff !important;background-color:#303f9f !important}
.w3-theme-d3 {color:#fff !important;background-color:#283593 !important}
.w3-theme-d4 {color:#fff !important;background-color:#1a237e !important}

.w3-theme-action {color:#fff !important;background-color:#311b92 !important}
.w3-text-theme {color:#1a237e !important}

</style>
 <div class="w3-container w3-border-theme-d4 w3-card " ">

   <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>

        <center><img src="logo.png"  class="logo" alt="LOGO GOSE HEAR" ></img></center>
        <!--<center><h2 >RAPIDTECH IT SERVICES PVT LTD. </h2></center>
        <center><h3>ASSET MANAGEMENT SYSTEM</h3></center>-->
      <div  class="w3-panel w3-xlarge w3-theme "></div>

</div>
<div class="se-pre-con"></div>


'

;
}
else{
echo'
  <style>

.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(Preloader_2.gif) center no-repeat #fff;
}
</style>
<script src="jquery.min.js"></script>
<script src="modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

<style>
<style>

.w3-theme {color:#fff !important;background-color:#3f51b5 !important}
.w3-theme-light {color:#000 !important;background-color:#e8eaf6 !important}
.w3-theme-dark {color:#fff !important;background-color:#1a237e !important}

.w3-theme-l5 {color:#000 !important;background-color:#e8eaf6 !important}
.w3-theme-l4 {color:#000 !important;background-color:#c5cae9 !important}
.w3-theme-l3 {color:#000 !important;background-color:#9fa8da !important}
.w3-theme-l2 {color:#fff !important;background-color:#7986cb !important}
.w3-theme-l1 {color:#fff !important;background-color:#5c6bc0 !important}
.w3-theme-d1 {color:#fff !important;background-color:#3949ab !important}
.w3-theme-d2 {color:#fff !important;background-color:#303f9f !important}
.w3-theme-d3 {color:#fff !important;background-color:#283593 !important}
.w3-theme-d4 {color:#fff !important;background-color:#1a237e !important}

.w3-theme-action {color:#fff !important;background-color:#311b92 !important}
.w3-text-theme {color:#1a237e !important}

</style>
 <div class="w3-container w3-border-theme-d4 w3-card " ">

   <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>

        <center><img src="logo.png"  class="logo" alt="LOGO GOSE HEAR" ></img></center>
        <!--<center><h2 >RAPIDTECH IT SERVICES PVT LTD. </h2></center>
        <center><h3>ASSET MANAGEMENT SYSTEM</h3></center>-->
      <div  class="w3-panel w3-xlarge w3-theme "></div>

</div>
<div style="width:100%;" class="w3-indigo"><center>LOGIN AS-->'.$_SESSION["ifsc"].'-'. $_SESSION["branch_name"].'</center></div>
<div class="se-pre-con"></div>

'

;}
?>