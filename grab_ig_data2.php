<?php
$username = 'digitalarbyter';
$url="http://instagram.com/".$username;
$ig_data = @file_get_contents($url);

if($ig_data === false)
{
  echo "Error with Instagram profile!";
} else {
  $data = explode('window._sharedData = ', $ig_data);
  $data_json = explode(';</script>', $data[1]);
  $data_array = json_decode($data_json[0], TRUE);
  $followers=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_followed_by']['count'];
  $followed_by=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_follow']['count'];
  $biography=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['biography'];
  $uploads=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['count'];
  $profile_pic=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['profile_pic_url'];
  $profile_pic_hd=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['profile_pic_url_hd'];
  $username=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['username'];
  $user_external_url=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['external_url'];
  $user_full_name=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['full_name'];
  $user_is_private=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['is_private'];
  $user_is_verified=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['is_verified'];
  $user_id=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['id'];
  $ig_user_biography=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['biography'];
  $post_likes=array();
  $post_comments=array();
  $post_shortcode=array();
  for($i=0;$i<=20;$i++)
  {
  $post_comments[$i]=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][$i]['node']['edge_media_to_comment']['count'];
  $post_likes[$i]=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][$i]['node']['edge_liked_by']['count'];
  $post_shortcode[$i]=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][$i]['node']['shortcode'];
  }

  for($j=0;$j<=$i;$j++)
  {
    echo $j." ".$post_shortcode[$j]." ".$post_likes[$j]." ".$post_comments[$j]."<br />";
  }
  $bulk= $data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][0]['node']['id'];
  $bulk2=$data_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
  echo $username." / ".$followers." / ".$followed_by." / ".$uploads." / ".$biography." / ".$user_id." / ".$user_external_url." / ".$user_full_name." / ".$user_is_private." / ".$user_is_verified." / ".$post_comments." / ".$post_likes." / ".$post_shortcode;
  echo "<br /><br />";
  //print_r($bulk2);
}
echo nl2br(utf8_decode($ig_user_biography));
?>
