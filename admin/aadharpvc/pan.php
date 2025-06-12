<?php include('config.php'); error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Pan Card Priview</title>
<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
<link href="aadhar.css" type="text/css" rel="stylesheet">
<?php
if(isset($_GET['searchid'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($ahk_conn,$_GET['searchid']);

mysqli_set_charset($ahk_conn,"utf8");
$a = mysqli_query($ahk_conn,"SELECT * FROM panauto Where id='".$searchid."'");
$b = mysqli_fetch_array($a);

}
?>
<?php 
  $sid = $_GET['searchid'];
  $get = mysqli_fetch_assoc(mysqli_query($ahk_conn,"select * from panauto where id=".$sid.""));
  
  ?>
<?php
if($get['userid'] == 2) 
{
	?>
	<style type="text/css">
.bg {
    background: url('pandemo.jpg') no-repeat;
    width: 800px;
    height: 986px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
	<?php 
}
else 
{
?>
<style type="text/css">
.bg {
    background: url('2pana.jpg') no-repeat;
    width: 800px;
    height: 986px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<?php } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
 
    <main class="bg">
    
   
     
<?php 

   /// qr code xml string start
  /* libxml_use_internal_errors(true);
   $simplexml= new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><books/>');
   $book1= $simplexml->addChild('book',"<PrintLetterBarcodeData uid=&quot;".$b['panno']."&quot; name=&quot;".$b['name']."&quot; dob=&quot;".$b['dob']."&quot; co=&quot;".$b['fathername']."&quot;/>");
   $str='<?xml version="1.0" encoding="UTF-8"?>'.$book1;
   $codeContents = $str; 
  // echo $codeContents;
  // echo $book1;*/
?>

  
<style>
img.mrmins.mrninbigs {
    
    top: 59px;
    position: absolute;
    left: 247px;

}

.cimg 
{
	 top: 85px;
    position: absolute;
    left: 27px;
}
.mainno
{
    top: 105px;
    position: absolute;
    left: 142px;
    font-weight: 800;
    font-size: 11px;
}

.name 
{
	    top: 155px;
    position: absolute;
    left: 32px;
    font-weight: 800;
    font-size: 9px;
}

.fathername 
{
	top: 185px;
    position: absolute;
    left: 32px;
    font-weight: 800;
    font-size: 9px;
}
.bod 
{
	    top: 220px;
    position: absolute;
    left: 31px;
    font-weight: 800;
    font-size: 9px;
}

.sign 
{
	top: 205px;
    position: absolute;
    left: 148px;
}
</style>

<!------------------------------ # connection ------------------------------->
						<?php
												error_reporting(0);
												include("config.php");

												
												$sqla="select * from setting";
												$updt = mysqli_query($ahk_conn,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>
												
						<!------------------------------ # connection ------------------------------->


</p>


    <!-- <img class="mrmins mrninbigs" src='https://chart.googleapis.com/chart?chs=110x110&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00' > -->
	 
	
	 <?php 
	 
	  if (strpos($b['image'], 'https://www.tribal.mp.gov.in/') !== false) {
		 ?>
		 <img class="cimg" src="../admin/<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else if(strpos($b['image'],'data:image') !== false) {?>
	 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else { ?>
     <img class="cimg" src="<?php echo  $slct['weburl'].'/admin/'.$b['image'];?>" width="60px" height="60px"/>
	 <?php } ?>
	 <p class="mainno"><B><?php echo $b['panno'];?></B></p>
     <p class="name"><?php echo strtoupper($b['name']);?></p>
	 <p class="fathername"><?php echo strtoupper($b['fathername']);?></p>
	 <p class="bod"><?php echo $b['dob'];?></p>
	 <img class="sign" src="<?php echo $slct['weburl'].'/admin/'.$b['signimage'];?>" width="65px" height="25px"/>
  </main>
  </body>
</html>