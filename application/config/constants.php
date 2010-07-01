<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 				'rb');
define('FOPEN_READ_WRITE',			'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 	'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 			'ab');
define('FOPEN_READ_WRITE_CREATE', 		'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 		'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',	'x+b');


/*
|--------------------------------------------------------------------------
| NOMBRE DE LAS TABLAS (BASE DE DATO)
|--------------------------------------------------------------------------
*/
define('TBL_USERS', 'users');
define('TBL_PRODUCTS', 'products');
define('TBL_CATEGORY', 'category');
define('TBL_IMAGES', 'images');


/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR PARA UPLOAD
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a %s MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

/*
|--------------------------------------------------------------------------
| EMAIL FORM CONTACTO
|--------------------------------------------------------------------------
*/
$msg = '<b>Nombre:</b> %s<br /><br />';
$msg = '<b>Email:</b> %s<br /><br />';
$msg.= '<b>Consulta:</b><hr color="#000000" />%s';
define('EMAIL_CONTACT_TO', 'ivan@mydesign.com.ar');
define('EMAIL_CONTACT_SUBJECT', 'Formulario de Consulta');
define('EMAIL_CONTACT_MESSAGE', $msg);

/*
|--------------------------------------------------------------------------
| EMAIL FORM TRABAJE CON NOSOTROS
|--------------------------------------------------------------------------
*/
$msg = '<b>Nombre:</b> %s<br /><br />';
$msg = '<b>Email:</b> %s<br /><br />';
$msg.= '<b>Comentario:</b><hr color="#000000" />%s';
define('EMAIL_TCN_TO', 'ivan@mydesign.com.ar');
define('EMAIL_TCN_SUBJECT', 'RRHH');
define('EMAIL_TCN_MESSAGE', $msg);

/*
|--------------------------------------------------------------------------
| UPLOAD FILE PARA IMAGENES
|--------------------------------------------------------------------------
*/
define('UPLOAD_DIR', './uploads/');
define('UPLOAD_DIR_TMP', './uploads/.tmp/');
define('UPLOAD_DIR_WATERMARK', './images/logo_watermark1.png');
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 2048); //Expresado en Kylobytes

define('IMAGE_THUMB_WIDTH', 115);
define('IMAGE_THUMB_HEIGHT', 90);
define('IMAGE_ORIGINAL_WIDTH', 800);
define('IMAGE_ORIGINAL_HEIGHT', 600);

/*
|--------------------------------------------------------------------------
| UPLOAD FILE PARA CURRICULUM
|--------------------------------------------------------------------------
*/
define('UPLOAD_DIR_CV', './uploads/cv/');
define('UPLOAD_FILETYPE_CV', 'doc|pdf|docx|odt');
define('UPLOAD_MAXSIZE_CV', 2048); //Expresado en Kylobytes



/*
|--------------------------------------------------------------------------
| METADATA TITLE
|--------------------------------------------------------------------------
*/
define('TITLE_GLOBAL', 'Ingenieria Termomecanica Priolo - ');
define('TITLE_INDEX', 'Empresa');
define('TITLE_OBRAS', 'Obras');
define('TITLE_SERVICIOS', 'Servicios');
define('TITLE_PRODUCTS', 'Productos');
define('TITLE_TRABAJECONNOSOTROS', 'Trabaje con Nosotros');
define('TITLE_CONTACT', 'Contacto');

/*
|--------------------------------------------------------------------------
| METADATA KEYWORDS
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBAL', '');
define('META_KEYWORDS_INDEX', '');
define('META_KEYWORDS_OBRAS', '');
define('META_KEYWORDS_SERVICIOS', '');
define('META_KEYWORDS_PRODUCTS', '');
define('META_KEYWORDS_TRABAJECONNOSOTROS', '');
define('META_KEYWORDS_CONTACT', '');


/*
|--------------------------------------------------------------------------
| METADATA DESCRIPTIONS
|--------------------------------------------------------------------------
*/
define('META_DESCRIPTION_GLOBAL', '');
define('META_DESCRIPTION_INDEX', '');
define('META_DESCRIPTION_OBRAS', '');
define('META_DESCRIPTION_SERVICIOS', '');
define('META_DESCRIPTION_PRODUCTS', '');
define('META_DESCRIPTION_TRABAJECONNOSOTROS', '');
define('META_DESCRIPTION_CONTACT', '');



/* End of file constants.php */
/* Location: ./system/application/config/constants.php */