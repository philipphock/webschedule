<?php
defined('CMSCONTENT') or die ('access denied');
class UiUtil{
	public static function success($msg,$redirect,$redirectAfter=false){
		UiUtil::msg($msg,$redirect,"success",$redirectAfter);
	}
	public static function error($msg,$redirect,$redirectAfter=false){
		UiUtil::msg($msg,$redirect,"error",$redirectAfter);
	}
	
	protected static function msg($msg,$redirect,$class,$redirectAfter=false){
		echo "<div class=\"centerbox_outer\">
				<div class=\"centerbox_inner\">
		<p class='$class'>$msg</p>";
		if($redirectAfter){
			echo "
			<script>
				setTimeout(function(){
					window.location.href = '$redirect';					
				},$redirectAfter*1000);
				
			</script>";	
		}else{
			echo "<button onClick=\"window.location.href='$redirect'\">weiter</button></div></div>"; 
		}	
		
	}
}
