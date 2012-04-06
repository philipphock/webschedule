<?php 
include "php/login/Login.php";

include "indexHelper.php";
PathHelper::setAppRoot("cms");
$style="default";
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
  <link rel="stylesheet" href="css/<?php echo $style;?>/style.css">
  <?php 
  	IndexProcessor::loadCSS($id);
  ?>
  <link rel="stylesheet" href="css/after.css">
  <script src="js/libs/modernizr-2.0.6.min.js"></script>

</head>

<body>

  <div id="container" >
    <header>
    	<img id="pageBanner" src="img/<?php echo $style?>/banner.png" alt="pageBanner" />
    	
		<?php navigation($id);?>
    </header>
    <div id="main" role="main">
    	<div id="content">
		<?php 
			IndexProcessor::loadContent($id);
		?>
		</div>
    </div>
    <footer>
		<?php include "php/structure/foot.php";?>
    </footer>
  </div> <!--! end of #container -->



  <script defer src="js/jquery.js"></script>

  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <?php 
  	IndexProcessor::loadJS($id);
  ?>

</body>
</html>
