<?php

	/*
	 *	Argument Check.
	 */
	echo "[#] Telegram Message Sender\n";
	if($argc != 2)
		die("[!] Usage: php script.php \"message\"\n");
		
		
	/*
	 *	Configuration Variables 
	 */ 
	$TOKEN  = "YOUR_BOT_TOKEN";
	$CHAT_ID = "-GROUP_ID (example: -123456789)";
	$MSG = urlencode($argv[1]);
	
	$URL = "https://api.telegram.org/bot$TOKEN/sendMessage?chat_id=$CHAT_ID&text=$MSG";


	/*
	 *	Send Message
	 */
	echo "[#] Sending msg ...\n";
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => $URL,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	));

	$response = json_decode( curl_exec($curl) );

	curl_close($curl);
	
	
	/*
	 *	Status Check
	 */
	if($response->{'ok'} == true)
		exit("[#] Sucess!\n");
	
	exit("[!] Failed!\n");
	










