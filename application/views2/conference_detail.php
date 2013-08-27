<?php
//die(print_r($conference));
foreach($conference as $item => $content)
{
	echo '<span>'.$item.': </span>';
	if($item == 'user_id_array')
	{
		foreach($content as $user_id)
			echo $user_id.',';
	}
	else
		echo '<span>'.$content.'</span>';
	echo '<br>';
}
?>
<a class = 'btn btn-primary' href = <?php echo site_url('conference/sign_in/'.$conference['id'])?>>签到</a><br>
