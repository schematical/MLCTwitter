<?php
abstract class MLCTwitterDriver{
	public static function GetStatus($strUsername){
		$strUrl = 'http://api.twitter.com/1/statuses/user_timeline.json?screen_name=' . $strUsername;
		
		return self::CurlData($strUrl);
	}
	public static function Search($strParameter){
		$strUrl = 'http://search.twitter.com/search.json?q=' . urlencode($strParameter);
		
		return self::CurlData($strUrl);
	}
	protected static function CurlData($strUrl){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $strUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		
		$strBody = curl_exec($ch);
		//error_log(curl_getinfo($ch, CURLINFO_HTTP_CODE));
		curl_close($ch);
		
		// now, process the JSON string
		$arrJson = json_decode($strBody, true);
		return $arrJson;
	}
}
