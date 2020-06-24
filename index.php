<?php
	include_once ('lib/SQL.php');
	include_once ('lib/curl_query.php');
	include_once ('lib/simple_html_dom.php');
	set_time_limit(700);
	$sql=SQL::Instance();
	$looptr=false;

	while($looptr){
	set_time_limit(700);
	$html=curl_get('https://yandex.ru/pogoda/krasnoyarsk');
	$dom=str_get_html($html);
	$temp=$dom->find('.temp.fact__temp.fact__temp_size_s   span.temp__value', 0);	
	$newtemp=str_replace("−", "-", $temp->plaintext);
	$tobd=array('temp'=> (int)$newtemp);
	$sql->Insert('tempkrsk', $tobd);
	sleep(600);
	}