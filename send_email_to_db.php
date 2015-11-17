<?php
function send_email_to_db($email){
	// Ваш ключ доступа к API
	$api_key = "3e8d76dc9e9b4f7e84c7cbaf76b1ef6e";//Поменяй на нужный апи, который тебе выдаст сервис
	//Имя метода
	$method = "subscriberImport";
	//параметры
	$phone = "";
	$fname = "";
	$lname = "";
	$parameters = "apikey=$api_key&email=$email&phone=$phone&mobilecountry=$mobilecountry&fname=$fname&lname=$lname&names=&values=&update_existing=true";
	// Создаём GET-запрос
	$api_url = "http://api.feedgee.com/1.0/$method?$parameters&output=json";
	// Делаем запрос на API-сервер
	$result = file_get_contents($api_url);
	if(!empty($result))
		return true;
	else
		return false;
}
