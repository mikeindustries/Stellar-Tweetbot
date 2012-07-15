#!/usr/local/php5/bin/php -q

<?php

// Insert absolute filepath to your twitteroauth.php script here - grab the twitteroauth folder from http://github.com/abraham/twitteroauth
$twitter_oauth_path = '/{YOURFILEPATH}/twitteroauth/twitteroauth.php';

// Insert absolute filepath where your cached feed file will go - can be the same directory as this script
$cached_file_path = '/{YOURFILEPATH}/Stellar-Tweetbot/feed.xml';

// Insert HTTP path to your Stellar.io XML/RSS file
$feed_url = "http://stellar.io/{YOURUSERNAME}/flow/feed";

// Insert your Twitter app credentials... you can create and get these at https://dev.twitter.com/apps
$consumer_key = '{GET_THIS_FROM_YOUR_TWITTER_ACCOUNT_SETTINGS}';
$consumer_secret = 'GET_THIS_FROM_YOUR_TWITTER_ACCOUNT_SETTINGS';
$access_token = 'GET_THIS_FROM_YOUR_TWITTER_ACCOUNT_SETTINGS';
$access_token_secret = 'GET_THIS_FROM_YOUR_TWITTER_ACCOUNT_SETTINGS';

require_once $twitter_oauth_path;

// This function grabs the last tweets we cached so we don't try to tweet them again... saves API hits
function getOldIDs () {
	global $cached_file_path;
	$handle = fopen($cached_file_path, 'r');
	$contents = fread($handle, filesize($cached_file_path));
	fclose($handle);

	$oldxml = simplexml_load_string($contents);

	$oldIDs = array();

	foreach($oldxml->entry as $entry) {
		if ($entry->link->attributes()->href) {
			$urlstring = (string)$entry->link->attributes()->href;
			if (preg_match("/twitter.com\/[A-Z0-9_]+\/status\/([0-9]+)/i", $urlstring, $matches)) { 
				array_push($oldIDs, $matches[1]);
			}
		}
	}
	return $oldIDs;
}

// This function looks for new tweets and retweets them out
function retweet() {
 

	global $consumer_key, $consumer_secret, $access_token, $access_token_secret, $feed_url, $cached_file_path;
	
	$toa = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
	
	$ch = curl_init($feed_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$feedcontents = curl_exec($ch);
	curl_close($ch);

	$oldIDArray = getOldIDs();

	$newxml = simplexml_load_string($feedcontents);
	foreach($newxml->entry as $entry) {
		if ($entry->link->attributes()->href) {
			$isreply = preg_match("/^@/i", (string)$entry->title); 
			$urlstring = (string)$entry->link->attributes()->href;
			if (!$isreply && preg_match("/twitter.com\/[A-Z0-9_]+\/status\/([0-9]+)/i", $urlstring, $matches)) { 
				if (!in_array($matches[1], $oldIDArray)) {
					print_r($toa->post('statuses/retweet/'.$matches[1]));
				}
			}
		}
	}

	$handle = fopen($cached_file_path, 'w');
	fwrite($handle,$feedcontents);
	fclose($handle);	

}

retweet();


?>