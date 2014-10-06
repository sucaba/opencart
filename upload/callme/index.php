<?php
// www.nazartokar.com
// www.dedushka.org
// pechkino@ya.ru

// настройка

//адрес почты для отправки уведомления
$to = "bellissima.kiev@gmail.com, kushnir1979@gmail.com"; //несколько ящиков могут перечисляться через запятую
$from = "sait@bellissima.kiev.ua"; //адрес, от которого придёт уведомление

// данные для отправки смс

$id = "";
$key = "";
$frm = "CallMe"; // не меняйте. Если меняете, добавьте новую подпись в Bytehand и дождитесь апрува
$num_sms = "380"; // номер для получения уведомлений в международном формате без "+", например, 380501112233 или 79218886622

// функция смс

function sendSMS($to, $text){
	global $id;
	global $key;
	global $from;
	global $frm;
	$result = @file_get_contents('http://bytehand.com:3800/send?id='.$id.'&key='.$key.'&to='.urlencode($to).'&partner=callme&from='.urlencode($frm).'&text='.urlencode($text));
	if ($result === false) { return false; } else {	return true; }
}

// Translit function, thanks to ProgrammerZ.Ru
function translit($str) 
{$tr = array("А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I","Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH","Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"","Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j","з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l","м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h","ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y","ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya");
return strtr($str,$tr);
}

header("Content-Type: text/html; charset=utf-8"); //charset

//далее можно не трогать

$time = time(); // время отправки
$interval = $time - $_GET['ctime'];
if ($interval < 1800) { // если прошло менее получаса, указано в секундах
	$result = "error";
	$cls = "c_error";
	$time = "";
	$message = "Сообщение уже было отправлено.";	
} else {

if ((strlen($_GET['cname'])>2)&&((strlen($_GET['cphone'])>5))){
	$ip = $_SERVER['REMOTE_ADDR']; //что будем отправлять
	$phone = substr(htmlspecialchars(trim($_GET['cphone'])), 0, 150);
	$name = substr(htmlspecialchars(trim($_GET['cname'])), 0, 150);
	$comment = substr(htmlspecialchars(trim($_GET['ccmnt'])), 0, 1000);
	$url = htmlspecialchars($_GET['url']);

	$title = "CallMe - заказ обратного звонка";
	$mess =  "<b>Телефон</b><br>".$phone."<br><br>
	<b>Имя</b><br>".$name."<br><br>";

if (strlen($comment) > 2) {
	$mess = $mess."<b>Комментарий</b><br>".$comment."<br><br>";
}

	$mess = $mess."<b>Отправлено со страницы</b><br>".$url."<br><br><b>ip</b><br>".$ip."<hr>
	<a href='http://dedushka.org/tag/callme/'>Следите</a> за обновлениями.<br>
	Спасибо за то, что пользуетесь CallMe.";
	
	$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: CallMe 1.7.1 <".$from.">\r\n"; 

$msg_sms = translit($name).": ".translit($phone)." ";
$msg_sms .= substr(translit($comment), 0, (160-strlen($msg_sms)));

@mail($to, $title, $mess, $headers);
	$result = "success";
	$cls = "c_success";
	$message = "Спасибо, сообщение отправлено."; //сообщение об отправке
	if ($id) { @sendSMS($num_sms, $msg_sms); }
} else {
	$result = "error";
	$cls = "c_error";
	$time = "";
	$message = "Заполните все поля.";
}
}
?>{
"result": "<? echo $result; ?>",
"cls": "<? echo $cls; ?>",
"time": "<? echo $time; ?>",
"message": "<? echo $message; ?>"
}
<!-- Google Code for &#1047;&#1074;&#1086;&#1088;&#1086;&#1090;&#1085;&#1110;&#1081; &#1076;&#1079;&#1074;&#1110;&#1085;&#1086;&#1082; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 981582077;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "O5TRCJPEsAkQ_YGH1AM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/981582077/?label=O5TRCJPEsAkQ_YGH1AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>