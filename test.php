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
$date_str = file_get_contents($date_url);
$date_array = json_decode($date_str, TRUE);
$daily_block_count = count($date_array['blocks']);
#echo $daily_block_count."\n";
for($i=0;$i<$daily_block_count;$i++){
	echo $i."\n";
	//print each block data for that day...
	//Array
	//(
	//	[height] => 598364
	//	[hash] => 00000000000000000012c09508a7243c383e72400baebbe07ac8256147ac7632
	//	[time] => 1570492282
	//	[main_chain] => 1
	//)
	//
	print_r($date_array['blocks'][$i]);
}
?>
