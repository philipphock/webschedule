<?php
define('CMSCONTENT',true);
$style="default";
include "php/login/User.php"; 
include "php/login/Login.php";
include "php/schedule/etc/Config.php";
include "php/schedule/db/DB.php";
include "php/schedule/db/DBUser.php";
include "php/schedule/db/DBAppointment.php";

include "php/schedule/etc/DateUtil.php";
include "php/schedule/etc/UiUtil.php";


include "indexHelper.php";


?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">

  <title><?php echo $info->getTitle()?></title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="c_page" content="php/pages/<?php echo $id ?>">

  <link rel="stylesheet" href="css/before.css">
  <link rel="stylesheet" href="css/default/ui-darkness/jquery-ui-1.8.18.custom.css">
  <link rel="stylesheet" href="css/<?php echo $style;?>/style.css">
  <?php 
  	IndexProcessor::loadCSS($id);
  ?>
  <link rel="stylesheet" href="css/after.css">
  <script src="js/libs/modernizr-2.0.6.min.js"></script>

</head>

<body>
<header>
	<div id="headerContainer">
    	<!--<img id="pageBanner" src="img/<?php echo $style?>/banner.png" alt="pageBanner" />-->
    	<?php include "php/structure/head.php";?>
		<?php navigation($id);?>
	</div>
</header>
    
  <div id="container" >
    <div id="main" role="main">
    	<div id="content">
		<?php 
			IndexProcessor::loadContent($id);
		?>
		</div>
    </div>
  </div> <!--! end of #container -->
<footer>
	<div id="footerContainer">
		<?php include "php/structure/foot.php";?>
	</div>
</footer>



  <script defer src="js/libs/jquery.js"></script>
  <script defer src="js/libs/jquery-ui-1.8.18.custom.min.js"></script>
  <script defer src="js/libs/jqueryui-datepicker.de.js"></script>
  <script defer src="js/DateModel.js"></script>
  <?php 
  	IndexProcessor::loadJS($id);
  ?>

</body>
</html>
