// Definicion de variables necesarias para el widget

var defaultUrlDisponibilidad = 'https://www.reservasporinternet.com/webmaster/widget/calendar/hotel-business/hotel-business-daily-availability.php';

// default url donde se mandara al cliente a hacer la reserva sin 'https://'
var urlReservar = 'central.reservadealojamientos.com/disenio2011/reservas-disponibilidad.php'; 

 
// capturamos la url
var scriptData = document.getElementById("rda-calendar");
var loc = scriptData.src;

//array para almacenar las variables
var _GET= {};
_GET.target = scriptData.getAttribute('data-target');
_GET.theme = scriptData.getAttribute('data-theme');
_GET.company = scriptData.getAttribute('data-company');
_GET.reseller = scriptData.getAttribute('data-reseller');
_GET.language = scriptData.getAttribute('data-language');
_GET.style = scriptData.getAttribute('data-style');
_GET.theme = scriptData.getAttribute('data-theme');
_GET.color = scriptData.getAttribute('data-color');
_GET.openbooking = scriptData.getAttribute('data-openbooking');
_GET.type = scriptData.getAttribute('data-type');
_GET.altbookingpage = scriptData.getAttribute('data-altbookingpage');

// si existe el interrogante
if(loc != ''){
	console.log('src');

	if(loc.indexOf('?')>0){
	    // cogemos la parte de la url que hay despues del interrogante
	    var getString = loc.split('?')[1];

	    // obtenemos un array con cada clave=valor
	    var getparams = getString.split('&');

	    // recorremos todo el array de valores
	    for(var i = 0, l = getparams.length; i < l; i++){

	        var tmp = getparams[i].split('=');
	        _GET[tmp[0]] = decodeURI(tmp[1]);
	    }
	}

}

console.log(_GET);

// Definimos el target donde se cargara el calendario
if(_GET.target === undefined || _GET.target == null){
	_GET.target = 'calendar';
}

// Definimos el tema del calendario
if(_GET.theme === undefined || _GET.theme == null){
	_GET.theme = 'white';
}
// Comprobamos si se han enviado los parametros obligatorios
if(_GET.company !== undefined && _GET.company != null){

	// Comporbamos si es un establecimiento reseller, si no se ha enviado se marca como false
	_GET.procede_reseller = 1;
	if(_GET.reseller === undefined || _GET.reseller == null){

		_GET.reseller = '-1';
		_GET.procede_reseller = 0;
	}

	// Cargamos los datos para el idioma enviado. String, id de la centarl etc
	var languageParams = {};
	languageParams.iso = 'en';
	languageParams.idLanguage = 4;
	languageParams.strReservar = 'Book';
	languageParams.strSeleccionar = 'Select a Date';
	languageParams.strCerrar = 'Close';
	languageParams.strCerrarSeleccion = 'Select';
	languageParams.strSelectDate1 = 'Select arrival date';
	languageParams.strLLegada = 'Arrival:';
	languageParams.strSinSeleccionar = 'Unselected';
	languageParams.strSalida = 'Departure:';
	languageParams.strFinishSelect = 'You can reserve!';
	languageParams.strSelectDate2 = 'Select departure date';

	var dtCalendar = {};
	dtCalendar.closeText = 'Done';
	dtCalendar.prevText = 'Prev';
	dtCalendar.nextText = 'Next';
	dtCalendar.currentText = 'Today';
	dtCalendar.monthNames = ["January","February","March","April","May","June",
			"July","August","September","October","November","December"];
	dtCalendar.monthNamesShort = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
	dtCalendar.dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
	dtCalendar.dayNamesShort = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
	dtCalendar.dayNamesMin = ["Su","Mo","Tu","We","Th","Fr","Sa"];
	dtCalendar.weekHeader = 'Wk';
	dtCalendar.dateFormat = 'mm/dd/yy';
	dtCalendar.firstDay = 0;
	dtCalendar.isRTL = false;
	dtCalendar.showMonthAfterYear = false;
	dtCalendar.yearSuffix = '';

	if(_GET.language !== undefined && _GET.language != null){

		if (_GET.language == 'es') { 
			languageParams.iso = _GET.language;
			languageParams.idLanguage = 1;
			languageParams.strReservar = 'Reservar';
			languageParams.strSeleccionar = 'Selecciona Fecha';
			languageParams.strCerrar = 'Cerrar';
			languageParams.strCerrarSeleccion = 'Seleccionar';
			languageParams.strLLegada = 'LLegada:';
			languageParams.strSinSeleccionar = 'Sin Seleccionar';
			languageParams.strSalida = 'Salida:';
			languageParams.strFinishSelect = 'Ya puedes reservar!';
			languageParams.strSelectDate2 = 'Selecciona la Fecha de SALIDA';

			dtCalendar.closeText = 'Cerrar';
			dtCalendar.prevText = '&#x3c;Ant';
			dtCalendar.nextText = 'Sig&#x3e;';
			dtCalendar.currentText = 'Hoy';
			dtCalendar.monthNames = ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
			'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
			dtCalendar.monthNamesShort = ['Ene','Feb','Mar','Abr','May','Jun',
			'Jul','Ago','Sep','Oct','Nov','Dic'];
			dtCalendar.dayNames = ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'];
			dtCalendar.dayNamesShort = ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'];
			dtCalendar.dayNamesMin = ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'];
			dtCalendar.weekHeader = 'Sm';
			dtCalendar.dateFormat = 'dd/mm/yy';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';

		}

		if (_GET.language == 'eu') { 
			languageParams.iso = _GET.language;	
			languageParams.idLanguage = 2;
			languageParams.strReservar = 'Erreserbatu';
			languageParams.strSeleccionar = 'Data Aukeratu';
			languageParams.strCerrar = 'Itxi';
			languageParams.strCerrarSeleccion = 'Aukeratu';
			languageParams.strSelectDate1 = 'IRITSIERA data aukeratu';
			languageParams.strFinishSelect = 'jada erreserba egin dezakezu!';
			languageParams.strSelectDate2 = 'IRTEERA data aukeratu';
			languageParams.strLLegada = 'Sarrera:';
			languageParams.strSinSeleccionar = 'Hautatu gabe';
			languageParams.strSalida = 'Irteera:';

			dtCalendar.closeText = 'Egina';
			dtCalendar.prevText = '&#x3c;Aur';
			dtCalendar.nextText = 'Hur&#x3e;';
			dtCalendar.currentText = 'Gaur';
			dtCalendar.monthNames = ['Urtarrila','Otsaila','Martxoa','Apirila','Maiatza','Ekaina',
			'Uztaila','Abuztua','Iraila','Urria','Azaroa','Abendua'];
			dtCalendar.monthNamesShort = ['Urt','Ots','Mar','Api','Mai','Eka',
			'Uzt','Abu','Ira','Urr','Aza','Abe'];
			dtCalendar.dayNames = ['Igandea','Astelehena','Asteartea','Asteazkena','Osteguna','Ostirala','Larunbata'];
			dtCalendar.dayNamesShort = ['Iga','Ast','Ast','Ast','Ost','Ost','Lar'];
			dtCalendar.dayNamesMin = ['Ig','As','As','As','Os','Os','La'];
			dtCalendar.weekHeader = 'Wk';
			dtCalendar.dateFormat = 'yy/mm/dd';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';
		}

		if (_GET.language == 'fr') { 
			languageParams.iso = _GET.language;	
			languageParams.idLanguage = 3;
			languageParams.strReservar = 'RÃ©server';
			languageParams.strSeleccionar = 'Choisissez date';
			languageParams.strCerrar = 'Cerrar';
			languageParams.strCerrarSeleccion = 'SÃ©lectionner';
			languageParams.strSelectDate1 = 'Choisissez la date d\'arrivÃ©e';
			languageParams.strFinishSelect = 'Vous pouvez rÃ©server!';
			languageParams.strSelectDate2 = 'SÃ©lectionnez la date de dÃ©part';
			languageParams.strLLegada = 'ArrivÃ©e:';
			languageParams.strSinSeleccionar = 'Non sÃ©lectionnÃ©';
			languageParams.strSalida = 'La sortie:';

			dtCalendar.closeText = 'Fermer';
			dtCalendar.prevText = 'PrÃ©cÃ©dent';
			dtCalendar.nextText = 'Suivant';
			dtCalendar.currentText = 'Aujourd\'hui';
			dtCalendar.monthNames = ['janvier', 'fÃ©vrier', 'mars', 'avril', 'mai', 'juin',
				'juillet', 'aoÃ»t', 'septembre', 'octobre', 'novembre', 'dÃ©cembre'];
			dtCalendar.monthNamesShort = ['janv.', 'fÃ©vr.', 'mars', 'avril', 'mai', 'juin',
				'juil.', 'aoÃ»t', 'sept.', 'oct.', 'nov.', 'dÃ©c.'];
			dtCalendar.dayNames = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
			dtCalendar.dayNamesShort = ['dim.', 'lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.'];
			dtCalendar.dayNamesMin = ['D','L','M','M','J','V','S'];
			dtCalendar.weekHeader = 'Sem.';
			dtCalendar.dateFormat = 'dd/mm/yy';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';
		}

		if (_GET.language == 'ca') { 
			languageParams.iso = _GET.language;	
			languageParams.idLanguage = 5;
			languageParams.strReservar = 'Reservar';
			languageParams.strSeleccionar = 'Selecciona data';
			languageParams.strCerrar = 'Tancar';
			languageParams.strCerrarSeleccion = 'Seleccionar';
			languageParams.strSelectDate1 = 'Seleccionar la data d\'arribada';
			languageParams.strFinishSelect = 'Pot reservar!';
			languageParams.strSelectDate2 = 'Seleccionar data de sortida';
			languageParams.strLLegada = 'Arribada:';
			languageParams.strSinSeleccionar = 'Sense Seleccionar';
			languageParams.strSalida = 'Sortida:';

			dtCalendar.closeText = 'Tancar';
			dtCalendar.prevText = '&#x3c;Ant';
			dtCalendar.nextText = 'Seg&#x3e;';
			dtCalendar.currentText = 'Avui';
			dtCalendar.monthNames = ['Gener','Febrer','Mar&ccedil;','Abril','Maig','Juny',
			'Juliol','Agost','Setembre','Octubre','Novembre','Desembre'];
			dtCalendar.monthNamesShort = ['Gen','Feb','Mar','Abr','Mai','Jun',
			'Jul','Ago','Set','Oct','Nov','Des'];
			dtCalendar.dayNames = ['Diumenge','Dilluns','Dimarts','Dimecres','Dijous','Divendres','Dissabte'];
			dtCalendar.dayNamesShort = ['Dug','Dln','Dmt','Dmc','Djs','Dvn','Dsb'];
			dtCalendar.dayNamesMin = ['Dg','Dl','Dt','Dc','Dj','Dv','Ds'];
			dtCalendar.weekHeader = 'Sm';
			dtCalendar.dateFormat = 'dd/mm/yy';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';
		}

		if (_GET.language == 'de') { 
			languageParams.iso = _GET.language;	
			languageParams.idLanguage = 6;
			languageParams.strReservar = 'Reservieren';
			languageParams.strSeleccionar = 'Datum wÃ¤hlen';
			languageParams.strCerrar = 'SchlieÃŸen';
			languageParams.strCerrarSeleccion = 'WÃ¤hlen';
			languageParams.strSelectDate1 = 'WÃ¤hlen Sie Ankunftsdatum';
			languageParams.strFinishSelect = 'Sie kÃ¶nnen reservieren!';
			languageParams.strSelectDate2 = 'WÃ¤hlen Sie Abreisedatum';
			languageParams.strLLegada = 'Ankunft:';
			languageParams.strSinSeleccionar = 'Nicht ausgewÃ¤hlte';
			languageParams.strSalida = 'Abfahrt:';

			dtCalendar.closeText = 'schlieÃŸen';
			dtCalendar.prevText = '&#x3c;zurÃ¼ck';
			dtCalendar.nextText = 'Vor&#x3e;';
			dtCalendar.currentText = 'heute';
			dtCalendar.monthNames = ['Januar','Februar','MÃ¤rz','April','Mai','Juni',
			'Juli','August','September','Oktober','November','Dezember'];
			dtCalendar.monthNamesShort = ['Jan','Feb','MÃ¤r','Apr','Mai','Jun',
			'Jul','Aug','Sep','Okt','Nov','Dez'];
			dtCalendar.dayNames = ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'];
			dtCalendar.dayNamesShort = ['So','Mo','Di','Mi','Do','Fr','Sa'];
			dtCalendar.dayNamesMin = ['So','Mo','Di','Mi','Do','Fr','Sa'];
			dtCalendar.weekHeader = 'Wo';
			dtCalendar.dateFormat = 'dd.mm.yy';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';
		}

		if (_GET.language == 'it') { 
			languageParams.iso = _GET.language;	
			languageParams.idLanguage = 7;
			languageParams.strReservar = 'Riservare';
			languageParams.strSeleccionar = 'Scegliere data';
			languageParams.strCerrar = 'Chiudere';
			languageParams.strCerrarSeleccion = 'Selezionare';
			languageParams.strSelectDate1 = 'Seleziona la data di arrivo';
			languageParams.strFinishSelect = 'Ãˆ possibile prenotare!';
			languageParams.strSelectDate2 = 'Seleziona la data di partenza';
			languageParams.strLLegada = 'Arrivo:';
			languageParams.strSinSeleccionar = 'Non selezionato';
			languageParams.strSalida = 'Partenza:';

			dtCalendar.closeText = 'Chiudi';
			dtCalendar.prevText = '&#x3c;Prec';
			dtCalendar.nextText = 'Succ&#x3e;';
			dtCalendar.currentText = 'Oggi';
			dtCalendar.monthNames = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno',
				'Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];
			dtCalendar.monthNamesShort = ['Gen','Feb','Mar','Apr','Mag','Giu',
				'Lug','Ago','Set','Ott','Nov','Dic'];
			dtCalendar.dayNames = ['Domenica','Luned&#236','Marted&#236','Mercoled&#236','Gioved&#236','Venerd&#236','Sabato'];
			dtCalendar.dayNamesShort = ['Dom','Lun','Mar','Mer','Gio','Ven','Sab'];
			dtCalendar.dayNamesMin = ['Do','Lu','Ma','Me','Gi','Ve','Sa'];
			dtCalendar.weekHeader = 'Sm';
			dtCalendar.dateFormat = 'dd/mm/yy';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';
		}

		if (_GET.language == 'ro') { 
			languageParams.iso = _GET.language;	
			languageParams.idLanguage = 8;
			languageParams.strReservar = 'Rezervare';
			languageParams.strSeleccionar = 'AlegeÈ›i o datÄƒ';
			languageParams.strCerrar = 'Ã®nchide';
			languageParams.strCerrarSeleccion = 'Selecta';
			languageParams.strSelectDate1 = 'SelectaÈ›i data sosirii';
			languageParams.strFinishSelect = 'PuteÈ›i rezerva!';
			languageParams.strSelectDate2 = 'SelectaÈ›i data de plecare';
			languageParams.strLLegada = 'Sosire:';
			languageParams.strSinSeleccionar = 'Neselectat';
			languageParams.strSalida = 'Plecare:';

			dtCalendar.closeText = 'ÃŽnchide';
			dtCalendar.prevText = '&laquo; Luna precedentÄƒ';
			dtCalendar.nextText = 'Luna urmÄƒtoare &raquo;';
			dtCalendar.currentText = 'Azi';
			dtCalendar.monthNames = ['Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie',
			'Iulie','August','Septembrie','Octombrie','Noiembrie','Decembrie'];
			dtCalendar.monthNamesShort = ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun',
			'Iul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
			dtCalendar.dayNames = ['DuminicÄƒ', 'Luni', 'MarÅ£i', 'Miercuri', 'Joi', 'Vineri', 'SÃ¢mbÄƒtÄƒ'];
			dtCalendar.dayNamesShort = ['Dum', 'Lun', 'Mar', 'Mie', 'Joi', 'Vin', 'SÃ¢m'];
			dtCalendar.dayNamesMin = ['Du','Lu','Ma','Mi','Jo','Vi','SÃ¢'];
			dtCalendar.dateFormat = 'dd MM yy';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';
		}

		if (_GET.language == 'ru') { 
			languageParams.iso = _GET.language;	
			languageParams.idLanguage = 9;
			languageParams.strReservar = 'ÐºÐ½Ð¸Ð³Ð°';
			languageParams.strSeleccionar = 'Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ Ð´Ð°Ñ‚Ñƒ';
			languageParams.strCerrar = 'Ð—Ð°ÐºÑ€Ñ‹Ñ‚ÑŒ';
			languageParams.strCerrarSeleccion = 'Ð²Ñ‹Ð±Ñ€Ð°Ñ‚ÑŒ';
			languageParams.strSelectDate1 = 'Ð’Ñ‹Ð±Ñ€Ð°Ñ‚ÑŒ Ð´Ð°Ñ‚Ñƒ Ð¿Ñ€Ð¸Ð±Ñ‹Ñ‚Ð¸Ñ';
			languageParams.strFinishSelect = 'Ð’Ñ‹ Ð¼Ð¾Ð¶ÐµÑ‚Ðµ Ð·Ð°Ð±Ñ€Ð¾Ð½Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ!';
			languageParams.strSelectDate2 = 'Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ Ð´Ð°Ñ‚Ñƒ Ð²Ñ‹Ð»ÐµÑ‚Ð°';
			languageParams.strLLegada = 'Ð¿Ñ€Ð¸Ð±Ñ‹Ñ‚Ð¸Ðµ:';
			languageParams.strSinSeleccionar = 'Ð½ÐµÐ¾Ñ‚Ð¾Ð±Ñ€Ð°Ð½Ð½Ñ‹Ð¹';
			languageParams.strSalida = 'Ð²Ñ‹ÐµÐ·Ð´:';

			dtCalendar.closeText = 'Ð—Ð°ÐºÑ€Ñ‹Ñ‚ÑŒ';
			dtCalendar.prevText = '&#x3c;ÐŸÑ€ÐµÐ´';
			dtCalendar.nextText = 'Ð¡Ð»ÐµÐ´&#x3e;';
			dtCalendar.currentText = 'Ð¡ÐµÐ³Ð¾Ð´Ð½Ñ';
			dtCalendar.monthNames = ['Ð¯Ð½Ð²Ð°Ñ€ÑŒ','Ð¤ÐµÐ²Ñ€Ð°Ð»ÑŒ','ÐœÐ°Ñ€Ñ‚','ÐÐ¿Ñ€ÐµÐ»ÑŒ','ÐœÐ°Ð¹','Ð˜ÑŽÐ½ÑŒ',
			'Ð˜ÑŽÐ»ÑŒ','ÐÐ²Ð³ÑƒÑÑ‚','Ð¡ÐµÐ½Ñ‚ÑÐ±Ñ€ÑŒ','ÐžÐºÑ‚ÑÐ±Ñ€ÑŒ','ÐÐ¾ÑÐ±Ñ€ÑŒ','Ð”ÐµÐºÐ°Ð±Ñ€ÑŒ'];
			dtCalendar.monthNamesShort = ['Ð¯Ð½Ð²','Ð¤ÐµÐ²','ÐœÐ°Ñ€','ÐÐ¿Ñ€','ÐœÐ°Ð¹','Ð˜ÑŽÐ½',
			'Ð˜ÑŽÐ»','ÐÐ²Ð³','Ð¡ÐµÐ½','ÐžÐºÑ‚','ÐÐ¾Ñ','Ð”ÐµÐº'];
			dtCalendar.dayNames = ['Ð²Ð¾ÑÐºÑ€ÐµÑÐµÐ½ÑŒÐµ','Ð¿Ð¾Ð½ÐµÐ´ÐµÐ»ÑŒÐ½Ð¸Ðº','Ð²Ñ‚Ð¾Ñ€Ð½Ð¸Ðº','ÑÑ€ÐµÐ´Ð°','Ñ‡ÐµÑ‚Ð²ÐµÑ€Ð³','Ð¿ÑÑ‚Ð½Ð¸Ñ†Ð°','ÑÑƒÐ±Ð±Ð¾Ñ‚Ð°'];
			dtCalendar.dayNamesShort = ['Ð²ÑÐº','Ð¿Ð½Ð´','Ð²Ñ‚Ñ€','ÑÑ€Ð´','Ñ‡Ñ‚Ð²','Ð¿Ñ‚Ð½','ÑÐ±Ñ‚'];
			dtCalendar.dayNamesMin = ['Ð’Ñ','ÐŸÐ½','Ð’Ñ‚','Ð¡Ñ€','Ð§Ñ‚','ÐŸÑ‚','Ð¡Ð±'];
			dtCalendar.weekHeader = 'ÐÐµ';
			dtCalendar.dateFormat = 'dd.mm.yy';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';
		}

		if (_GET.language == 'pt') { 
			languageParams.iso = _GET.language;	
			languageParams.idLanguage = 10;
			languageParams.strReservar = 'Reservar';
			languageParams.strSeleccionar = 'Escolha data';
			languageParams.strCerrar = 'Fechar';
			languageParams.strCerrarSeleccion = 'Selecionar';
			languageParams.strSelectDate1 = 'Selecionar data de chegada';
			languageParams.strFinishSelect = 'VocÃª pode reservar!';
			languageParams.strSelectDate1 = 'Selecionar data de saÃ­da';
			languageParams.strLLegada = 'Chegada:';
			languageParams.strSinSeleccionar = 'NÃ£o selecionado';
			languageParams.strSalida = 'SaÃ­da:';

			dtCalendar.closeText = 'ÃƒÅ½nchide';
			dtCalendar.prevText = '&laquo; Luna precedentÃ„Æ’';
			dtCalendar.nextText = 'Luna urmÃ„Æ’toare &raquo;';
			dtCalendar.currentText = 'Azi';
			dtCalendar.monthNames = ['Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie',
			'Iulie','August','Septembrie','Octombrie','Noiembrie','Decembrie'];
			dtCalendar.monthNamesShort = ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun',
			'Iul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
			dtCalendar.dayNames = ['DuminicÃ„Æ’', 'Luni', 'MarÃ…Â£i', 'Miercuri', 'Joi', 'Vineri', 'SÃƒÂ¢mbÃ„Æ’tÃ„Æ’'];
			dtCalendar.dayNamesShort = ['Dum', 'Lun', 'Mar', 'Mie', 'Joi', 'Vin', 'SÃƒÂ¢m'];
			dtCalendar.dayNamesMin = ['Du','Lu','Ma','Mi','Jo','Vi','SÃƒÂ¢'];
			dtCalendar.dateFormat = 'dd/mm/yy';
			dtCalendar.firstDay = 1;
			dtCalendar.isRTL = false;
			dtCalendar.showMonthAfterYear = false;
			dtCalendar.yearSuffix = '';
		}

	}

	// Cargamos la hoja para resetear los estilos
	//<![CDATA[
	if(document.createStyleSheet) {
	  document.createStyleSheet('https://www.reservasporinternet.com/webmaster/widget/calendar/commons/css/reset-styles.css?target='+_GET.target);
	}
	else {
	  var styles = "@import url('https://www.reservasporinternet.com/webmaster/widget/calendar/commons/css/reset-styles.css?target="+_GET.target+"');";
	  var newSS=document.createElement('link');
	  newSS.rel='stylesheet';
	  newSS.href='data:text/css,'+escape(styles);
	  document.getElementsByTagName("head")[0].appendChild(newSS);
	}
	//]]>	

	// Cargamos la hoja de estilos principal del calendario si se solicita
	if(_GET.style != 'none'){
		//<![CDATA[
		if(document.createStyleSheet) {
		  document.createStyleSheet('https://www.reservasporinternet.com/webmaster/widget/calendar/commons/datepicker/themes/'+_GET.theme+'/jquery-ui.css?target='+_GET.target+'&color='+_GET.color);
		}
		else {
		  var styles = "@import url('https://www.reservasporinternet.com/webmaster/widget/calendar/commons/datepicker/themes/"+_GET.theme+"/jquery-ui.css?target="+_GET.target+"&color="+_GET.color+"');";
		  var newSS=document.createElement('link');
		  newSS.rel='stylesheet';
		  newSS.href='data:text/css,'+escape(styles);
		  document.getElementsByTagName("head")[0].appendChild(newSS);
		}
		//]]>	

		//<![CDATA[
		if(document.createStyleSheet) {
		  document.createStyleSheet('https://www.reservasporinternet.com/webmaster/widget/calendar/commons/css/datepicker-no-conflict.css?target='+_GET.target+'&color='+_GET.color);
		}
		else {
		  var styles = "@import url('https://www.reservasporinternet.com/webmaster/widget/calendar/commons/css/datepicker-no-conflict.css?target="+_GET.target+"&color="+_GET.color+"');";
		  var newSS=document.createElement('link');
		  newSS.rel='stylesheet';
		  newSS.href='data:text/css,'+escape(styles);
		  document.getElementsByTagName("head")[0].appendChild(newSS);
		}
		//]]>	

	}

	// Cargamos la hoja de estilos de los botones
	//<![CDATA[
	if(document.createStyleSheet) {
	  document.createStyleSheet('https://www.reservasporinternet.com/webmaster/widget/calendar/commons/css/calendar-buttons.css?target='+_GET.target+'&color='+_GET.color);
	}
	else {
	  var styles = "@import url('https://www.reservasporinternet.com/webmaster/widget/calendar/commons/css/calendar-buttons.css?target="+_GET.target+"&color="+_GET.color+"');";
	  var newSS=document.createElement('link');
	  newSS.rel='stylesheet';
	  newSS.href='data:text/css,'+escape(styles);
	  document.getElementsByTagName("head")[0].appendChild(newSS);
	}
	//]]>	

	// Comprobamos si estan cargadas las dependencias necesarias y si es necesario, las vamos cargando en el orden correcto

	if (window.jQuery === undefined){
	    
	    (function(){
			var newscript = document.createElement('script');
			newscript.type = 'text/javascript';
			newscript.async = true;
			newscript.src = 'https://www.reservasporinternet.com/webmaster/widget/calendar/commons/jquery/jquery.js';
			newscript.onload = loadDatepicker;
			(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(newscript);
	    })();

	}else{
		
		loadDatepicker();

	}

}else{

	window.alert('Error al cargar el widget de disponibilidad. Por favor, asegÃºrese de que los parÃ¡metros enviados son correctos.');
}


function loadDatepicker(){
	if (window.datepicker === undefined){
	    
	    (function(){

			var newscript = document.createElement('script');
			newscript.type = 'text/javascript';
			newscript.async = true;
			newscript.src = 'https://www.reservasporinternet.com/webmaster/widget/calendar/commons/datepicker/jquery-ui.datepicker.js';
			newscript.onload = loadDatepickerLocale;
			(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(newscript);
	    })();

	}else{

		loadDatepickerLocale();
	}
}

function loadDatepickerLocale(){

	var newscript = document.createElement('script');
	newscript.type = 'text/javascript';
	newscript.async = true;
	newscript.src = 'https://www.reservasporinternet.com/webmaster/widget/calendar/commons/datepicker/locales/datepicker-'+languageParams.iso+'.js';
	newscript.onload = executeCalendar(_GET);
	(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(newscript);
}


// Ejecucion del calendario
function executeCalendar(_GET){

	var cur = -1,
	prv = -1,
	inputText = '';

	jQuery(function() {

		// definicion de variables para el calendario
		var fechaActual = new Date();
		var diaActual = fechaActual.getDate();
		var mesActual = fechaActual.getMonth();
		var anioActual = fechaActual.getFullYear();

		var fechaLlegada, fechaSalida;
		var dia = diaActual;
		var mes = mesActual;
		var anio = anioActual;

		var fechasLibres = "";
		var fechasLlegada = '';
		var fechasCalendario = '';
		var datepickerInitiate = 0;
		var selectedRange = true;	
		var ultimoDisponible = true;
		oldFechasLlegada = '';



		// Asignamos el target de <a> dependiendo de lo enviado en openbooking
		if(_GET.openbooking === undefined || _GET.openbooking != '_self' || _GET.openbooking == null){

			_GET.openbooking = '_blank';
		}

		// Cargamos el HTML para el tipo de calendario inline o al clickar el boton
		if(_GET.type == 'button'){

			jQuery('#'+_GET.target).html('<div id="Bk98768"><div class="oferta_cont_bt_calendario"><input name="calendario" type="button" id="calendar_input" value="'+languageParams.strSeleccionar+'" /><div id="calendar_box" class="no-inline"></div></div><div class="oferta_cont_bt_reservar"><a class="oferta_boton_reservar desactivar" href="#" target="'+_GET.openbooking+'">'+languageParams.strReservar+'</a></div></div>');

		}else if (_GET.type == 'input') {
			
			jQuery('#'+_GET.target).html('<div id="Bk98768"><div class="oferta_cont_bt_calendario"><input name="calendario" type="button" id="calendar_input" value="'+languageParams.strSeleccionar+'" /><div id="calendar_box" class="no-inline"></div></div><div class="oferta_cont_bt_reservar"><a class="oferta_boton_reservar desactivar" href="#" target="'+_GET.openbooking+'">'+languageParams.strReservar+'</a></div></div>');

		}else{ // inline
			
			jQuery('#'+_GET.target).html('<div id="Bk98768"><div id="calendar_box" class="calendar-inline"></div><div class="oferta_cont_bt_reservar"><a class="oferta_boton_reservar desactivar" href="#" target="'+_GET.openbooking+'">'+languageParams.strReservar+'</a></div></div>');

		}

		// Cargamos los elementos del calendario en variables
		var calendarBox = jQuery('#calendar_box');
		var calendarInput = jQuery('#calendar_input');
		var btnReservar = jQuery('.oferta_boton_reservar');
		var btnClose = '';
		
		// Modificamos los estilos de los botones
		function modEstilosBotones(){

			if(_GET.color !== '' && _GET.color != null){
				/*jQuery('.oferta_cont_bt_calendario button').addClass('no-background');*/
				calendarInput.css( 'background-color', '#'+_GET.color );
			}
		}


		function ObtenerFechas(mes, anio){
			if (anio > anioActual || (anio == anioActual && mes >= mesActual)) {
				jQuery.ajax({
					type: 'GET',
					url: defaultUrlDisponibilidad,
					async: false,
					data: {'mes':mes,'anio':anio,'id':_GET.company},
					dataType: 'jsonp',
					cache: false,
					success: function(result) {
					    fechasCalendario = fechasLibres = result;

						if(datepickerInitiate == 0){
							datepickerInitiate = 1;
							initDatePicker();
							modEstilosBotones();
					    }else{
							if (selectedRange == false) {

								ObtenerDiasSalida();
								fechasCalendario = fechasLlegada;
							}
					    }
						calendarBox.datepicker("refresh");
					}
				});
			}
		} //fin function ObtenerFechas(mes, anio){...

		ObtenerFechas(mes+1, anio); 

		function ObtenerDiasSalida(){

			fechasLlegada = [];

			primerFechaLibre = fechasLibres[0];
			dPrimerFechaLibre = primerFechaLibre.split('-');
			datePrimerFechaLibre = new Date(dPrimerFechaLibre[2],parseInt(dPrimerFechaLibre[1]-1),dPrimerFechaLibre[0]);

			if (oldFechasLlegada.length == 0) {

				dateUltimoDia = new Date();

			}else{

				ultimodia = oldFechasLlegada[oldFechasLlegada.length - 1];
				dUltimodia = ultimodia.split('-');
				tempDateUltimoDia = new Date(dUltimodia[2],parseInt(dUltimodia[1]-1),dUltimodia[0]);

				dateUltimoDia = tempDateUltimoDia;
			}

			prvDate = new Date(prv);
			dayini = prvDate.getDate();
			month = prvDate.getMonth() + 1;
	
			if (month < 10) { month = '0' + month; }


			year = prvDate.getFullYear();

			dayiniOtroMes = 0;

			jQuery.each( fechasLibres, function( key, value ) {

				dValue = value.split('-');		

				// EStamos en el mes actual
				if(dValue[1] == month && dValue[2] == year){
					if( dValue[0] == dayini){

						dayini++;
						fechasLlegada.push(dayini+'-'+dValue[1]+'-'+dValue[2]);
					}

				// estamos en otro mes comenzamos desde el dia 1
				}else{

					if(dayiniOtroMes == 0 && fechasLlegada.length == 0){

						tempTime = new Date(dValue[2],parseInt(dValue[1]-1),parseInt(dayiniOtroMes+1));

						if(/*ultimoDisponible && */((dValue[1] > month && dValue[2] == year) ||  dValue[2] > year) && dateUltimoDia.getTime() >= tempTime.getTime() ){

							dayiniOtroMes++;
							fechasLlegada.push(dayiniOtroMes+'-'+dValue[1]+'-'+dValue[2]);
							
						}else{
							dayiniOtroMes = 90;
						}

					}
					if(dValue[0] == dayiniOtroMes){
		
						dayiniOtroMes++;
						fechasLlegada.push(dayiniOtroMes+'-'+dValue[1]+'-'+dValue[2]);
					}



				}


			});
			if (fechasLlegada.length != 0) {
				oldFechasLlegada = fechasLlegada;
			}
		}


		function DisponibilidadDia(date) {
		    
			currentMonth = date.getMonth() + 1;
			
			if (currentMonth < 10) { currentMonth = '0' + currentMonth; }

		    dmy = date.getDate() + "-" + currentMonth + "-" + date.getFullYear();
		    
		    resultType = true;
		    resultClass = 'disponible';
		    resultText = 'Disponible';


		    if (jQuery.inArray(dmy, fechasCalendario) == -1) {
			    resultType = false;
			    resultClass = 'ocupado';
			    resultText = 'Ocupado';
		    } else {
			    resultType = true;
			    resultClass = 'disponible';
			    resultText = 'Disponible';
		    }


			if (selectedRange) {
			    if(date.getTime() >= Math.min(prv, cur) && date.getTime() <= Math.max(prv, cur)){
				    if (jQuery.inArray(dmy, fechasCalendario) == -1) {
						resultType = false;
				    }else{

					    resultType = true;
				    }
				    resultClass = 'date-range-selected';
				    resultText = 'Seleccionado';
			    }

			}else if(date.getTime() == prv){
				resultType = false;
				resultClass = 'date-range-selected';
				resultText = 'Seleccionado';
			}

			return [resultType, resultClass, resultText];
		}

		function prepareBooking(prvDate, curDate, dateText) {

			fechaLlegada = new Date(prvDate);
			dia = fechaLlegada.getDate();
			mes = fechaLlegada.getMonth() + 1;
			anio = fechaLlegada.getFullYear();

			fechaSalida = new Date(curDate);
			var diaTomorrow = '';
			var mesTomorrow = '';
			var anioTomorrow = '';

		    if(prvDate == curDate){

				fechaSalida.setDate(fechaLlegada.getDate() + 1);
				calendarInput.val( dateText );

		    }else{

				d1 = jQuery.datepicker.formatDate( dtCalendar.dateFormat, new Date(Math.min(prvDate,curDate)), {} );
				d2 = jQuery.datepicker.formatDate( dtCalendar.dateFormat, new Date(Math.max(prvDate,curDate)), {} );


				calendarInput.val( d1+' - '+d2);

			}

			diaTomorrow = fechaSalida.getDate();
			mesTomorrow = fechaSalida.getMonth() + 1;
			anioTomorrow = fechaSalida.getFullYear();		

			dia = ("0" + dia).slice (-2);
			mes = ("0" + mes).slice (-2);
			diaTomorrow = ("0" + diaTomorrow).slice (-2);
			mesTomorrow = ("0" + mesTomorrow).slice (-2);

            caracterUnion = '?';

			if (_GET.altbookingpage !== undefined && _GET.altbookingpage !== null) {
				
				urlReservar = _GET.altbookingpage;
				if(urlReservar.indexOf('?')>0){
					caracterUnion = '&';
				}

			}

			var urlR = 'https://'+urlReservar+caracterUnion+'id='+_GET.company+'&idmultiest='+_GET.reseller+'&procede_multi_est='+_GET.procede_reseller+'&csd=1&i='+languageParams.idLanguage+'&diadesde='+dia+'&mesdesde='+mes+'&aniodesde='+anio+'&diahasta='+diaTomorrow+'&meshasta='+mesTomorrow+'&aniohasta='+anioTomorrow;

			btnReservar.attr('href', urlR);

		    if(prvDate != curDate && prvDate != -1){
		    	btnReservar.unbind('click')
				.removeClass('desactivar')
				.css({'background-color':'#'+_GET.color,
					'border': '1px solid #'+_GET.color
				});
			}else{
				btnReservar.click(function () {return false;});
				btnReservar.addClass('desactivar')
				.css({'background-color':'#ffffff',
					'border': '1px solid #c3c3c3'
				});
			}


		}

		function initDatePicker(date) {

			calendarBox.datepicker({
				minDate: new Date(anioActual, mesActual, diaActual-1),
				changeMonth: true,
				changeYear: true,
				numberOfMonths: 1,
				showButtonPanel: true,
				closeText: dtCalendar.closeText,
				prevText: dtCalendar.prevText,
				nextText: dtCalendar.nextText,
				currentText: dtCalendar.currentText,
				monthNames: dtCalendar.monthNames,
				monthNamesShort: dtCalendar.monthNamesShort,
				dayNames: dtCalendar.dayNames,
				dayNamesShort: dtCalendar.dayNamesShort,
				dayNamesMin: dtCalendar.dayNamesMin,
				weekHeader: dtCalendar.weekHeader,
				dateFormat: dtCalendar.dateFormat,
				firstDay: dtCalendar.firstDay,
				isRTL: dtCalendar.isRTL,
				showMonthAfterYear: dtCalendar.showMonthAfter,
				yearSuffix: dtCalendar.yearSuffix,
				beforeShowDay: DisponibilidadDia,
				onChangeMonthYear: function(year, month, inst){
						    
					if ((ultimoDisponible && month >= mes)  || (month == mes && selectedRange == false) || selectedRange == true && ultimoDisponible && month > mes) {
						ObtenerFechas(month, year);

					}else{

						if(selectedRange == false /*|| (selectedRange == true && month > mes)*/){

							fechasLibres = [];
						}
						ObtenerFechas(month, year);
					}
				
				},
	            onSelect: function ( dateText, inst ) {
	                var d1, d2;

	                prv = cur;
	                cur = (new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay)).getTime();

					if ( prv == -1 || prv == cur || selectedRange == true ) {
	                    
	                    prv = cur;

						selectedRange = false;

						ObtenerDiasSalida();

						UltimoDiaMes = new Date(inst.selectedYear, inst.selectedMonth+1, 0);

					    if (jQuery.inArray(UltimoDiaMes.getDate() + "-" + (UltimoDiaMes.getMonth() + 1) + "-" + UltimoDiaMes.getFullYear(), fechasLibres) == -1 && jQuery.inArray((UltimoDiaMes.getDate() + 1 )+ "-" + (UltimoDiaMes.getMonth() + 1) + "-" + UltimoDiaMes.getFullYear(), fechasLlegada) == -1) {

						    ultimoDisponible = false;

					    } else {
						    
						    ultimoDisponible = true;
					    }

						fechasCalendario = fechasLlegada;

						prepareBooking(prv, cur, dateText);


	                } else {
		                
						selectedRange = true;
						
						fechasCalendario = fechasLibres;

						prepareBooking(prv, cur, dateText);
			           
						modEstilosBotones();

					}
				},
	            onAfterUpdate: function ( inst ) {

					textLlegada = '';
					textSalida = '';
					claseLlegada = ' fecha_no';
					claseSalida = ' fecha_no';
	                if(selectedRange == true &&  prv == -1){
						textLlegada= languageParams.strSinSeleccionar;
						textSalida = languageParams.strSinSeleccionar;
						claseLlegada = ' fecha_no';
						claseSalida = ' fecha_no';

	                }else{
		                if(selectedRange == true){
							textLlegada = jQuery.datepicker.formatDate( dtCalendar.dateFormat, new Date(prv), {} );
							textSalida = jQuery.datepicker.formatDate( dtCalendar.dateFormat, new Date(cur), {} );
							claseLlegada = ' fecha_si';
							claseSalida = ' fecha_si';
							calendarBox.hide();
		                }else{
			                if( prv == -1 || prv == cur ){

								textLlegada = jQuery.datepicker.formatDate( dtCalendar.dateFormat, new Date(cur), {} );
								textSalida = languageParams.strSinSeleccionar;
								claseLlegada = ' fecha_si';
								claseSalida = ' fecha_no';
			                }
			            }
					}

					leyenda = jQuery('#calendar_box .ui-datepicker-buttonpane');
					leyenda.text('').append('<div id="ui-datepicker-info"><div id="ui-datepicker-info-llegada">'+languageParams.strLLegada+'<br><span class="fecha'+claseLlegada+'">'+textLlegada+'</span></div><div id="ui-datepicker-info-salida">'+languageParams.strSalida+'<br><span class="fecha'+claseSalida+'">'+textSalida+'</span></div><div class="clear"></div></div>');

	            }

	        }).hide();

			calendarInput.on('click', function (e) {
		        var v = this.value,
		            d;
		        try {
		            if ( v.indexOf(' - ') > -1 ) {
						d = v.split(' - ');

						prv = jQuery.datepicker.parseDate( dtCalendar.dateFormat, d[0] ).getTime();
						cur = jQuery.datepicker.parseDate( dtCalendar.dateFormat, d[1] ).getTime();

		            } else if ( v.length > 0 ) {
						prv = cur = jQuery.datepicker.parseDate( dtCalendar.dateFormat, v ).getTime();
		            }
				}catch(e){
		            cur = prv = -1;
		        }

		        if ( cur > -1 ){
		            calendarBox.datepicker('setDate', new Date(cur));
		        }
		        calendarBox.datepicker('refresh').show();
		    });

			//calendarBox.datepicker( "option", jQuery.datepicker.regional[languageParams.iso] );

			btnReservar.click(function () {return false;});
	        
		}

	});

	jQuery.datepicker._defaults.onAfterUpdate = null;

	var datepicker__updateDatepicker = jQuery.datepicker._updateDatepicker;
	jQuery.datepicker._updateDatepicker = function( inst ) {
		datepicker__updateDatepicker.call( this, inst );

		var onAfterUpdate = this._get(inst, 'onAfterUpdate');
		if (onAfterUpdate){
			onAfterUpdate.apply((inst.input ? inst.input[0] : null),
				[(inst.input ? inst.input.val() : ''), inst]);
		}
	};
}