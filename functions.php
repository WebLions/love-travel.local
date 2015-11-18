<?php
// ----------------------------------------------------------------------------------------
/*
 * Возвращает сумму прописью
 * @author runcore
 * @uses morph(...)
 */
//Начало
function num2str_money($num) {
	$nul='ноль';
	$ten=array(
		array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
		array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
	);
	$a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
	$tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
	$hundred=array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
	$unit=array( // Units
		array('копейка' ,'копейки' ,'копеек',	 1),
		array('рубль'   ,'рубля'   ,'рублей'    ,0),
		array('тысяча'  ,'тысячи'  ,'тысяч'     ,1),
		array('миллион' ,'миллиона','миллионов' ,0),
		array('миллиард','милиарда','миллиардов',0),
	);
	//
	list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
	$out = array();
	if (intval($rub)>0) {
		foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
			if (!intval($v)) continue;
			$uk = sizeof($unit)-$uk-1; // unit key
			$gender = $unit[$uk][3];
			list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
			// mega-logic
			$out[] = $hundred[$i1]; # 1xx-9xx
			if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
			else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
			// units without rub & kop
			if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
		} //foreach
	}
	else $out[] = $nul;
	//$out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
	//$out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
	return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}
// ----------------------------------------------------------------------------------------

function num2str($num) {
	$nul='ноль';
	$ten=array(
		array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
		array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
	);
	$a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
	$tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
	$hundred=array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
	$unit=array( // Units
		array('десятая' ,'десятых' ,'десятых',	 1),
		array('целая'   ,'целых'   ,'целых'    ,0),
		array('тысяча'  ,'тысячи'  ,'тысяч'     ,1),
		array('миллион' ,'миллиона','миллионов' ,0),
		array('миллиард','милиарда','миллиардов',0),
	);
	//
	list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
	$out = array();
	if (intval($rub)>0) {
		foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
			if (!intval($v)) continue;
			$uk = sizeof($unit)-$uk-1; // unit key
			$gender = $unit[$uk][3];
			list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
			// mega-logic
			$out[] = $hundred[$i1]; # 1xx-9xx
			if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
			else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
			// units without rub & kop
			if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
		} //foreach
	}
	else $out[] = $nul;
	$out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
	$out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
	return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}
// ----------------------------------------------------------------------------------------

function num2str_flat($num) {
	$nul='ноль';
	$ten=array(
		array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
		array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
	);
	$a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
	$tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
	$hundred=array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
	$unit=array( // Units
		array('десятая' ,'десятых' ,'десятых',	 1),//array('десятая' ,'десятых' ,'десятых',	 1),
		array('целая'   ,'целых'   ,'целых'    ,0),//array('целая'   ,'целых'   ,'целых'    ,0),
		array('тысяча'  ,'тысячи'  ,'тысяч'     ,1),
		array('миллион' ,'миллиона','миллионов' ,0),
		array('миллиард','милиарда','миллиардов',0),
	);
	//
	list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
	$out = array();
	if (intval($rub)>0) {
		foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
			if (!intval($v)) continue;
			$uk = sizeof($unit)-$uk-1; // unit key
			$gender = $unit[$uk][3];
			list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
			// mega-logic
			$out[] = $hundred[$i1]; # 1xx-9xx
			if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
			else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
			// units without rub & kop
			if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
		} //foreach
	}
	else $out[] = $nul;
	//$out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
	//$out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
	return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}
// ----------------------------------------------------------------------------------------

function morph($n, $f1, $f2, $f5) {
	$n = abs(intval($n)) % 100;
	if ($n>10 && $n<20) return $f5;
	$n = $n % 10;
	if ($n>1 && $n<5) return $f2;
	if ($n==1) return $f1;
	return $f5;
}

// ----------------------------------------------------------------------------------------
//Конец

//Функция вывода документа-договора
// ----------------------------------------------------------------------------------------
function get_doc_osn($doc_osn, $other_option_input = null)
{
	switch ($doc_osn) 
	{
		case 'kuplya':
			$result = 'Договор купли-продажи';
			break;
		case 'darenie':
			$result = 'Договор дарения';
			break;
		case 'meni':
			$result = 'Договор мены';
			break;
		case 'spavka':
			$result = 'Справка ЖСК о выплаченном пае';
			break;
		case 'other':
			$result = $other_option_input;
			break;
		
		default:
			$result = 'Вы не выбрали тип документа';
			break;
	}
return $result;
}

// ----------------------------------------------------------------------------------------
//Блок функций сколнения слов по половому признаку
//Начало
function get_sex_reg($sex)
{
	if ($sex == 'male')
		{$ending = 'ан';}
	elseif ($sex == 'female')
		{$ending = 'ана';}
	return $ending;
}
// ----------------------------------------------------------------------------------------

function get_sex_im($sex)
{
	if ($sex == 'male')
		{$ending = 'ый';}
	elseif ($sex == 'female')
		{$ending = 'ая';}
	return $ending;
}
//Конец
// ----------------------------------------------------------------------------------------

function XMail($from, $to, $subj, $text, $filename)
 { 
    $f         = fopen($filename,"rb"); 
    $un        = strtoupper(uniqid(time())); 
    $head      = "From: $from\n"; 
    $head     .= "To: $to\n"; 
    $head     .= "Subject: $subj\n"; 
    $head     .= "X-Mailer: PHPMail Tool\n"; 
    $head     .= "Reply-To: $from\n"; 
    $head     .= "Mime-Version: 1.0\n"; 
    $head     .= "Content-Type:multipart/mixed;"; 
    $head     .= "boundary=\"----------".$un."\"\n\n"; 
    $zag       = "------------".$un."\nContent-Type:text/html;\n"; 
    $zag      .= "Content-Transfer-Encoding: 8bit\n\n$text\n\n"; 
    $zag      .= "------------".$un."\n"; 
    $zag      .= "Content-Type: application/octet-stream;"; 
    $zag      .= "name=\"".basename($filename)."\"\n"; 
    $zag      .= "Content-Transfer-Encoding:base64\n"; 
    $zag      .= "Content-Disposition:attachment;"; 
    $zag      .= "filename=\"".basename($filename)."\"\n\n"; 
    $zag      .= chunk_split(base64_encode(fread($f,filesize($filename))))."\n"; 
     
    return @mail("$to", "$subj", $zag, $head); 
} 
// ----------------------------------------------------------------------------------------
function get_way_of_act()
{
	if ($_POST['act'] == 'yes')
		{$verdict = 'путем подписания передаточного акта';}
	elseif ($_POST['act'] == 'no') 
		{$verdict = 'путем подписания настоящего договора без составления передаточного акта';}
	return $verdict;
}
// ----------------------------------------------------------------------------------------
// Функции преобразования числа в строку (дату)
// ----------------------------------------------------------------------------------------

function get_day_from_number($number)
{
	switch ($number) 
	{
		case '01':
			$result = 'первое';
			break;

		case '02':
			$result = 'второе';
			break;

		case '03':
			$result = 'третье';
			break;

		case '04':
			$result = 'четвертое';
			break;

		case '05':
			$result = 'пятое';
			break;

		case '06':
			$result = 'шестое';
			break;

		case '07':
			$result = 'седьмое';
			break;

		case '08':
			$result = 'восьмое';
			break;

		case '09':
			$result = 'девятое';
			break;

		case '10':
			$result = 'десятое';
			break;

		case '11':
			$result = 'одиннадцатое';
			break;

		case '12':
			$result = 'двенадцатое';
			break;

		case '13':
			$result = 'тринадцатое';
			break;

		case '14':
			$result = 'четырнадцатое';
			break;

		case '15':
			$result = 'пятнадцатое';
			break;

		case '16':
			$result = 'шестнадцатое';
			break;

		case '17':
			$result = 'семнадцатое';
			break;

		case '18':
			$result = 'восемнадцатое';
			break;

		case '19':
			$result = 'девятнадцатое';
			break;

		case '20':
			$result = 'двадцатое';
			break;

		case '21':
			$result = 'двадцать первое';
			break;

		case '22':
			$result = 'двадцать второе';
			break;

		case '23':
			$result = 'двадцать третье';
			break;

		case '24':
			$result = 'двадцать четвертое';
			break;

		case '25':
			$result = 'двадцать пятое';
			break;

		case '26':
			$result = 'двадцать шестое';
			break;

		case '27':
			$result = 'двадцать седьмое';
			break;

		case '28':
			$result = 'двадцать восьмое';
			break;

		case '29':
			$result = 'двадцать девятое';
			break;

		case '30':
			$result = 'тридцатое';
			break;

		case '31':
			$result = 'тридцать первое';
			break;
		
		default:
			$result = 'Ошибка. Введенно неверное число дня';
			break;		
	}
	return $result;
}
function get_month_from_number($number)
{
	switch ($number) 
	{
		case '01':
			$result = 'января';
			break;

		case '02':
			$result = 'февраля';
			break;

		case '03':
			$result = 'марта';
			break;

		case '04':
			$result = 'апреля';
			break;

		case '05':
			$result = 'мая';
			break;

		case '06':
			$result = 'июня';
			break;

		case '07':
			$result = 'июля';
			break;

		case '08':
			$result = 'августа';
			break;

		case '09':
			$result = 'сентября';
			break;

		case '10':
			$result = 'октября';
			break;

		case '11':
			$result = 'ноября';
			break;

		case '12':
			$result = 'декабря';
			break;
	
		default:
			$result = 'Ошибка. Введенно неверное число месяца';
			break;	
	}
	return $result;
}
function get_year_from_number($number)
{
	switch ($number) {

		//Идет обработка с 2007 по 2020 год. Добавь тебе нужный год по шаблону ниже.
		case '2007':
			$result = 'две тысячи седьмого года';
			break;

		case '2008':
			$result = 'две тысячи восьмого года';
			break;

		case '2009':
			$result = 'две тысячи девятого года';
			break;

		case '2010':
			$result = 'две тысячи десятого года';
			break;

		case '2011':
			$result = 'две тысячи одинадцатого года';
			break;

		case '2012':
			$result = 'две тысячи двенадцатого года';
			break;

		case '2013':
			$result = 'две тысячи тринадцатого года';
			break;

		case '2014':
			$result = 'две тысячи четырнадцатого года';
			break;

		case '2015':
			$result = 'две тысячи пятнадцатого года';
			break;

		case '2016':
			$result = 'две тысячи шестнадцатого года';
			break;

		case '2017':
			$result = 'две тысячи семьнадцатого года';
			break;

		case '2018':
			$result = 'две тысячи восемнадцатого года';
			break;

		case '2019':
			$result = 'две тысячи девятнадцатого года';
			break;

		case '2020':
			$result = 'две тысячи двадцатого года';
			break;
		
		default:
			$result = 'Ошибка. Вы выбрали неверный год';
			break;
	}
	return $result;
}
function get_flat($flat_type)
{
	switch ($flat_type) 
	{
		case 'однокомнатная':
			$result = 'однокомнатную';
			break;
		case 'двухкомнатная':
			$result = 'двухкомнатную';
			break;
		case 'трехкомнатная':
			$result = 'трехкомнатную';
			break;
		case 'четырехкомнатная':
			$result = 'четырехкомнатную';
			break;
		
		default:
			$result = 'Ошибка. Вы не выбрали количество комнат';
			break;
	}
	return $result;
}
?>
