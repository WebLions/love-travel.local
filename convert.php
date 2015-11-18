<?php
require_once 'PHPWord.php';
include 'functions.php';

// ----------------------------------------------------------------------------------------

$PHPWord = new PHPWord();

if ($_POST['type_doc'] == 'pre_dogovor') 
{
	//-------------------------------------------------------------------------------------
	// Принятие данных с форматом datepicker и обработка их,
	// информация приходит в виде объекта данных string с инфой: dd.mm.yy
	//-------------------------------------------------------------------------------------
	// Дата заключения договора
	$pre_date_of_dogovor = DateTime::createFromFormat('d.m.Y', $_POST['pre_date_of_dogovor']);
	$pre_day_of_dogovor = $pre_date_of_dogovor->format('d');
	$pre_month_of_dogovor= $pre_date_of_dogovor->format('m');
	$pre_year_of_dogovor= $pre_date_of_dogovor->format('Y');
	// Если не требуется распарсить строку, то можно сразу же обращаться к данным через супермассив $_POST
	//-------------------------------------------------------------------------------------
	$document = $PHPWord->loadTemplate('pre_dogovor.docx'); //шаблон
	// Замена переменных
	$document->setValue('city', $_POST['pre_placeOfDogovor']);//Место заключения договора
	$document->setValue('dayOfDogovor', get_day_from_number($pre_day_of_dogovor) );//Дата заключения договора: день
	$document->setValue('monthOfDogovor', get_month_from_number($pre_month_of_dogovor) );//Дата заключения договора: месяц
	$document->setValue('yearOfDogovor', get_year_from_number($pre_year_of_dogovor) );//Дата заключения договора: год
	$document->setValue('pre_fio', $_POST['pre_fio']); //ФИО продавца
	$document->setValue('birthday_of_vendor', $_POST['pre_birthday_of_vendor']); //Дата рождения продавца
		
	$document->setValue('pre_passport', $_POST['pre_passport']); 
	$document->setValue('pre_adressOfRegistration_сity', $_POST['pre_adressOfRegistration_city']); 
	$document->setValue('pre_adressOfRegistration_street', $_POST['pre_adressOfRegistration_street']); 
	$document->setValue('pre_adressOfRegistration_house', $_POST['pre_adressOfRegistration_house']); 
	$document->setValue('pre_adressOfRegistration_flat', $_POST['pre_adressOfRegistration_flat']); 
	$document->setValue('pre_fio_of_buyer', $_POST['pre_fio_of_buyer']); 
	$document->setValue('pre_birthday_of_buyer', $_POST['pre_birthday_of_buyer']); 
	$document->setValue('pre_passport_of_buyer', $_POST['pre_passport_of_buyer']);
	//Полы 
	$document->setValue('pre_sex_vendor_reg',get_sex_reg($_POST['pre_sex_vendor']) ); 
	$document->setValue('pre_sex_vendor_im', get_sex_im($_POST['pre_sex_vendor']) ); 
	$document->setValue('pre_sex_buyer_reg', get_sex_reg($_POST['pre_sex_buyer']) ); 
	$document->setValue('pre_sex_buyer_im', get_sex_im($_POST['pre_sex_buyer']) ); 

	$document->setValue('pre_adressOfRegistration_buyer_city', $_POST['pre_adressOfRegistration_buyer_city']); 
	$document->setValue('pre_adressOfRegistration_buyer_street', $_POST['pre_adressOfRegistration_buyer_street']); 
	$document->setValue('pre_adressOfRegistration_buyer_house', $_POST['pre_adressOfRegistration_buyer_house']); 
	$document->setValue('pre_adressOfRegistration_buyer_flat', $_POST['pre_adressOfRegistration_buyer_flat']); 
	$document->setValue('pre_date_of_main_dogovor', $_POST['pre_date_of_main_dogovor']);//Дата заключения основного договора
	$document->setValue('pre_flat', get_flat($_POST['pre_flat']) ); 
	$document->setValue('pre_area_number', $_POST['pre_area']); 
	$document->setValue('pre_area_string', num2str_flat($_POST['pre_area']));
	$document->setValue('pre_floor', $_POST['pre_floor']); 
	$document->setValue('pre_adress_city', $_POST['pre_adress_city']); 
	$document->setValue('pre_adress_street', $_POST['pre_adress_street']); 
	$document->setValue('pre_adress_house', $_POST['pre_adress_house']); 
	$document->setValue('pre_adress_house_string', num2str_flat($_POST['pre_adress_house'])); 
	$document->setValue('pre_adress_flat', $_POST['pre_adress_flat']); 
	$document->setValue('pre_adress_flat_string', num2str_flat($_POST['pre_adress_flat']));
	$document->setValue('pre_kadastr', $_POST['pre_kadastr']); 

	$document->setValue('pre_svidetelstvo_data', $_POST['pre_svidetelstvo_data']); 
	$document->setValue('pre_svidetelstvo_number', $_POST['pre_svidetelstvo_number']); 
	$document->setValue('pre_number_of_serial', $_POST['pre_number_of_serial']); 
	$document->setValue('pre_svidetelstvo_serial', $_POST['pre_svidetelstvo_serial']); 

	$document->setValue('pre_pricePrimary', $_POST['pre_pricePrimary']); 
	$document->setValue('pre_pricePrimary_string', num2str_money($_POST['pre_pricePrimary']));
	$document->setValue('pre_date_of_reg_obr', $_POST['pre_date_of_reg_obr']); 
	$document->setValue('pre_differenceOfPrice', $_POST['pre_differenceOfPrice']); 
	$document->setValue('pre_differenceOfPrice_string', num2str_money($_POST['pre_differenceOfPrice'])); 
	$document->setValue('pre_numberOfObremenenie', $_POST['pre_numberOfObremenenie']); 
	$document->setValue('pre_actorOfObremenenie', $_POST['pre_actorOfObremenenie']); 
	$document->setValue('pre_date_of_end_obr', $_POST['pre_date_of_end_obr']); 
	$document->setValue('pre_price_number', $_POST['pre_price']); 
	$document->setValue('pre_price_string', num2str_money($_POST['pre_price'])); 

	$document->setValue('pre_doc', get_doc_osn($_POST['pre_doc_osn1'],$_POST['pre_otherOptionInput1'])); 
	$document->setValue('pre_date_of_doc', $_POST['pre_date_of_doc1']); 

	// Составление блока дополнитеных документов
	if (isset($_POST['pre_doc_osn2']) && isset($_POST['pre_date_of_doc2']))
	{
		$pre_doc_others = '<w:br/>- ' . get_doc_osn($_POST['pre_doc_osn2'],$_POST['pre_otherOptionInput2']) . ' от '. $_POST['pre_date_of_doc2'].'г.';
	}
	if (isset($_POST['pre_doc_osn3']) && isset($_POST['pre_date_of_doc3']))
	{
		$pre_doc_others .= '<w:br/>- ' . get_doc_osn($_POST['pre_doc_osn3'],$_POST['pre_otherOptionInput3']) . ' от '. $_POST['pre_date_of_doc3'].'г.';
	}
	if (isset($_POST['pre_doc_osn4']) && isset($_POST['pre_date_of_doc4']))
	{
		$pre_doc_others .= '<w:br/>- ' . get_doc_osn($_POST['pre_doc_osn4'],$_POST['pre_otherOptionInput4']) . ' от '. $_POST['pre_date_of_doc4'].'г.';
	}
	if (isset($_POST['pre_doc_osn5']) && isset($_POST['pre_date_of_doc5']))
	{
		$pre_doc_others .= '<w:br/>- ' . get_doc_osn($_POST['pre_doc_osn5'],$_POST['pre_otherOptionInput5']) . ' от '. $_POST['pre_date_of_doc5'].'г.';
	}
	if (isset($_POST['pre_doc_osn6']) && isset($_POST['pre_date_of_doc6']))
	{
		$pre_doc_others .= '<w:br/>- ' . get_doc_osn($_POST['pre_doc_osn6'],$_POST['pre_otherOptionInput6']) . ' от '. $_POST['pre_date_of_doc6'].'г.';
	}

	// ------
	$document->setValue('pre_doc_others', $pre_doc_others); 

	//-------------------------------------------------------------------------------------

	$name_of_file = 'files/'. time() .'_pre_dogovor_full.docx';
	setcookie('name_of_doc',$name_of_file);
	$document->save($name_of_file); // Сохранение документа
	
}
// ----------------------------------------------------------------------------------------
// ________________________________________________________________________________________
// ----------------------------------------------------------------------------------------
elseif($_POST['type_doc'] == 'dogovor')
{
	$document = $PHPWord->loadTemplate('dogovor.docx'); //шаблон
	//-------------------------------------------------------------------------------------
	// Дата заключения договора
	$date_of_dogovor = DateTime::createFromFormat('d.m.Y', $_POST['date_of_dogovor']);
	$day_of_dogovor = $date_of_dogovor->format('d');
	$month_of_dogovor= $date_of_dogovor->format('m');
	$year_of_dogovor= $date_of_dogovor->format('Y');
	//-------------------------------------------------------------------------------------
	// Замена переменных
	$document->setValue('city', $_POST['placeOfDogovor']); 
	$document->setValue('dayOfDogovor', get_day_from_number($day_of_dogovor) );//Дата заключения договора: день
	$document->setValue('monthOfDogovor', get_month_from_number($month_of_dogovor) );//Дата заключения договора: месяц
	$document->setValue('year_of_dogovor', get_year_from_number($year_of_dogovor) );//Дата заключения договора: месяц
	$document->setValue('fio_of_vendor', $_POST['fio_of_vendor']);//
	$document->setValue('birthday_of_vendor', $_POST['birthday_of_vendor']);//
	$document->setValue('passport', $_POST['passport']);//

	$document->setValue('sex_vendor_reg', get_sex_reg($_POST['sex_vendor']) );//
	$document->setValue('sex_vendor_im', get_sex_im($_POST['sex_vendor']) );//
	$document->setValue('sex_buyer_reg', get_sex_reg($_POST['sex_buyer']) );//
	$document->setValue('sex_buyer_im', get_sex_im($_POST['sex_buyer']) );//

	$document->setValue('adressOfRegistration_city', $_POST['adressOfRegistration_city']);//
	$document->setValue('adressOfRegistration_street', $_POST['adressOfRegistration_street']);//
	$document->setValue('adressOfRegistration_house', $_POST['adressOfRegistration_house']);//
	$document->setValue('adressOfRegistration_flat', $_POST['adressOfRegistration_flat']);//
	$document->setValue('fio_of_buyer', $_POST['fio_of_buyer']);//
	$document->setValue('birthday_of_buyer', $_POST['birthday_of_buyer']);//
	$document->setValue('passport_of_buyer', $_POST['passport_of_buyer']);//
	$document->setValue('adressOfRegistration_buyer_city', $_POST['adressOfRegistration_buyer_city']);//
	$document->setValue('adressOfRegistration_buyer_street', $_POST['adressOfRegistration_buyer_street']);//
	$document->setValue('adressOfRegistration_buyer_house', $_POST['adressOfRegistration_buyer_house']);//
	$document->setValue('adressOfRegistration_buyer_flat', $_POST['adressOfRegistration_buyer_flat']);//
	$document->setValue('area', $_POST['area']);//
	$document->setValue('area_string', num2str_flat($_POST['area']) );//
	$document->setValue('floor', $_POST['floor']);//
	$document->setValue('flat', get_flat($_POST['flat']) );//
	$document->setValue('adress_city', $_POST['adress_city']);//
	$document->setValue('adress_street', $_POST['adress_street']);//
	$document->setValue('adress_house', $_POST['adress_house']);//
	$document->setValue('adress_house_string', num2str_flat($_POST['adress_house']) );//
	$document->setValue('adress_flat', $_POST['adress_flat']);//
	$document->setValue('adress_flat_string', num2str_flat($_POST['adress_flat']) );//
	$document->setValue('kadastr', $_POST['kadastr']);//
	$document->setValue('date_of_reg_svd', $_POST['date_of_reg_svd']);//
	$document->setValue('svidetelstvo_number', $_POST['svidetelstvo_number']);//
	$document->setValue('svidetelstvo_serial', $_POST['svidetelstvo_serial']);//
	$document->setValue('number_of_serial', $_POST['number_of_serial']);//
	$document->setValue('date_of_reg_svd', $_POST['date_of_reg_svd']);//
	$document->setValue('price', $_POST['price']);//
	$document->setValue('price_string', num2str_money($_POST['price']) );//
	$document->setValue('way_of_act', get_way_of_act() );//
	
	//-------------------------------------------------------------------------------------
	//Блок с выводом документов-оснований//
	//-------------------------------------------------------------------------------------
	$document->setValue('doc_osn', get_doc_osn($_POST['doc_osn1'],$_POST['otherOptionInput1']) );//
	$document->setValue('date_of_doc_osn', $_POST['date_of_doc_osn1']);//

	//Вывод дополнительных документов

	
	if (isset($_POST['doc_osn2']) && isset($_POST['date_of_doc_osn2']) )
	{
		$doc_osn_others =  '<w:br/>- ' . get_doc_osn($_POST['doc_osn2'],$_POST['otherOptionInput2']) . ' от '. $_POST['date_of_doc_osn2'].'г.';
	}
	if (isset($_POST['doc_osn3']) && isset($_POST['date_of_doc_osn3']) )
	{
		$doc_osn_others .=  '<w:br/>- ' . get_doc_osn($_POST['doc_osn3'],$_POST['otherOptionInput3']) . ' от '. $_POST['date_of_doc_osn3'].'г.';
	}
	if (isset($_POST['doc_osn4']) && isset($_POST['date_of_doc_osn4']) )
	{
		$doc_osn_others .=  '<w:br/>- ' . get_doc_osn($_POST['doc_osn4'],$_POST['otherOptionInput4']) . ' от '. $_POST['date_of_doc_osn4'].'г.';
	}
	if (isset($_POST['doc_osn5']) && isset($_POST['date_of_doc_osn5']) )
	{
		$doc_osn_others .=  '<w:br/>- ' . get_doc_osn($_POST['doc_osn5'],$_POST['otherOptionInput5']) . ' от '. $_POST['date_of_doc_osn5'].'г.';
	}
	if (isset($_POST['doc_osn6']) && isset($_POST['date_of_doc_osn6']) )
	{
		$doc_osn_others .=  '<w:br/>- ' . get_doc_osn($_POST['doc_osn6'],$_POST['otherOptionInput6']) . ' от '. $_POST['date_of_doc_osn6'].'г.';
	}
	
	$document->setValue('doc_osn_others', $doc_osn_others );//
	
	
	//-------------------------------------------------------------------------------------

	$name_of_file = 'files/'. time() .'dogovor_full.docx';
	setcookie('name_of_doc',$name_of_file);
	$document->save($name_of_file); // Сохранение документа
}	


// ----------------------------------------------------------------------------------------
// Отправка копии документа на почту
$from = '>Jera<';
$to = $_POST['email'];
$subj = 'Electronic dogovor';
$text = 'Congratz, you have file';
XMail( $from, $to, $subj, $text, $name_of_file); 
// ----------------------------------------------------------------------------------------
// Отправка данных на сервис хранения почты
include 'send_email_to_db.php';
send_email_to_db($to);
// ----------------------------------------------------------------------------------------

?>
<p>На ваш почтовый ящик былло выслано письмо с документом. Вы также можете<a href="download_doc.php">Скачать документ</a></p>
<pre>
<?
/*
echo $pre_doc_others;

echo 'Тип документа:'.$_POST['type_doc'] . '<br>';

var_dump($_POST);*/
?>
</pre>