<?php

// первое видео Кайли 03 марта 2006
$year_first = 2006;
$month_first = 2;
$day_first = 1;

for($year=$year_first; $year<=2013; $year++){
for($month=$month_first; $month<=10; $month++){
for($day=$day_first; $day<=25; $day++){
$query = "https://www.googleapis.com/youtube/v3/search?part=snippet&order=date&maxResults=50&publishedAfter=$year-$month-".$day."T00%3A00%3A00Z&publishedBefore=$year-$month-".($day+1)."T00%3A00%3A00Z&q=Minogue&key=AIzaSyDApaPRqJqOCUeEuEAtXoaUtXeiOGiNE7M";
print("$query\n");
$ci = curl_init($query);
curl_setopt($ci,CURLOPT_RETURNTRANSFER, TRUE);
$request = curl_exec($ci);
curl_close($ci);
$result = json_decode($request,true);
//if(count($result['items'])){
    print_r($result);
//}
}
}
}
?>
