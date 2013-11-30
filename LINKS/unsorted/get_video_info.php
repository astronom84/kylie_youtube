<?php
$links_file = $argv[1];
$delimiter = "'\t##\t'";
if(is_readable($links_file) AND (($links_handle = fopen($links_file, 'r')) !== False) ){
  $ci = curl_init();
  while($videoid = fgets($links_handle)){
    // удалить лишний перевод строки
    $videoid = trim($videoid);
    $query = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=$videoid&key=AIzaSyDApaPRqJqOCUeEuEAtXoaUtXeiOGiNE7M";
//    print("$query\n");
    curl_setopt($ci, CURLOPT_URL, "$query");
    curl_setopt($ci,CURLOPT_RETURNTRANSFER, TRUE);
    $request = curl_exec($ci);
    $decode_arr = json_decode($request,true);
    if(count($decode_arr['items'])){
        $data = $decode_arr['items'][0]['snippet'];
        $result_str = "'$videoid$delimiter$data[title]$delimiter$data[channelTitle]$delimiter$data[publishedAt]'\n";
        print($result_str);
    }
    else{ 
        print_r($decode_arr);
    }
  }
  if($ci){
    curl_close($ci);
  }
}
?>
