<?php
$ig_name="your_name_here";
$ig_data = file_get_contents('https://www.instagram.com/web/search/topsearch/?query='.$ig_name);
if ($ig_data !== false) {
    $data = json_decode($ig_data, true);
    if ($data !== null) {
        $ig_followers= $data['users'][0]['user']['follower_count'];
        if(preg_match('/^[0-9]+$/',$ig_followers))
        {
          echo $ig_followers;
        }
      }
    }
?>
