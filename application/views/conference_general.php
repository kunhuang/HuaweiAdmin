<a class = 'btn btn-primary'href = <?php echo site_url('conference/add')?>>新建会议</a><br><br>
<?php

if($conference_array)
{
	echo '<table class = "table">';
	echo '<tr class = "info">';
	echo '<td>id</td>';
	echo '<td>时间</td>';
	echo '<td>地点</td>';
	echo '<td>标题</td>';
	echo '<td>流程</td>';
	//echo '<td>到会人</td>';
	echo '<td>会议纪录</td>';
	echo '<td></td>';
	echo '</tr>';

	foreach($conference_array as $conference)
	{
		echo '<tr>';
		foreach($conference as $item => $content)
		{
			if($item != 'user_ids')
			{
				echo '<td>';
				echo $content;
				echo '</td>';
			}
		}
		echo '<td>';
		echo '<a href = '.site_url('conference/index/'.$conference['id']).'>详情</a>';
		echo '</tr>';
	}
	echo '</table>';
}
else
{
	echo 'no conferece yet!<br>';
}

?>