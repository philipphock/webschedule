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

echo '<br><br><br><div class="centerbox_outer"><div class="centerbox_inner"><h1>Login</h1>';

if (!Login::isLoggedIn()){
	echo '
			<form action="home.html" method="POST">
			<p>
				<label for="user">Username</label>
				<input type="text" name="user" />
			</p>
			<p>
			<label for="password">Password</label>
			<input type="password" name="password"/>
			</p>
			<input type="submit" name="pwsubmit"  value="login"/>
			</form>
	';
}else{
	echo '<p>successful</p>
	<script>window.location.href=window.location.href</script>
	';
	 
}
echo "</div></div><br><br>";