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
	$document->setValue('dayOfDogovor', $pre_day_of_dogovor);//Дата заключения договора: день
	$document->setValue('monthOfDogovor', $pre_month_of_dogovor);//Дата заключения договора: месяц
	$document->setValue('yearOfDogovor', $pre_year_of_dogovor);//Дата заключения договора: год
	$document->setValue('pre_fio', $_POST['pre_fio']); //ФИО продавца
	$document->setValue('birthday_of_vendor', $_POST['pre_birthday_of_vendor']); //Дата рождения продавца
		
	$document->setValue('pre_passport', $_POST['pre_passport']); 
	$document->setValue('pre_adressOfRegistration', $_POST['pre_adressOfRegistration']); 
	$document->setValue('pre_fio_of_buyer', $_POST['pre_fio_of_buyer']); 
	$document->setValue('pre_birthday_of_buyer', $_POST['pre_birthday_of_buyer']); 
	$document->setValue('pre_passport_of_buyer', $_POST['pre_passport_of_buyer']);
	//Полы 
	$document->setValue('pre_sex_vendor_reg',pre_sex_vendor_reg()); 
	$document->setValue('pre_sex_vendor_im', pre_sex_vendor_im()); 
	$document->setValue('pre_sex_buyer_reg', pre_sex_buyer_reg()); 
	$document->setValue('pre_sex_buyer_im', pre_sex_buyer_im()); 

	$document->setValue('pre_adressOfRegistration_buyer', $_POST['pre_adressOfRegistration_buyer']); 
	$document->setValue('pre_date_of_main_dogovor', $_POST['pre_date_of_main_dogovor']);//Дата заключения основного договора
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
	$document->setValue('pre_date_of_doc', $_POST['pre_date_of_doc']); 
	
	$document->setValue('pre_svidetelstvo_data', $_POST['pre_svidetelstvo_data']); 
	$document->setValue('pre_svidetelstvo_number', $_POST['pre_svidetelstvo_number']); 
	$document->setValue('pre_svidetelstvo_serial', $_POST['pre_svidetelstvo_serial']); 
	$document->setValue('pre_pricePrimary', $_POST['pre_pricePrimary']); 
	$document->setValue('pre_pricePrimary_string', num2str_money($_POST['pre_pricePrimary'])); //не забыть перевести в строку 
	$document->setValue('pre_date_of_reg_obr', $_POST['pre_date_of_reg_obr']); 
	$document->setValue('pre_differenceOfPrice', $_POST['pre_differenceOfPrice']); 
	$document->setValue('pre_differenceOfPrice_string', num2str_money($_POST['pre_differenceOfPrice'])); 
	$document->setValue('pre_numberOfObremenenie', $_POST['pre_numberOfObremenenie']); 
	$document->setValue('pre_actorOfObremenenie', $_POST['pre_actorOfObremenenie']); 
	$document->setValue('pre_date_of_end_obr', $_POST['pre_date_of_end_obr']); 
	$document->setValue('pre_price_number', $_POST['pre_price']); 
	$document->setValue('pre_price_string', num2str_money($_POST['pre_price'])); // Не забыть про перевод в строку с числа.
	// Составление блока дополнитеных документов
	if (isset($_POST['pre_otherOptionInput2']) && isset($_POST['pre_date_of_doc2']))
		$pre_doc_others =  '<w:br/>' . $_POST['pre_otherOptionInput2'] . 'от '. $_POST['pre_date_of_doc2'];
	if (isset($_POST['pre_otherOptionInput3']) && isset($_POST['pre_date_of_doc3']))
		$pre_doc_others .=  '<w:br/>' . $_POST['pre_otherOptionInput3'] . 'от '. $_POST['pre_date_of_doc3'];
	if (isset($_POST['pre_otherOptionInput4']) && isset($_POST['pre_date_of_doc4']))
		$pre_doc_others .=  '<w:br/>' . $_POST['pre_otherOptionInput4'] . 'от '. $_POST['pre_date_of_doc4'];
	if (isset($_POST['pre_otherOptionInput5']) && isset($_POST['pre_date_of_doc5']))
		$pre_doc_others .=  '<w:br/>' . $_POST['pre_otherOptionInput5'] . 'от '. $_POST['pre_date_of_doc5'];
	if (isset($_POST['pre_otherOptionInput6']) && isset($_POST['pre_date_of_doc6']))
		$pre_doc_others .=  '<w:br/>' . $_POST['pre_otherOptionInput6'] . 'от '. $_POST['pre_date_of_doc6'];

	$document->setValue('pre_price_number', $pre_doc_others); 

	//-------------------------------------------------------------------------------------

	$name_of_file = time() .'_pre_dogovor_full.docx';
	setcookie('name_of_doc',$name_of_file);
	$document->save($name_of_file); // Сохранение документа
	
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
$from = '>Jera<';
$to = $_POST['email'];
$subj = 'Electronic dogovor';
$text = 'Congratz, you have file';
XMail( $from, $to, $subj, $text, $name_of_file); 
// ----------------------------------------------------------------------------------------
?>
<p>На ваш почтовый ящик былло выслано письмо с документом. Вы также можете<a href="download_doc.php">Скачать документ</a></p>
<pre>
<?
echo $pre_doc_others;
print_r($_POST['pre_date_of_dogovor']);
echo 'Тип документа:'.$_POST['type_doc'] . '<br>';

var_dump($_POST);
?>
</pre>