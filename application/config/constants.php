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
| MENSAJES DE ERROR
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a %s MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

define('ERR_DB_UPDATE', 'Ha ocurrido un error al tratar de actualizar la tabla "%s".');
define('ERR_DB_INSERT', 'Ha ocurrido un error al tratar de insertar datos en la tabla "%s".');
define('ERR_DB_DELETE', 'Ha ocurrido un error al tratar de eliminar datos en la tabla "%s".');

/*
|--------------------------------------------------------------------------
| EMAIL FORM REGISTRO
|--------------------------------------------------------------------------
*/
$msg = 'Hola, %s.<br /><br />';
$msg.= 'Por favor confirme su cuenta de AlquileresTemporarios.org haciendo click en este link:<br /><br />';
$msg.= '<a href="%s">%s</a><br /><br />';
$msg.= 'Una vez confirmado, usted tendra acceso completo a AlquileresTemporarios.org y todas las notificaciones futuras seran enviadas a esta cuenta de email.<br /><br />';
$msg.= 'Muchas Gracias!<br />AlquileresTemporarios.org';

define('EMAIL_REG_FROM', 'no-reply@alquilerestemporarios.org');
define('EMAIL_REG_NAME', 'AlquileresTemporarios.org');
define('EMAIL_REG_SUBJECT', 'Confirme su cuenta de AlquileresTemporarios.org');
define('EMAIL_REG_MESSAGE', $msg);

/*
|--------------------------------------------------------------------------
| UPLOAD FILE
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


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */