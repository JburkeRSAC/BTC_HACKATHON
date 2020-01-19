<?php
date_default_timezone_set("EST");
//floating point
#$time_in_milliseconds = round(microtime(true) * 1000);
//epoch => milliseconds
#$time_in_milliseconds = round(time()) * 1000;
//human_readable => milliseconds
#$time_in_milliseconds = strtotime("7 October 2009") * 1000;
#user input
echo "Please Enter date in (int) Day, (string) Month, (int) year format.\n";
echo "\tExample: 7 October 2009\n";
$time_in_milliseconds = strtotime($argv[1]." ".$argv[2]." ".$argv[3]) * 1000;
echo $time_in_milliseconds."\n\n";
$date_url = "https://blockchain.info/blocks/$time_in_milliseconds?format=json";
$info_url = "blockexplorer.com/api/status?q=";
$options = array("Info"=>"getInfo", "BlockCount"=>"getBlockCount", "Difficulty"=>"getDifficulty", "BestBlockHash"=>"getBestBlockHash", "LastBlockHash"=>"getLastBlockHash");
#foreach($options AS $short_option => $this_option){
	#$this_result = file_get_contents("http://".$info_url.$options[$short_option]);
	#echo $short_option." : \n";
	#print_r($this_result);
	#echo "\n\n";
#}
#echo $date_url."\n";
$date_array = file_get_contents($date_url);
print_r($date_array);
?>
