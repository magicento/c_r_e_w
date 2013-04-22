<?php
$uid = $_GET['uid'];

echo getAvatardir($uid);

function getAvatardir($uid){
	$ftid = str_pad($uid,9,"0",STR_PAD_LEFT);
	return './customavatars/'.$ftid[0].$ftid[1].$ftid[2].'/'.$ftid[3].$ftid[4].'/'.$ftid[5].$ftid[6].'/'.$ftid[7].$ftid[8].'_avatar_middle.jpg';
}
?>