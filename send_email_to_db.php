<?php
function send_email_to_db($email){
	// Ваш ключ доступа к API
	$api_key = "3e8d76dc9e9b4f7e84c7cbaf76b1ef6e";//Поменяй на нужный апи, который тебе выдаст сервис
	//Имя метода
	$method = "listSubscribeOptInNow";
	//параметры
	$list_id = "94138";
	$phone = "";
	$fname = "";
	$lname = "";
	$mobilecountry = "";
	$fname = "";
	$lname = "";
	$parameters = "apikey=$api_key&list_id=$list_id&email=$email&phone=&mobilecountry=&fname=&lname=&names=&values=&optin=TRUE&update_existing=TRUE";
	// Создаём GET-запрос
	$api_url = "http://api.feedgee.com/1.0/$method?$parameters";
	 
	// Делаем запрос на API-сервер
	    if( $curl = curl_init() ) {
        $uagent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)";
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($curl, CURLOPT_ENCODING, "gzip, deflate");
        curl_setopt($curl, CURLOPT_USERAGENT, $uagent);
        curl_setopt($curl, CURLOPT_COOKIEJAR, "coo.txt");
        curl_setopt($curl, CURLOPT_COOKIEFILE, "coo.txt");
        $out = curl_exec($curl);
        curl_close($curl);
    }     
	
}