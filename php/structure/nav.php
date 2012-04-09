<?php
defined('CMSCONTENT') or die ('access denied');

	function navigation($id){
		if (!Login::isLoggedIn())return;
		
		
		
		$home="";
		$item="";
		$manage="";
		/*
		if($id=="home"){
			$home="class='selected';";
		}
		if($id=="manage"){
			$manage="class='selected';";
		}
		if($id=="item"){
			$item="class='selected';";
		}
		
		 * 
		 */
		echo '
		<nav id="mainNav" class="horizontalNav"><ul><li>
				<a href="home.html" '.$home.'>heute</a>
			</li><li>
				<a href="manage.html" '.$manage.'>manage</a>
			</li><li>
				<a href="item.html" '.$item.'>neu</a>
			</li></ul>
		</nav>
		';
	}
	

