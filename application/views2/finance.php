<?php
echo "<a class = 'btn btn-primary' href = ".site_url('app/finance_add').">报账！</a>";
echo "<br><br>";
if($finance)
{
	echo '<table class = "table">';
	echo '<tr class = "info">';
	echo '<td>id</td>';
	echo '<td>报帐人id</td>';
	echo '<td>报账人姓名</td>';
	echo '<td>报账时间</td>';
	echo '<td>花费</td>';
	echo '<td>用途</td>';
	echo '</tr>';

	foreach($finance as $row)
	{
		echo '<tr>';
		echo '<td>'.$row->id.'&nbsp;</td>';
		echo '<td>'.$row->submit_user_id.'&nbsp;</td>';
		echo '<td>'.$row->submit_name.'&nbsp;</td>';
		echo '<td>'.date('y-m-d',$row->submit_time).'&nbsp;</td>';
		echo '<td>'.$row->expense.'&nbsp;</td>';
		echo '<td>'.$row->use.'&nbsp;</td>';
		echo '</tr>';
	}
	echo '</table>';
}
echo '<br>';
?>