/**
* jQuery.Storage: author Dave Schindler
* Distributed under the MIT License
* Copyright 2010
**/
 
(function(jQuery) {
var isLS=typeof window.localStorage!=='undefined';
function wls(n,v){var c;if(typeof n==="string"&&typeof v==="string"){localStorage[n]=v;return true;}else if(typeof n==="object"&&typeof v==="undefined"){for(c in n){if(n.hasOwnProperty(c)){localStorage[c]=n[c];}}return true;}return false;}
function wc(n,v){var dt,e,c;dt=new Date();dt.setTime(dt.getTime()+31536000000);e="; expires="+dt.toGMTString();if(typeof n==="string"&&typeof v==="string"){document.cookie=n+"="+v+e+"; path=/";return true;}else if(typeof n==="object"&&typeof v==="undefined"){for(c in n) {if(n.hasOwnProperty(c)){document.cookie=c+"="+n[c]+e+"; path=/";}}return true;}return false;}
function rls(n){return localStorage[n];}
function rc(n){var nn, ca, i, c;nn=n+"=";ca=document.cookie.split(';');for(i=0;i<ca.length;i++){c=ca[i];while(c.charAt(0)===' '){c=c.substring(1,c.length);}if(c.indexOf(nn)===0){return c.substring(nn.length,c.length);}}return null;}
function dls(n){return delete localStorage[n];}
function dc(n){return wc(n,"",-1);}

jQuery.extend({
	Storage: {
		set: isLS ? wls : wc,
		get: isLS ? rls : rc,
		remove: isLS ? dls :dc
	}
});
})(jQuery);

/**
* jQuery.Callme: author Nazar Tokar
* www.dedushka.org
* Copyright 2013
**/

jQuery(function(){

jQuery(document).on("mouseover", ".cme_btn", function(){ // обработка прозрачности кнопки
	jQuery(this).animate({ opacity: 0.8 }, 150);
}).on("mouseleave", ".cme_btn", function(){
	jQuery(this).animate({ opacity: 1 }, 100);
});

jQuery(document).on("click",".callme_viewform", function(e){ // показ формы
	jQuery("#callmeform").css("position","absolute");
	jQuery("#cme_cls").css("text-decoration","none");
	if(jQuery("#callmeform").is(":visible")) {
		jQuery("#callmeform").fadeOut("fast");
		return false;
	}
	
	var dh = jQuery(document).height(); // считаем отступ сверху
	tp_cr = e.pageY + 20;
	tp = dh - e.pageY;
	if (tp < 300) { tp_cr = dh - 280; } // если близко к низу
	
	var dw = jQuery(window).width(); // считаем отступ слева
	lf_cr = e.pageX - 150;
	lf = dw - e.pageX;
		
	if (lf < 300) { lf_cr = dw - 350; } // если близко к правому
	if (e.pageX < 300) { lf_cr = e.pageX + 20; } // если близко к левому
	
	jQuery("#callmeform").css("left", lf_cr);
	jQuery("#callmeform").css("top", tp_cr);
	callmeShowForm();
	return false;
});

jQuery(document).on("mouseover", "#viewform", function(){ // смена класса кнопки справа
	jQuery(this).addClass("callmeform_hover");
}).on("mouseout", "#viewform", function(){
	jQuery(this).removeClass("callmeform_hover");
}
);

jQuery(document).on("click", "#cme_cls", function(){ // кнопка "закрыть" 
	callmeShowForm();
	return false;
}).on("mouseover", "#cme_cls", function(){
	jQuery(this).animate({ opacity: 0.6 }, 100);
}).on("mouseleave", "#cme_cls", function(){
	jQuery(this).animate({ opacity: 1 }, 100);
});

});

function callmeClearForm(){ // чистим форму
	jQuery(".cme_txt").val("");
	jQuery("#cphone").val("+380");
}

function callmeShowForm(){ //скрываем и показываем форму
	jQuery("#callmeform").fadeToggle("fast");
	jQuery("#callme_result").html("");
	callmeClearForm();
}

function sendMail() {
	var cnt = jQuery.Storage.get('callme-sent'); //getting last sent time from storage
	if (!cnt) { cnt = 0; }
	
	jQuery.getJSON("/callme/index.php", {
		cname: jQuery("#cname").val(), 
		cphone: jQuery("#cphone").val(), 
		ccmnt: jQuery("#ccmnt").val(), 
		ctime: cnt, 
		url: location.href 
	}, function(data) {	
		message = "<div class='" + data.cls + "'>" + data.message +"</div>";
		jQuery("#callme_result").html(message);
		
		if (data.result == "success") {
			jQuery.Storage.set("callme-sent", data.time);
			//jQuery(".cme_btn").attr("disabled", "disabled");
			setTimeout( function(){ callmeShowForm(); }, 4000);
			setTimeout( function(){ callmeClearForm(); }, 5000);
		}
	});
}

jQuery(document).ready(function(){

/* загрузка формы */

jQuery.ajaxSetup({'beforeSend' : function(xhr) { // выбираем правильную кодировку
		xhr.overrideMimeType('text/html; charset=utf-8');
	},
});

jQuery.get("/callme/form.html", function(data) { // вставка формы
	jQuery("body").append(data);
});

jQuery(document).on("click",".cme_btn", function(){ // отправка уведомления
	jQuery("#callme_result").html("<div class='sending'>Отправка...</div>");
	setTimeout( function(){ sendMail(); }, 2000);
	return false;
});	
});

jQuery(document).keyup(function(a) { //обработка esc
	if (a.keyCode == 27) {
		if(jQuery("#callmeform").is(":visible")) {
			callmeShowForm();
		}
	}

});