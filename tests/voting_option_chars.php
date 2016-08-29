<?php
include("../includes/connect.php");

$game_id = (int) $_REQUEST['game_id'];
$game = new Game($app, $game_id);

$pass_count = 0;
$fail_count = 0;
for ($option_index=0; $option_index<1000; $option_index++) {
	$vote_identifier = $game->option_index_to_vote_identifier($option_index);
	$test_addr = "1".$vote_identifier."abctest";
	$addr_vote_identifier = $game->addr_text_to_vote_identifier($test_addr);
	$addr_option_index = $game->vote_identifier_to_option_index($addr_vote_identifier);
	echo "$option_index=$vote_identifier, $addr_option_index=$addr_vote_identifier<br/>\n";
	if ($option_index == $addr_option_index) $pass_count++;
	else $fail_count++;
}
echo "Passed ".$pass_count." tests and failed ".$fail_count."<br/>\n";
?>