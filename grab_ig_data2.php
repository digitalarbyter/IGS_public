<?php
$username = 'digitalarbyter';
$ig_data = file_get_contents('http://instagram.com/'.$username);
$data = explode('window._sharedData = ', $ig_data);
$data_json = explode(';</script>', $data[1]);
$data_array = json_decode($data_json[0], TRUE);
$followers=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_followed_by']['count'];
$followed_by=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_follow']['count'];
echo $followers." / ".$followed_by;
?>
