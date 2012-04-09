
<div class="centerbox_outer">
	<div class="centerbox_inner">
		<h2>Manage Appointments</h2>
<?php
defined('CMSCONTENT') or die ('access denied');

if (isset($_POST['seen'])){
	$dba = new DBAppointment();
	foreach ($_POST['selectedItem'] as $key => $value) {
		$dba->setSeen($value);
	}
		
}else if (isset($_POST['delete'])){
	$dba = new DBAppointment();
	foreach ($_POST['selectedItem'] as $key => $value) {
		$dba->deleteAppointment($value);
	}
}
	


echo "<ul class='horizontalNav'>";
echo "<li><a class='lbtn " . (isset($_GET['ui_all']) ? 'mark' : '') . "' href='manage.html?filter&ui_all' />all</a></li>";
echo "<li><a class='lbtn " . (isset($_GET['ui_future']) ? 'mark' : '') . "' href='manage.html?future&unseen&seen&filter&ui_future' />future</a></li>";
echo "<li><a class='lbtn " . (isset($_GET['ui_past']) ? 'mark' : '') . "' href='manage.html?past&seen&unseen&filter&ui_past' />past</a></li>";
echo "<li><a class='lbtn " . (isset($_GET['ui_unseen']) ? 'mark' : '') . "' href='manage.html?past&unseen&filter&ui_unseen' />unseen</a></li>";
echo "</ul><br><br>";

if (isset($_GET['filter'])){
	
	$filter = new Filter(isset($_GET['future']), isset($_GET['past']), isset($_GET['seen']), isset($_GET['unseen']));


	$dba = new DBAppointment();
	$apps = $dba->getAppointmentFilter($filter);
	
	//?' . $_SERVER['QUERY_STRING'] . '
	echo '<form action="manage.html?' . $_SERVER['QUERY_STRING'] . '" method="post">';
	echo "<table>
	<tr>
		<th>Name</th> <th>Date</th> <th>Time</th> <th>Note</th>  <th>Seen</th> <th>select</th>
	</tr>";
	foreach ($apps as $key => $value) {
		echo "<tr>";
			echo "<td><a href='home.html?date=".$value->getDate()."&app=".$value->getId()."'>" . $value->getName() . "</td>";
			echo "<td>" . $value->getFormattedDate() . "</td>";
			echo "<td>" . $value->getFormattedTime() . "</td>";
			echo "<td>" . $value->getNote() . "</td>";
			$seen = $value->isSeen() ? "✔":"x";
			echo "<td>$seen</td>";
			echo "<td><input class='selbtn' type='checkbox' name='selectedItem[]' value='".$value->getId()."'/></td>";
		echo "</tr>";
		//echo "<tr><td class='notecell' colspan='4'>" . $value->getNote() . "</td></tr>"; 
	}
	echo "<tr><td></td> <td></td> <td></td> <td></td> <td></td> <td><button id='selall'>✔</button></td></tr></table>";
	echo '
	<br><br>
	
	<input  type="submit" name="seen" value="set seen" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input  type="submit" name="delete" value="delete" class="fright"/>
	<br><br>
	';

}
?>

	
	
</form>
</div></div>
