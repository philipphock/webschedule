<?php
defined('CMSCONTENT') or die ('access denied');
if (isset($_GET['logout'])){
	Login::logout();
}
if (!Login::isLoggedIn()){
	if (isset($_POST['pwsubmit'])){
		Login::userLogin($_POST['user'],$_POST['password']);	
	}
}

echo '<h1>Login</h1>';

if (!Login::isLoggedIn()){
	echo '
			<form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
			
			<input type="text" name="user" />
			<input type="password" name="password"/>
			<input type="submit" name="pwsubmit"  value="login"/>
			
			</form>
	
	';
}else{
	echo '<p>logged in<p>'; 
}
