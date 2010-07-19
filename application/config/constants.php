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
define('TBL_PRODUCTSCATEGORIES', 'products_to_categories');
define('TBL_CATEGORIES', 'categories');
define('TBL_IMAGES', 'images');
define('TBL_OBRAS', 'obras');
define('TBL_OBRASGALLERY', 'obras_gallery');
define('TBL_PROVEEDORES', 'proveedores');
define('TBL_PROVGALLERY', 'proveedores_gallery');
define('TBL_PAGES', 'pages');
define('TBL_V_CATEGORIES', 'v_categories');
define('TBL_V_PRODUCTS', 'v_products');


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
| UPLOAD FILE PARA IMAGENES EN GENERAL
|--------------------------------------------------------------------------
*/
define('UPLOAD_FILETYPE_IMG', 'gif|jpg|png');
define('UPLOAD_MAXSIZE_IMG', 2048); //Expresado en Kylobytes

/*
|--------------------------------------------------------------------------
| UPLOAD FILE PARA IMAGENES OBRAS
|--------------------------------------------------------------------------
*/
define('UPLOAD_DIR_OBRAS', './uploads/obras/');
define('UPLOAD_DIR_TMP_OBRAS', './uploads/obras/.tmp/');

define('IMAGE_THUMB_WIDTH_OBRAS', 153);
define('IMAGE_THUMB_HEIGHT_OBRAS', 103);
define('IMAGE_ORIGINAL_WIDTH_OBRAS', 800);
define('IMAGE_ORIGINAL_HEIGHT_OBRAS', 600);

/*
|--------------------------------------------------------------------------
| UPLOAD FILE PARA IMAGENES PROVEEDORES
|--------------------------------------------------------------------------
*/
define('UPLOAD_DIR_PROV', './uploads/proveedores/');
define('UPLOAD_DIR_TMP_PROV', './uploads/proveedores/.tmp/');

define('IMAGE_THUMB_WIDTH_PROV', 167);
define('IMAGE_THUMB_HEIGHT_PROV', 100);
define('IMAGE_ORIGINAL_WIDTH_PROV', 800);
define('IMAGE_ORIGINAL_HEIGHT_PROV', 600);

/*
|--------------------------------------------------------------------------
| UPLOAD FILE PARA IMAGENES PRODUCTOS
|--------------------------------------------------------------------------
*/
define('UPLOAD_DIR_PRODUCTS', './uploads/products/');
define('UPLOAD_DIR_TMP_PRODUCTS', './uploads/products/.tmp/');

define('IMAGE_THUMB_WIDTH_PRODUCTS', 128);
define('IMAGE_THUMB_HEIGHT_PRODUCTS', 118);
define('IMAGE_ORIGINAL_WIDTH_PRODUCTS', 800);
define('IMAGE_ORIGINAL_HEIGHT_PRODUCTS', 600);

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
define('TITLE_GLOBAL', 'Ingenieria Termomecanica Priolo');
define('TITLE_INDEX', '');
define('TITLE_EMPRESA', ' - Empresa');
define('TITLE_OBRAS', ' - Obras');
define('TITLE_SERVICIOS', ' - Servicios');
define('TITLE_PRODUCTS', ' - Productos');
define('TITLE_TRABAJECONNOSOTROS', ' - Trabaje con Nosotros');
define('TITLE_CONTACT', ' - Contacto');

/*
|--------------------------------------------------------------------------
| METADATA KEYWORDS
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBAL', '');
define('META_KEYWORDS_INDEX', '');
define('META_KEYWORDS_EMPRESA', '');
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
define('META_DESCRIPTION_EMPRESA', '');
define('META_DESCRIPTION_OBRAS', '');
define('META_DESCRIPTION_SERVICIOS', '');
define('META_DESCRIPTION_PRODUCTS', '');
define('META_DESCRIPTION_TRABAJECONNOSOTROS', '');
define('META_DESCRIPTION_CONTACT', '');



/* End of file constants.php */
/* Location: ./system/application/config/constants.php */