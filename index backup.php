<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Конструктор договоров купли-продажи квартиры</title>

    <!-- Bootstrap -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker3.min.css" rel="stylesheet">

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/bootstrap-datepicker.js"></script>
   <script src="locales/bootstrap-datepicker.ru.min.js"></script>
   <!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.0.2/js/bootstrap-datepicker.min.js"></script>-->

    <!-- Include all compiled plugins (below), or include individual files as needed -->

   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <script type="text/javascript">

  	$(document).ready(function(){

  		// -------------------------------------------------------------------------------
	   	$("#pre_pact").bind("change click", function () {
		   	  $('#pre_myModalCheck').modal();
		   	 
		});
  		// -------------------------------------------------------------------------------
		$("#pre_confirm_button").bind("change click", function () {
	   	 	$("#pre_pact_text").show();
		   	$('#pre_vend_and_buyer_block').show();
		   	$('#pre_bot_btn').show();
		   	$("html, body").delay(420).animate({scrollTop: $('#pre_pact_text').offset().top }, 420);
	   	});
  		// -------------------------------------------------------------------------------
		$("#dogovor_pact").bind("change click", function () {
	   	  $('#dogovor_myModalCheck').modal();
	   	  $("#pact-text").show();
	   	  
		});

  		// -------------------------------------------------------------------------------
		$('.pre_newDoc').click(function()
		{
			var i;
			var doc_example='<div class="doc-example'+i+'"><hr><label for="doc'+i+'">Документы-основания</label><select name="pre_doc'+i+'" onchange="otherOptionForDinamic(this)"><option value="kuplya">Договор купли-продажи</option><option value="darenie">Договор дарения</option><option value="meni">Договор мены</option><option value="spavka">Справка ЖСК о выплаченном пае</option><option value="other">Иное</option></select><div id="bl'+i+'" style="display:none;"><input type="text" name="pre_otherOptionInput" value="" class="form-control" placeholder="введите название документа"></div></div><div class="form-group"><label for="">Дата документа</label><br><label for="dayOfDoc">День</label><select name="pre_dayOfDoc"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select><label for="monthOfDoc">Месяц</label><select name="pre_monthOfDoc"><option>января</option><option>февраля</option><option>марта</option><option>апреля</option><option>мая</option><option>июня</option><option>июля</option><option>августа</option><option>сентября</option><option>октября</option><option>ноября</option><option>декабря</option></select><label for="yearOfDoc">Год</label><select name="pre_yearOfDoc"><option>2000</option><option>2001</option><option>2002</option><option>2003</option><option>2004</option><option>2005</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option selected >2015</option><option>2016</option></select></div></div>';
			$(".pre_docPlus").append(doc_example);
			i++;
		});
  		// -------------------------------------------------------------------------------
		$('.newDoc').click(function()
		{
			var i;
			var doc_example='<div class="doc-example'+i+'"><hr><label for="doc'+i+'">Документы-основания</label><select name="doc'+i+'" onchange="otherOptionForDinamic(this)"><option value="kuplya">Договор купли-продажи</option><option value="darenie">Договор дарения</option><option value="meni">Договор мены</option><option value="spavka">Справка ЖСК о выплаченном пае</option><option value="other">Иное</option></select><div id="bl'+i+'" style="display:none;"><input type="text" name="otherOptionInput" value="" class="form-control" placeholder="введите название документа"></div></div><div class="form-group"><label for="">Дата документа</label><br><label for="dayOfDoc">День</label><select name="dayOfDoc"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select><label for="monthOfDoc">Месяц</label><select name="monthOfDoc"><option>января</option><option>февраля</option><option>марта</option><option>апреля</option><option>мая</option><option>июня</option><option>июля</option><option>августа</option><option>сентября</option><option>октября</option><option>ноября</option><option>декабря</option></select><label for="yearOfDoc">Год</label><select name="yearOfDoc"><option>2000</option><option>2001</option><option>2002</option><option>2003</option><option>2004</option><option>2005</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option selected >2015</option><option>2016</option></select></div></div>';
			$(".docPlus").append(doc_example);
			i++;
		});
		
  		// -------------------------------------------------------------------------------
		$('#buttonPrint').click(function(){
			
			$('#printDogovorForm').modal();
		});
  		// -------------------------------------------------------------------------------
		$('#pre_buttonPrint').click(function(){
			
			$('#pre_printDogovorForm').modal();
		});
  		// -------------------------------------------------------------------------------
  		$('#pre_buttonEndOfTimes').click(function(){
  			document.pre_mainForm.submit();
  		});
  		// -------------------------------------------------------------------------------
  		$('#buttonEndOfTimes').click(function(){
  			document.mainForm.submit();
  		});
  		// -------------------------------------------------------------------------------
  		// Дэйтпикеры
  		// -------------------------------------------------------------------------------

  		$('#pre_dayOfDogor .input-group.date').datepicker({
    	language: "ru",
    	autoclose: true,
    	todayHighlight: true
		});
  		// -------------------------------------------------------------------------------
  		$('#pre_cal_date_of_main_dogovor .input-group.date').datepicker({
    	language: "ru",
    	autoclose: true,
    	todayHighlight: true
		});
  		// -------------------------------------------------------------------------------
  		$('#pre_cal_birthday_of_vendor .input-group.date').datepicker({
    	language: "ru",
    	autoclose: true,
    	todayHighlight: true
		});			
  		// -------------------------------------------------------------------------------
  		$('#pre_cal_date_of_reg_obr .input-group.date').datepicker({
    	language: "ru",
    	autoclose: true,
    	todayHighlight: true
		});
  		// -------------------------------------------------------------------------------
  		$('#pre_cal_date_of_end_obr .input-group.date').datepicker({
    	language: "ru",
    	autoclose: true,
    	todayHighlight: true
		});
  		// -------------------------------------------------------------------------------
  		$('#pre_cal_svidetelstvo_data .input-group.date').datepicker({
    	language: "ru",
    	autoclose: true,
    	todayHighlight: true
		});
  		// -------------------------------------------------------------------------------
  		$('#pre_cal_birthday_of_buyer .input-group.date').datepicker({
    	language: "ru",
    	autoclose: true,
    	todayHighlight: true
		});
  		// -------------------------------------------------------------------------------
  		// -------------------------------------------------------------------------------

	});
//----------------------------------------------------------------------------------------
		function pre_otherOption(sel){
		  		if(sel.options[sel.selectedIndex].value == "other") 
		    	 	document.getElementById("pre_bl").style.display = 'block'; 
		   		 else 
		     		document.getElementById("pre_bl").style.display = 'none';
		     };
//----------------------------------------------------------------------------------------
		function pre_otherOptionForDinamic(sel){
			var i;
		  		if(sel.options[sel.selectedIndex].value == "other") 
		    	 	document.getElementById("pre_bl"+i).style.display = 'block'; 
		   		 else 
		     		document.getElementById("pre_bl"+i).style.display = 'none';
		     	i++;
		     };
//----------------------------------------------------------------------------------------
		function otherOption(sel){
		  		if(sel.options[sel.selectedIndex].value == "other") 
		    	 	document.getElementById("bl").style.display = 'block'; 
		   		 else 
		     		document.getElementById("bl").style.display = 'none';
		     };
//----------------------------------------------------------------------------------------
		function otherOptionForDinamic(sel){
			var i;
		  		if(sel.options[sel.selectedIndex].value == "other") 
		    	 	document.getElementById("bl"+i).style.display = 'block'; 
		   		 else 
		     		document.getElementById("bl"+i).style.display = 'none';
		     	i++;
		     };
		
//----------------------------------------------------------------------------------------
		function pre_showObremenenie(){
			document.getElementById("pre_obremenenie_form").style.display = 'block';
		};
//----------------------------------------------------------------------------------------
		function pre_hideObremenenie(){
			document.getElementById("pre_obremenenie_form").style.display = 'none';
		};
//----------------------------------------------------------------------------------------
		function showDogovor(){
			document.getElementById("dogovor").style.display = 'block';
			document.getElementById("pre_dogovor").style.display = 'none';
			document.getElementById("bot_btn").style.display = 'block';
			
		};
//----------------------------------------------------------------------------------------
		function showPreDogovor(){
			document.getElementById("pre_dogovor").style.display = 'block';
			document.getElementById("dogovor").style.display = 'none';
							
		};
//----------------------------------------------------------------------------------------
		
			

  </script>
  <body>
  	<div class="container-fluid">
  	
  	<!-- Header -->
  	<div class="row">
  		<div class="col-md-12">
    		<h1 class="text-center">Конструктор договоров купли-продажи квартиры</h1>
    		<p class="lead">Настоящий конструктор договоров является бесплатным сервисом, который поможет вам самостоятельно составить юридически верный договор купли-продажи квартиры или предварительный договор купли-продажи. </p>
    	</div>
    </div>
    <!-- /Header -->
	<!-- Choose type of dogovor -->
    <div class="row">
    	<div class="col-md-12">
    	 <!-- Global form -->
	 	   	<div class="panel panel-primary ">
				<div class="panel-heading">
	            	<h3 class="panel-title">Выберите тип договора</h3>
	            </div>
	      		<div class="panel-body">
	      			<div class="form-group">
	          	 		<input type="radio" name="type_doc_radio" value="pre_dogovor" onclick="showPreDogovor()">Предварительный договор купли-продажи квартиры
	          	 	</div>
	    			<div class="form-group">
	    				<input type="radio" name="type_doc_radio" value="dogovor" onclick="showDogovor()">Договор купли-продажи квартиры
	    			</div>

	       		</div>
       		</div>
    	
    	</div>
    </div>
    </form>
    <!-- /Choose type of dogovor -->

    <!-- Pre-dogovor -->
    <!-- Osnova -->
    <div id ="pre_dogovor" style="display:none">
	<form class="" method="post" action="/convert.php" name="pre_mainForm">
	<input type="hidden" value="pre_dogovor" name="type_doc">
     <div class="row">
    	<div class="col-md-12">
    			<div class="panel panel-primary ">
    				<div class="panel-heading">
		              <h3 class="panel-title">Основные условия заключения предварительного договора купли-продажи квартиры</h3>
		            </div>
    			
    			 <div class="panel-body">
    			 	<div class="form-group">
		        		<label for="pre_placeOfDogovor">Место заключения договора</label>
		        		<input name="pre_placeOfDogovor"type="text" class="form-control" id=""  placeholder="название города">
		        	</div>
		        	<div class="form-group">
		        		<label for="">Дата заключения договора</label><br>
		        		<div id="pre_dayOfDogor">
			        		<div class="input-group date">
							  <input type="text" class="form-control" name="pre_date_of_dogovor" placeholder="кликните чтобы выбрать..."><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
							</div>
						</div>
		            </div>

		        	<div class="form-group">
		        		<label for="pre_price">Цена договора</label>
		        		<input name="pre_price" type="number" class="form-control" id=""  placeholder="цена">
		        	
		        	</div>
		        	<div class="form-group">
		        		<label for="pre_flat">Количество комнат</label>
		        		<select name="pre_flat">
		        			<option>однокомнатная</option>
		        			<option>двухкомнатная</option>
		        			<option>трехкомнатная</option>
		        			<option>четырехкмонатная</option>
		        		</select>
		        	</div>
		        	<div class="form-group">
		        	<label for="pre_floor">Этаж</label>
		        	<select name="pre_floor">
		        			<option>1</option>
		        			<option>2</option>
		        			<option>3</option>
		        			<option>4</option>
		        			<option>5</option>
		        			<option>6</option>
		        			<option>7</option>
		        			<option>8</option>
		        			<option>9</option>
		        			<option>10</option>
		        			<option>11</option>
		        			<option>12</option>
		        			<option>13</option>
		        			<option>14</option>
		        			<option>15</option>
		        			<option>16</option>
		        			<option>17</option>
		        			<option>18</option>
		        			<option>19</option>
		        			<option>20</option>
		        			<option>21</option>
		        			<option>22</option>
		        			<option>23</option>
		        			<option>24</option>
		        			<option>25</option>
		        			<option>26</option>
		        			<option>27</option>
		        			<option>28</option>
		        			<option>29</option>
		        			<option>30</option>
		        	</select>
		        	</div>
		        	<div class="form-group">
		        		<label for="pre_area">Общая площадь(в кв. метрах)</label>
		        		<input name="pre_area" type="text" class="form-control" id=""  placeholder=" площадь">
		          	</div>
		          	<div class="form-group">
		        		<label for="pre_adress">Адрес объекта</label>
		        		<input name="pre_adress" type="text" class="form-control" id=""  placeholder="город, улица/проспект">
		        		Дом №
		        		<input name="pre_adress_house" type="text" class="form-control" id=""  placeholder="номер дома">
		        		Квартира №
		        		<input name="pre_adress_flat" type="text" class="form-control" id=""  placeholder="номер квартиры">
		          	</div>
		          	<div class="form-group">
		        		<label for="pre_kadastr">Кадастровый (условный) номер</label>
		        		<input name="pre_kadastr" type="text" class="form-control" id=""  placeholder="номер">
		          	</div>
		          	<div class="form-group">
		        		<label for="">Дата заключения основного договора</label><br>
						<div id="pre_cal_date_of_main_dogovor">
			        		<div class="input-group date">
							  <input type="text" class="form-control" name="pre_date_of_main_dogovor" placeholder="кликните чтобы выбрать..."><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
							</div>
						</div>
		        	</div>
		        		<div class="form-group">
			        		<label for="pre_pricePrimary">Первоначальная оплата (задаток)</label>
			        		<input name="pre_pricePrimary" type="number" class="form-control" id=""  placeholder="">
			        	</div>
			        	<div class="form-group">
			        		<label for="pre_differenceOfPrice">Разница между предоплатой и задатком</label>
			        		<input name="pre_differenceOfPrice" type="number" class="form-control" id=""  placeholder="">
			        	</div>
			        	<!-- Obremenenie -->
			        	<div class="form-group">
			        		<label for="obremeneie">Обременение</label>
			        		<input type="radio" name="pre_obremeneie" value="yes" onclick="pre_showObremenenie()">есть
        					<input type="radio" name="pre_obremeneie" value="no" onclick="pre_hideObremenenie()">нет
			        	</div>
			        	<div id="pre_obremenenie_form" style="display:none">
				        	<div class="form-group">
				        		<label for="pre_actorOfObremenenie">В пользу кого обременение</label>
	        					<input name="pre_actorOfObremenenie"type="text" class="form-control" id=""  placeholder="наименование">
				        	</div>
				        	<div class="form-group">
			        		<label for="">Дата регистрации обременения согласно сведениям из ЕГРП</label><br>
				        		<div id="pre_cal_date_of_reg_obr">
				        		<div class="input-group date">
								  <input type="text" class="form-control" name="pre_date_of_reg_obr"  placeholder="кликните чтобы выбрать..."><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
								</div>
								</div>
							</div>
			        		<div class="form-group">
				        		<label for="pre_numberOfObremenenie">Номер регистрационной записи обременения</label>
	        					<input name="pre_numberOfObremenenie"type="text" class="form-control" id="" placeholder="номер">
				        	</div>
							<div class="form-group">
			        		<label for="pre_dayOfEnd">До какой даты Продавец снимет обременение</label><br>
			        		<div id="pre_cal_date_of_end_obr">
				        		<div class="input-group date">
								  <input type="text" class="form-control" name="pre_date_of_end_obr" placeholder="кликните чтобы выбрать..."><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
								</div>			        		
			        		</div>
			        		</div>
						</div>
    			 </div>
  	  		</div>
		</div>
    </div>
    <!-- Соглашение -->
    <div class="row">
    	<div class="col-md-12">
    		<input type="checkbox" id="pre_pact">Заполнить персональные данные сторон и адрес объекта
    		<div class="panel panel-primary" id="pre_pact_text" style="display:none">
    			<div class="panel-body">
    				<p>Персональные данные, указанные Вами в конструкторе договора на нашем сайте, недоступны другим пользователям, и используются для генерации видимого только Вам текста договора. Данные передаются через защищенное шифрованием соединение, что подтверждает SSL сертификат Thawte. Мы уделяем серьезное внимание информационной безопасности наших серверов и конфиденциальности персональных данных наших клиентов.</p>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- Modal -->
	<div class="modal fade" id="pre_myModalCheck" tabindex="-1" role="dialog" aria-labelledby="pre_myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="pre_myModalLabel">Обработка персональнх данных</h4>
	      </div>
	      <div class="modal-body"> <!-- Пофиксиить текст под заказчика-->
	        Настоящим я даю разрешение ООО «Электронный риэлтор» (ОГРН 1127746683789) получать, систематизировать, накапливать, хранить, уточнять (обновлять, изменять) и иным образом обрабатывать мои персональные данные, размещаемые мною на сайте parari.ru.


				Целями обработки персональных данных могут быть:

				1. Генерация, по моему запросу, текста договора найма жилого помещения, для использования в моих частных интересах, и не подлежащего распространению в необезличенном виде.

				2. Обеспечение возможности обратной связи с администрацией сайта parari.ru. Согласие дается на срок размещения персональных данных на Сайте.


				Я подтверждаю, что разрешаю ООО «Электронный риэлтор» направлять мне корреспонденцию на указанный мной адрес электронной почты и\или на указанный мной номер телефона.


				Я уведомлен (-а), что после размещения на Сайте персональные данные хранятся в заблокированном виде до прекращения деятельности ООО «Электронный риэлтор» как юридического лица для их возможного анализа на предмет мошенничества Пользователя в отношении третьих лиц. При этом ООО «Электронный риэлтор» не удаляет персональные данные по запросу Пользователя, основываясь на п.5 ст.21 Федерального Закона №152-ФЗ «О персональных данных».
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="pre_confirm_button">Согласен/Согласна</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Продавец-->
	<div id="pre_vend_and_buyer_block" style="display:none">
	<div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-primary ">
				<div class="panel-heading">
	           	 	<h3 class="panel-title">ПРОДАВЕЦ</h3>
	         	 </div>
	            	<div class="panel-body">
	      				<div class="form-group">
	      					<label for="pre_sex">Пол продавца</label>
			        		<input type="radio" name="pre_sex_vendor" value="male">М
			        		<input type="radio" name="pre_sex_vendor" value="female">Ж
	      				</div>
	      				<div class="form-group">
	      					<label for="pre_fio">ФИО</label>
        					<input name="pre_fio" type="text" class="form-control" id=""  placeholder="Иванов Иван Иванович">
	      				</div>
	      				
	      				<div class="form-group">
			        		<label for="">Дата рождения</label><br>
			        		<div id="pre_cal_birthday_of_vendor">
				        		<div class="input-group date">
								  <input type="text" class="form-control" name="pre_birthday_of_vendor" placeholder="кликните чтобы выбрать..."><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
								</div>
							</div>
			        	</div>
	      				<div class="form-group">
	      					<label for="pre_passport">Паспорт</label>
        					<input name="pre_passport" type="text" class="form-control" id=""  placeholder="серия, номер, кем выдан, дата выдачи ">
	      				</div>
	      				<div class="form-group">
	      					<label for="pre_adressOfRegistration">Адрес регистрации</label>
        					<input name="pre_adressOfRegistration" type="text" class="form-control" id=""  placeholder="город, улица, номер дома, номер квартиры ">
	      				</div>
	      				<br>
	      				<div class="form-group">
	      				<h3 class="panel-title" >Документы, подтверждающие право собственности на отчуждаемый объект</h3>
	      				<div class="pre-doc-example"><hr>
		      				<label for="pre_doc">Документы-основания</label>
				        		<select name="pre_doc" onchange="pre_otherOption(this);">
				        			<option value="kuplya">Договор купли-продажи</option>
				        			<option value="darenie">Договор дарения</option>
				        			<option value="meni">Договор мены</option>
				        			<option value="spavka">Справка ЖСК о выплаченном пае</option>
				        			<option value="other">Иное</option>
				        		</select>
		            		<div id="pre_bl" style="display:none;"><input type="text" name="pre_otherOptionInput" value="" class="form-control" placeholder="введите название документа"></div>
		      			</div>
		      			</div>
		      				<div class="form-group">
				        		<label for="">Дата документа</label><br>
				        		<input name="pre_date_of_doc" type="text" class="form-control" id=""  placeholder="дд.мм.гггг">
				        	</div>
				        	<button type="button" class="btn btn-primary pre_newDoc">Добавить документ-основание</button>
			        	<div class="form-group pre_docPlus">	      					
	      				</div>
	      				<div class="form-group">
	      					<label for="pre_svidetelstvo">Свидетельство о регистрации права собственности</label><br>Дата
        					<div id="pre_cal_svidetelstvo_data">
				        		<div class="input-group date">
								  <input type="text" class="form-control" name="pre_svidetelstvo_data" placeholder="кликните чтобы выбрать..."><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
								</div>
							</div>Серия
        					<input name="pre_svidetelstvo_serial" type="text" class="form-control" id=""  placeholder="серия">Номер
        					№<input name="pre_svidetelstvo_number" type="text" class="form-control" id=""  placeholder="номер">
	      				</div>
	      				<div class="form-group">
	      					<label for="pre_svidetelstvo">Запись о регистрации №</label>
        					<input name="pre_svidetelstvo_number" type="number" class="form-control" id=""  placeholder="номер записи">
	      				</div>

	      			</div>
	             </div>	 
	         
	    </div>
    </div>
    <!-- Покупатель -->
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-primary ">
					<div class="panel-heading">
	            	 	<h3 class="panel-title">ПОКУПАТЕЛЬ</h3>
	            	 </div>
	            	 		<div class="panel-body">
	      						<div class="form-group">
	      							<label for="pre_sex_buyer">Пол покупателя</label>
			        				<input type="radio" name="pre_sex_buyer" value="male">М
			        				<input type="radio" name="pre_sex_buyer" value="female">Ж
			        			</div>
			        			<div class="form-group">
	      							<label for="pre_fio_of_buyer">ФИО</label>
        							<input name="pre_fio_of_buyer" type="text" class="form-control" id=""  placeholder="Иванов Иван Иванович">
	      						</div>
			      				<div class="form-group">
					        		<label for="">Дата рождения</label><br>
								    <div id="pre_cal_birthday_of_buyer">
						        		<div class="input-group date">
										  <input type="text" class="form-control" name="pre_birthday_of_buyer" placeholder="кликните чтобы выбрать..."><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
										</div>
									</div>
					        	</div>
			      				<div class="form-group">
			      					<label for="pre_passport_of_buyer">Паспорт</label>
		        					<input name="pre_passport_of_buyer" type="text" class="form-control" id=""  placeholder="серия, номер, кем выдан, дата выдачи ">
			      				</div>
			      				<div class="form-group">
			      					<label for="pre_adressOfRegistration_buyer">Адрес регистрации</label>
		        					<input name="pre_adressOfRegistration_buyer" type="text" class="form-control" id=""  placeholder="город, улица, номер дома, номер квартиры ">

			      				</div>

	      				</div>
	             </div>
	        </div>
    	</div>
	</div>

<div class="row" id="pre_bot_btn" style="display:none">
		<div class="col-md-12">
			<div id = "pre_buttonPrint" class="btn btn-primary">Распечатать договор</div>
		</div>
 </div>
	
   

</div><!--Закрывает блок для скрытия продавца и покупателя -->
<!-- Модальное окно с эмаил -->
<div class="modal fade" id="pre_printDogovorForm" tabindex="-1" role="dialog" aria-labelledby="pre_printLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="pre_printLabel">Распечать договор</h4>
	      </div>
	      <div class="modal-body">
	      
					<!-- <form method="post" action="/convert.php" name="pre_emailForm">-->
			      	<label for="email">Введите ваш e-mail</label>
		        	<input name="email" type="text" class="form-control" id=""  placeholder="почта@почта.почта">
		        	<p>*На указанный адрес мы вышлем копию договора. В случае необходимости вы всегда можете его отредактировать и сохранить. При закрытии этой страницы все введенные данные не сохраняются.</p>
			   		<!--</form>-->
	      </div>
	      <div class="modal-footer">
	        <button id = "pre_buttonEndOfTimes" class="btn btn-primary">Распечатать договор</button>
		  </div>
	    </div>
	  </div>
	</div>

</form> 

<!-- /Pre-dogovor -->

    <!-- Dogovor -->
    <div id="dogovor" style="display:none">
	<form class="" method="post" action="/convert.php" name="mainForm">
	<input type="hidden" value="dogovor" name="type_doc">

    <!-- Osnova -->
      <div class="row">
    	<div class="col-md-12">
    	
 	   	<div class="panel panel-primary ">
			<div class="panel-heading">
              <h3 class="panel-title">Основные условия заключения договора купли-продажи квартиры</h3>
            </div>
        <div class="panel-body">
        	<div class="form-group">
        		<label for="placeOfDogovor">Место заключения договора</label>
        		<input name="placeOfDogovor"type="text" class="form-control" id=""  placeholder="название города">
        	</div>
        	<div class="form-group">
        		<label for="">Дата заключения договора</label><br>
        		<label for="dayOfDogovor">День</label>
        		<select name="dayOfDogovor">
        			<option>1</option>
        			<option>2</option>
        			<option>3</option>
        			<option>4</option>
        			<option>5</option>
        			<option>6</option>
        			<option>7</option>
        			<option>8</option>
        			<option>9</option>
        			<option>10</option>
        			<option>11</option>
        			<option>12</option>
        			<option>13</option>
        			<option>14</option>
        			<option>15</option>
        			<option>16</option>
        			<option>17</option>
        			<option>18</option>
        			<option>19</option>
        			<option>20</option>
        			<option>21</option>
        			<option>22</option>
        			<option>23</option>
        			<option>24</option>
        			<option>25</option>
        			<option>26</option>
        			<option>27</option>
        			<option>28</option>
        			<option>29</option>
        			<option>30</option>
        			<option>31</option>
        		</select>
        		<label for="monthOfDogovor">Месяц</label>
        		<select name="monthOfDogovor">
        			<option>января</option>
        			<option>февраля</option>
        			<option>марта</option>
        			<option>апреля</option>
        			<option>мая</option>
        			<option>июня</option>
        			<option>июля</option>
        			<option>августа</option>
        			<option>сентября</option>
        			<option>октября</option>
        			<option>ноября</option>
        			<option>декабря</option>
        		</select>
        		<label for="yearOfDogovor">Год</label>
        		<select name="yearOfDogovor">
        			<option>2000</option>
        			<option>2001</option>
        			<option>2002</option>
        			<option>2003</option>
        			<option>2004</option>
        			<option>2005</option>
        			<option>2007</option>
        			<option>2008</option>
        			<option>2009</option>
        			<option>2010</option>
        			<option>2011</option>
        			<option>2012</option>
        			<option>2013</option>
        			<option>2014</option>
        			<option>2015</option>
        			<option>2016</option>
        			</select>
        		</div>

        	<div class="form-group">
        		<label for="price">Цена договора</label>
        		<input name="price" type="number" class="form-control" id=""  placeholder="цена">
        	
        	</div>
        	<div class="form-group">
        		<label for="flat">Количество комнат</label>
        		<select name="flat">
        			<option>однокомнатная</option>
        			<option>двухкомнатная</option>
        			<option>трехкомнатная</option>
        			<option>четырехкмонатная</option>
        		</select>
        	</div>
        	<div class="form-group">
        	<label for="floor">Этаж</label>
        	<select name="floor">
        			<option>1</option>
        			<option>2</option>
        			<option>3</option>
        			<option>4</option>
        			<option>5</option>
        			<option>6</option>
        			<option>7</option>
        			<option>8</option>
        			<option>9</option>
        			<option>10</option>
        			<option>11</option>
        			<option>12</option>
        			<option>13</option>
        			<option>14</option>
        			<option>15</option>
        			<option>16</option>
        			<option>17</option>
        			<option>18</option>
        			<option>19</option>
        			<option>20</option>
        			<option>21</option>
        			<option>22</option>
        			<option>23</option>
        			<option>24</option>
        			<option>25</option>
        			<option>26</option>
        			<option>27</option>
        			<option>28</option>
        			<option>29</option>
        			<option>30</option>
        	</select>
        	</div>
        	<div class="form-group">
        		<label for="area">Общая площадь(в кв. метрах)</label>
        		<input name="area" type="text" class="form-control" id=""  placeholder="площадь">
          	</div>
          	<div class="form-group">
        		<label for="adress">Адрес объекта</label>
        		<input name="adress" type="text" class="form-control" id=""  placeholder="город, улица/проспект, номер дома, номер квартиры">
          	</div>
          	<div class="form-group">
        		<label for="kadastr">Кадастровый (условный) номер</label>
        		<input name="kadastr" type="text" class="form-control" id=""  placeholder="номер">
          	</div>
          	<div class="form-group">
        		<label for="act">Передаточный акт</label>
        		<input type="radio" name="act" value="yes">Да
        		<input type="radio" name="act" value="no">Нет
          	</div>
        </div>
    
    	</div>
    </div>
    </div>
    
    <!-- Соглашение -->
    <div class="row">
    	<div class="col-md-12">
    		<input type="checkbox" id="dogovor_pact">Заполнить персональные данные сторон и адрес объекта
    		<div class="panel panel-primary" id="pact-text" style="display:none">
    			<div class="panel-body">
    			<p>Персональные данные, указанные Вами в конструкторе договора на нашем сайте, недоступны другим пользователям, и используются для генерации видимого только Вам текста договора. Данные передаются через защищенное шифрованием соединение, что подтверждает SSL сертификат Thawte. Мы уделяем серьезное внимание информационной безопасности наших серверов и конфиденциальности персональных данных наших клиентов.</p>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- Modal -->
	<div class="modal fade" id="dogovor_myModalCheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Обработка персональнх данных</h4>
	      </div>
	      <div class="modal-body"> <!-- Пофиксиить текст под заказчика-->
	        Настоящим я даю разрешение ООО «Электронный риэлтор» (ОГРН 1127746683789) получать, систематизировать, накапливать, хранить, уточнять (обновлять, изменять) и иным образом обрабатывать мои персональные данные, размещаемые мною на сайте parari.ru.


				Целями обработки персональных данных могут быть:

				1. Генерация, по моему запросу, текста договора найма жилого помещения, для использования в моих частных интересах, и не подлежащего распространению в необезличенном виде.

				2. Обеспечение возможности обратной связи с администрацией сайта parari.ru. Согласие дается на срок размещения персональных данных на Сайте.


				Я подтверждаю, что разрешаю ООО «Электронный риэлтор» направлять мне корреспонденцию на указанный мной адрес электронной почты и\или на указанный мной номер телефона.


				Я уведомлен (-а), что после размещения на Сайте персональные данные хранятся в заблокированном виде до прекращения деятельности ООО «Электронный риэлтор» как юридического лица для их возможного анализа на предмет мошенничества Пользователя в отношении третьих лиц. При этом ООО «Электронный риэлтор» не удаляет персональные данные по запросу Пользователя, основываясь на п.5 ст.21 Федерального Закона №152-ФЗ «О персональных данных».
	      </div>
	      <div class="modal-footer">
	        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
	        <button type="button" class="btn btn-primary" data-dismiss="modal" >Согласен/Согласна</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Пролавец-->
	<div class="row">
    	<div class="col-md-12">
    		
	 	  	 	<div class="panel panel-primary ">
					<div class="panel-heading">
	            	 	<h3 class="panel-title">ПРОДАВЕЦ</h3>
	            	 </div>
	            	 <div class="panel-body">
	      				<div class="form-group">
	      					<label for="sex">Пол продавца</label>
			        		<input type="radio" name="sex" value="male">М
			        		<input type="radio" name="sex" value="female">Ж
	      				</div>
	      				<div class="form-group">
	      					<label for="fio">ФИО</label>
        					<input name="fio" type="text" class="form-control" id=""  placeholder="Иванов Иван Иванович">
	      				</div>
	      				
	      				<div class="form-group">
			        		<label for="">Дата рождения</label><br>
			        		<label for="dayOfB">День</label>
			        		<select name="dayOfB">
			        			<option>1</option>
			        			<option>2</option>
			        			<option>3</option>
			        			<option>4</option>
			        			<option>5</option>
			        			<option>6</option>
			        			<option>7</option>
			        			<option>8</option>
			        			<option>9</option>
			        			<option>10</option>
			        			<option>11</option>
			        			<option>12</option>
			        			<option>13</option>
			        			<option>14</option>
			        			<option>15</option>
			        			<option>16</option>
			        			<option>17</option>
			        			<option>18</option>
			        			<option>19</option>
			        			<option>20</option>
			        			<option>21</option>
			        			<option>22</option>
			        			<option>23</option>
			        			<option>24</option>
			        			<option>25</option>
			        			<option>26</option>
			        			<option>27</option>
			        			<option>28</option>
			        			<option>29</option>
			        			<option>30</option>
			        			<option>31</option>
			        		</select>
			        		<label for="monthOfB">Месяц</label>
			        		<select name="monthOfB">
			        			<option>января</option>
			        			<option>февраля</option>
			        			<option>марта</option>
			        			<option>апреля</option>
			        			<option>мая</option>
			        			<option>июня</option>
			        			<option>июля</option>
			        			<option>августа</option>
			        			<option>сентября</option>
			        			<option>октября</option>
			        			<option>ноября</option>
			        			<option>декабря</option>
			        		</select>
			        		<label for="yearOfB">Год</label>
			        		<select name="yearOfB">
			        			<option>2000</option>
			        			<option>2001</option>
			        			<option>2002</option>
			        			<option>2003</option>
			        			<option>2004</option>
			        			<option>2005</option>
			        			<option>2007</option>
			        			<option>2008</option>
			        			<option>2009</option>
			        			<option>2010</option>
			        			<option>2011</option>
			        			<option>2012</option>
			        			<option>2013</option>
			        			<option>2014</option>
			        			<option>2015</option>
			        			<option>2016</option>
			        		</select>
			        	</div>
	      				<div class="form-group">
	      					<label for="passport">Паспорт</label>
        					<input name="passport" type="text" class="form-control" id=""  placeholder="серия, номер, кем выдан, дата выдачи ">
	      				</div>
	      				<div class="form-group">
	      					<label for="adressOfRegistration">Адрес регистрации</label>
        					<input name="adressOfRegistration" type="text" class="form-control" id=""  placeholder="город, улица, номер дома, номер квартиры ">
	      				</div>
	      				<br>
	      				<div class="form-group">
	      				<h3 class="panel-title" >Документы, подтверждающие право собственности на отчуждаемый объект</h3>
	      				<div class="doc-example"><hr>
		      				<label for="doc">Документы-основания</label>
				        		<select name="doc" onchange="otherOption(this);">
				        			<option value="kuplya">Договор купли-продажи</option>
				        			<option value="darenie">Договор дарения</option>
				        			<option value="meni">Договор мены</option>
				        			<option value="spavka">Справка ЖСК о выплаченном пае</option>
				        			<option value="other">Иное</option>
				        		</select>
		            		<div id="bl" style="display:none;"><input type="text" name="otherOptionInput" value="" class="form-control" placeholder="введите название документа"></div>
		      				</div>
		      				</div>
		      				<div class="form-group">
				        		<label for="">Дата документа</label><br>
				        		<label for="dayOfDoc">День</label>
				        		<select name="dayOfDoc">
				        			<option>1</option>
				        			<option>2</option>
				        			<option>3</option>
				        			<option>4</option>
				        			<option>5</option>
				        			<option>6</option>
				        			<option>7</option>
				        			<option>8</option>
				        			<option>9</option>
				        			<option>10</option>
				        			<option>11</option>
				        			<option>12</option>
				        			<option>13</option>
				        			<option>14</option>
				        			<option>15</option>
				        			<option>16</option>
				        			<option>17</option>
				        			<option>18</option>
				        			<option>19</option>
				        			<option>20</option>
				        			<option>21</option>
				        			<option>22</option>
				        			<option>23</option>
				        			<option>24</option>
				        			<option>25</option>
				        			<option>26</option>
				        			<option>27</option>
				        			<option>28</option>
				        			<option>29</option>
				        			<option>30</option>
				        			<option>31</option>
				        		</select>
				        		<label for="monthOfDoc">Месяц</label>
				        		<select name="monthOfDoc">
				        			<option>января</option>
				        			<option>февраля</option>
				        			<option>марта</option>
				        			<option>апреля</option>
				        			<option>мая</option>
				        			<option>июня</option>
				        			<option>июля</option>
				        			<option>августа</option>
				        			<option>сентября</option>
				        			<option>октября</option>
				        			<option>ноября</option>
				        			<option>декабря</option>
				        		</select>
				        		<label for="yearOfDoc">Год</label>
				        		<select name="yearOfDoc">
				        			<option>2000</option>
				        			<option>2001</option>
				        			<option>2002</option>
				        			<option>2003</option>
				        			<option>2004</option>
				        			<option>2005</option>
				        			<option>2007</option>
				        			<option>2008</option>
				        			<option>2009</option>
				        			<option>2010</option>
				        			<option>2011</option>
				        			<option>2012</option>
				        			<option>2013</option>
				        			<option>2014</option>
				        			<option selected >2015</option>
				        			<option>2016</option>
				        		</select>
				        	</div>
				        	<button type="button" class="btn btn-primary newDoc">Добавить документ-основание</button>
			        	<div class="form-group docPlus">	      					
	      				</div>
	      				<div class="form-group">
	      					<label for="svidetelstvo">Свидетельство о регистрации права собственности</label><br>Дата
        					<input name="svidetelstvo_data" type="text" class="form-control" id=""  placeholder="дд.мм.гг">Серия
        					<input name="svidetelstvo_serial" type="text" class="form-control" id=""  placeholder="серия">Номер
        					<input name="svidetelstvo_nomber" type="text" class="form-control" id=""  placeholder="номер">
	      				</div>
	      				<div class="form-group">
	      					<label for="svidetelstvo">Запись о регистрации №</label>
        					<input name="svidetelstvo_number" type="number" class="form-control" id=""  placeholder="номер записи">
	      				</div>

	      			</div>
	             </div>	 
	         
	    </div>
    </div>
    <!-- Покупатель -->
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-primary ">
					<div class="panel-heading">
	            	 	<h3 class="panel-title">ПОКУПАТЕЛЬ</h3>
	            	 	</div>
	            	 		<div class="panel-body">
	      						<div class="form-group">
	      							<label for="sex">Пол покупателя</label>
			        				<input type="radio" name="sex" value="male">М
			        				<input type="radio" name="sex" value="female">Ж
			        			</div>
			        			<div class="form-group">
	      					<label for="fio_of_buyer">ФИО</label>
        					<input name="fio_of_buyer" type="text" class="form-control" id=""  placeholder="Иванов Иван Иванович">
	      				</div>
			      				<div class="form-group">
					        		<label for="">Дата рождения</label><br>
					        		<label for="dayOfB_of_buyer">День</label>
					        		<select name="dayOfB_of_buyer">
					        			<option>1</option>
					        			<option>2</option>
					        			<option>3</option>
					        			<option>4</option>
					        			<option>5</option>
					        			<option>6</option>
					        			<option>7</option>
					        			<option>8</option>
					        			<option>9</option>
					        			<option>10</option>
					        			<option>11</option>
					        			<option>12</option>
					        			<option>13</option>
					        			<option>14</option>
					        			<option>15</option>
					        			<option>16</option>
					        			<option>17</option>
					        			<option>18</option>
					        			<option>19</option>
					        			<option>20</option>
					        			<option>21</option>
					        			<option>22</option>
					        			<option>23</option>
					        			<option>24</option>
					        			<option>25</option>
					        			<option>26</option>
					        			<option>27</option>
					        			<option>28</option>
					        			<option>29</option>
					        			<option>30</option>
					        			<option>31</option>
					        		</select>
					        		<label for="monthOfB_of_buyer">Месяц</label>
					        		<select name="monthOfB_of_buyer">
					        			<option>января</option>
					        			<option>февраля</option>
					        			<option>марта</option>
					        			<option>апреля</option>
					        			<option>мая</option>
					        			<option>июня</option>
					        			<option>июля</option>
					        			<option>августа</option>
					        			<option>сентября</option>
					        			<option>октября</option>
					        			<option>ноября</option>
					        			<option>декабря</option>
					        		</select>
					        		<label for="year_OfB_of_buyer">Год</label>
					        		<select name="year_OfB_of_buyer">
					        			<option>2000</option>
					        			<option>2001</option>
					        			<option>2002</option>
					        			<option>2003</option>
					        			<option>2004</option>
					        			<option>2005</option>
					        			<option>2007</option>
					        			<option>2008</option>
					        			<option>2009</option>
					        			<option>2010</option>
					        			<option>2011</option>
					        			<option>2012</option>
					        			<option>2013</option>
					        			<option>2014</option>
					        			<option>2015</option>
					        			<option>2016</option>
					        		</select>
					        	</div>
			      				<div class="form-group">
			      					<label for="passport_of_buyer">Паспорт</label>
		        					<input name="passport_of_buyer" type="text" class="form-control" id=""  placeholder="серия, номер, кем выдан, дата выдачи ">
			      				</div>
			      				<div class="form-group">
			      					<label for="adressOfRegistration_buyer">Адрес регистрации</label>
		        					<input name="adressOfRegistration_buyer" type="text" class="form-control" id=""  placeholder="город, улица, номер дома, номер квартиры ">

			      				</div>

	      					</div>
	            	 </div>
	        </div>
    	</div>
    
  	</div>
 	<div class="row" id="bot_btn" style="display:none">
		<div class="col-md-12">
			<div id = "buttonPrint" class="btn btn-primary">Распечатать договор</div>
		</div>
    </div>
  		</form>

	
    <!-- /Dogovor -->
	
	
   
   			<!-- Modal -->
    <div class="modal fade" id="printDogovorForm" tabindex="-1" role="dialog" aria-labelledby="printLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="printLabel">Распечать договор</h4>
	      </div>
	      <div class="modal-body">
	      
					<form method="post" action="/convert.php" name="emailForm">		
			      	<label for="email">Введите ваш e-mail</label>
		        	<input name="email" type="text" class="form-control" id=""  placeholder="почта@почта.почта">
		        	<p>*На указанный адрес мы вышлем копию договора. В случае необходимости вы всегда можете его отредактировать и сохранить. При закрытии этой страницы все введенные данные не сохраняются.</p>
			   		</form>
	      </div>
	      <div class="modal-footer">
	        <button id = "buttonEndOfTimes" class="btn btn-primary">Распечатать договор</button>
		  </div>
	    </div>
	  </div>
	</div>
	
    </div>
</body>
</html>
