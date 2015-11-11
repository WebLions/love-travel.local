<?php
require_once 'PHPWord.php';

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
	$out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
	//$out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
	return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}

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

function morph($n, $f1, $f2, $f5) {
	$n = abs(intval($n)) % 100;
	if ($n>10 && $n<20) return $f5;
	$n = $n % 10;
	if ($n>1 && $n<5) return $f2;
	if ($n==1) return $f1;
	return $f5;
}

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
	//$out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
	//$out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
	return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}
//Конец

//Функция вывода документа-договора
function check_pre_doc()
{
	switch ($_POST['pre_doc']) 
	{
		case 'kuplya':
			$pre_doc = 'Договор купли-продажи';
			break;
		case 'darenie':
			$pre_doc = 'Договор дарения';
			break;
		case 'meni':
			$pre_doc = 'Договор мены';
			break;
		case 'spavka':
			$pre_doc = 'Справка ЖСК о выплаченном пае';
			break;
		case 'other':
			$pre_doc = $_POST['pre_otherOptionInput'];
			break;
		
		default:
			$pre_doc = 'Вы не выбрали тип документа';
			break;
	}
return $pre_doc;
}

//Блок функций сколнения слов по половому признаку
//Начало
function pre_sex_vendor_reg()
{
	if ($_POST['pre_sex_vendor'] == 'male')
		return 'ан';
	elseif ($_POST['pre_sex_vendor'] == 'female')
		return 'ана';
}
function pre_sex_buyer_reg()
{
	if ($_POST['pre_sex_buyer'] == 'male')
		return 'ан';
	elseif ($_POST['pre_sex_buyer'] == 'female')
		return 'ана';
}
function pre_sex_vendor_im()
{
	if ($_POST['pre_sex_vendor'] == 'male')
		return 'ый';
	elseif ($_POST['pre_sex_vendor'] == 'female')
		return 'ая';
}
function pre_sex_buyer_im()
{
	if ($_POST['pre_sex_buyer'] == 'male')
		return 'ый';
	elseif ($_POST['pre_sex_buyer'] == 'female')
		return 'ая';
}
//Конец

//Функция склонения кол-во комнат
function get_flat($flat)
{
	switch ($flat) {
		case 'однокомнатная':
			$flat = 'однокомнатную';
			break;
		case 'двухкомнатная':
			$flat = 'двухкомнатную';
			break;
		case 'трехкомнатная':
			$flat = 'трехкомнатную';
			break;
		case 'четырехкмонатная':
			$flat = 'четырехкмонатную';
			break;
		
		default:
			$flat = 'Вы не выбрали комнату';
			break;
	}
	return $flat;

}
// ----------------------------------------------------------------------------------------

$PHPWord = new PHPWord();

if ($_POST['type_doc'] == 'pre_dogovor') 
{
	$document = $PHPWord->loadTemplate('pre_dogovor.docx'); //шаблон
	// Замена переменных
	$document->setValue('city', $_POST['pre_placeOfDogovor']); 
	$document->setValue('dayOfDogovor', $_POST['dayOfDogovor']); 
	$document->setValue('monthOfDogovor', $_POST['monthOfDogovor']); 
	$document->setValue('yearOfDogovor', $_POST['yearOfDogovor']); 
	$document->setValue('pre_fio', $_POST['pre_fio']); 
	$document->setValue('pre_dayOfB', $_POST['pre_dayOfB']); 
	$document->setValue('pre_monthOfB', $_POST['pre_monthOfB']); 
	$document->setValue('pre_yearOfDogovor', $_POST['pre_yearOfDogovor']); 
	$document->setValue('pre_passport', $_POST['pre_passport']); 
	$document->setValue('pre_adressOfRegistration', $_POST['pre_adressOfRegistration']); 
	$document->setValue('pre_fio_of_buyer', $_POST['pre_fio_of_buyer']); 
	$document->setValue('pre_dayOfB_of_buyer', $_POST['pre_dayOfB_of_buyer']); 
	$document->setValue('pre_monthOfB_of_buyer', $_POST['pre_monthOfB_of_buyer']); 
	$document->setValue('pre_year_OfB_of_buyer', $_POST['pre_year_OfB_of_buyer']); 
	$document->setValue('pre_passport_of_buyer', $_POST['pre_passport_of_buyer']);

	//Полы 
	$document->setValue('pre_sex_vendor_reg',pre_sex_vendor_reg()); 
	$document->setValue('pre_sex_vendor_im', pre_sex_vendor_im()); 
	$document->setValue('pre_sex_buyer_reg', pre_sex_buyer_reg()); 
	$document->setValue('pre_sex_buyer_im', pre_sex_buyer_im()); 

	$document->setValue('pre_adressOfRegistration_buyer', $_POST['pre_adressOfRegistration_buyer']); 
	$document->setValue('pre_dayOfDogovor', $_POST['pre_dayOfDogovor']); 
	$document->setValue('pre_monthOfDogovor', $_POST['pre_monthOfDogovor']); 
	$document->setValue('pre_yearOfDogovor', $_POST['pre_yearOfDogovor']); 
	$document->setValue('pre_flat', get_flat($_POST['pre_flat'])); 
	$document->setValue('pre_area_number', $_POST['pre_area']); 
	$document->setValue('pre_area_string', num2str($_POST['pre_area']));//ПЕРЕВЕСТИ В СТРОКУ 
	$document->setValue('pre_floor', $_POST['pre_floor']); 
	$document->setValue('pre_adress', $_POST['pre_adress']); 
	$document->setValue('pre_adress_house', $_POST['pre_adress_house']); 
	$document->setValue('pre_adress_house_string', num2str_flat($_POST['pre_adress_house'])); 
	$document->setValue('pre_adress_flat', $_POST['pre_adress_flat']); 
	$document->setValue('pre_adress_flat_string', num2str_flat($_POST['pre_adress_flat'])); 
	$document->setValue('pre_kadastr', $_POST['pre_kadastr']); 
	$pre_doc = check_pre_doc();
	$document->setValue('pre_doc', $pre_doc); 
	$document->setValue('pre_dayOfDoc', $_POST['pre_dayOfDoc']); 
	$document->setValue('pre_monthOfDoc', $_POST['pre_monthOfDoc']); 
	$document->setValue('pre_yearOfDoc', $_POST['pre_yearOfDoc']); 
	$document->setValue('pre_svidetelstvo_data', $_POST['pre_svidetelstvo_data']); 
	$document->setValue('pre_svidetelstvo_number', $_POST['pre_svidetelstvo_number']); 
	$document->setValue('pre_svidetelstvo_serial', $_POST['pre_svidetelstvo_serial']); 
	$document->setValue('pre_pricePrimary', $_POST['pre_pricePrimary']); 
	$document->setValue('pre_pricePrimary_string', num2str_money($_POST['pre_pricePrimary'])); //не забыть перевести в строку 
	$document->setValue('pre_dayOfRegistration', $_POST['pre_dayOfRegistration']); 
	$document->setValue('pre_monthOfRegistration', $_POST['pre_monthOfRegistration']); 
	$document->setValue('pre_yearOfRegistrationr', $_POST['pre_yearOfRegistrationr']); 
	$document->setValue('pre_differenceOfPrice', $_POST['pre_differenceOfPrice']); 
	$document->setValue('pre_differenceOfPrice_string', num2str_money($_POST['pre_differenceOfPrice'])); 
	$document->setValue('pre_numberOfObremenenie', $_POST['pre_numberOfObremenenie']); 
	$document->setValue('pre_actorOfObremenenie', $_POST['pre_actorOfObremenenie']); 
	$document->setValue('dayOfEnd', $_POST['dayOfEnd']); 
	$document->setValue('pre_monthOfEnd', $_POST['pre_monthOfEnd']); 
	$document->setValue('pre_yearOfEnd', $_POST['pre_yearOfEnd']); 
	$document->setValue('pre_price_number', $_POST['pre_price']); 
	$document->setValue('pre_price_string', num2str_money($_POST['pre_price'])); // Не забыть про перевод в строку с числа.

	$name_of_file = time() .'_pre_dogovor_full.docx';
	setcookie('name_of_doc',$name_of_file);

	$document->save($name_of_file); // Сохранение документа
	//echo 'saved pre_dogovor.';
}
// ----------------------------------------------------------------------------------------
//	ЭТО ДЛЯ ДОГОВОРА. НЕ ПИШИ СЮДА КОД ЕСЛИ ТЫ ХОЧЕШЬ ДЛЯ ДРУГОГО ДОКУМЕНТА 
elseif($_POST['type_doc'] == 'dogovor')
{
	$document = $PHPWord->loadTemplate('dogovor.docx'); //шаблон
	// Замена переменных
	$document->setValue('city', $_POST['placeOfDogovor']); 

	$name_of_file = time() .'_pre_dogovor_full.docx';
	setcookie('name_of_doc',$name_of_file);
	$document->save($name_of_file); // Сохранение документа
}	

// ----------------------------------------------------------------------------------------

/*function XMail( $from, $to, $subj, $text, $filename)
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
$from = '>Jera<';
$to = $_POST['email'];
$subj = 'Electronic dogovor';
$text = 'Congratz, you have file';
XMail( $from, $to, $subj, $text, $name_of_file);*/
// ----------------------------------------------------------------------------------------
?>
<p>На ваш почтовый ящик былло выслано письмо с документом. Вы также можете<a href="download_doc.php">Скачать документ</a></p>
<pre>
<?
echo 'Тип документа:'.$_POST['type_doc'] . '<br>';
var_dump($_POST);
?>
</pre>