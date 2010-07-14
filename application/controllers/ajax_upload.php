<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax_upload extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();
        $this->load->helper('form');
        $this->load->library('image_lib');

        $this->_ajax = array(
            'error' => false,
            'image' => array(
                'full'  => '',
                'thumb' => '',
                'basename' => '',
                'ext'      => '',
                'width' => '',
                'height' => ''
            ),
            'message' => ''
        );

        $this->_params = array(
            'dir'            => trim(@$_POST['au_dir']), // Obligatorio
            'image_width'    => @$_POST['au_image_width'], // Obligatorio
            'image_height'   => @$_POST['au_image_height'], // Obligatorio
            'thumb_width'    => @$_POST['au_thumb_width'], // Obligatorio
            'thumb_height'   => @$_POST['au_thumb_height'], // Obligatorio
            'watermark'      => isset($_POST['au_watermark']) ? $_POST['au_watermark'] : false, // Opcional
            'watermark_dir'  => isset($_POST['au_watermark']) ? $_POST['au_watermark_dir'] : '' // Opcional
        );
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_file;
    private $_ajax;
    private $_params;


    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->_file = $_FILES[key($_FILES)];

        if( $this->_validate() ){
            $filename = $this->_get_filename();
            $dir_tmp = $this->_params['dir'].'.tmp/';
            $ext = substr($filename, (strripos($filename, ".")-strlen($filename))+1);
            $basename = substr($filename, 0, strripos($filename, "."));
            $this->_ajax['image']['full'] = $dir_tmp . $filename;
            $this->_ajax['image']['thumb'] = $dir_tmp . $basename . "_thumb." . $ext;
            $this->_ajax['image']['basename'] = $basename;
            $this->_ajax['image']['ext'] = $ext;

            // Muevo la imagen original
            move_uploaded_file($this->_file['tmp_name'], $dir_tmp . $filename);

            $sizes = getimagesize($dir_tmp . $filename);

            // Crea una marca de agua en la imagen
            if( $this->_params['watermark'] ){
                $config = array();
                $config['source_image'] = $dir_tmp . $filename;
                $config['wm_type'] = 'overlay';
                $config['wm_overlay_path'] = $this->_params['watermark_dir'];
                $config['wm_vrt_alignment'] = 'bottom';
                $config['wm_hor_alignment'] = 'right';
                $config['wm_opacity'] = '30';
                $this->image_lib->initialize($config);
                if( !$this->image_lib->watermark() ) $this->_show_error($this->image_lib->display_errors());
            }

            // Crea una copia y dimensiona la imagen  (THUMB)
            $config = array();
            $config['source_image'] = $dir_tmp . $filename;
            $config['new_image'] = $dir_tmp . $basename . "_thumb." . $ext;
            $config['width'] = $this->_params['thumb_width'];
            $config['height'] = $this->_params['thumb_height'];

            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if( $this->image_lib->resize() ) {
                $sizeThumb = getimagesize($dir_tmp . $basename.'_thumb.'.$ext);
                $this->_ajax['image']['width'] = $sizeThumb[0];
                $this->_ajax['image']['height'] = $sizeThumb[1];

                // Dimensiona la imagen original   (ORIGINAL)
                if( $sizes[0] > $this->_params['image_width'] || $sizes[1] > $this->_params['image_height'] ){
                    $config = array();
                    $config['source_image'] = $dir_tmp . $filename;
                    if( $sizes[0] > $this->_params['image_width'] ) $config['width'] = $this->_params['image_width'];
                    if( $sizes[1] > $this->_params['image_height'] ) $config['height'] = $this->_params['image_height'];

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);

                    if( $this->image_lib->resize() ) die(json_encode($this->_ajax));
                    else $this->_show_error($this->image_lib->display_errors());

                }else die(json_encode($this->_ajax));

            }else $this->_show_error($this->image_lib->display_errors());

        }
    }

    public function delete(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            @unlink($_POST['au_filename_image']);
            @unlink($_POST['au_filename_thumb']);
            die("ok");
        }
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _validate(){
        if( !is_uploaded_file($this->_file['tmp_name']) ) $this->_show_error(ERR_UPLOAD_NOTUPLOAD);

        $size = (int)UPLOAD_MAXSIZE_IMG;
        if( round($this->_file['size']/1024, 2) > (int)UPLOAD_MAXSIZE_IMG ) {
            $msg = sprintf(ERR_UPLOAD_MAXSIZE, (string)($size/1024));
            $this->_show_error($msg);
        }
        if( !$this->_is_allowed_filetype() ) $this->_show_error(ERR_UPLOAD_FILETYPE);

        return true;
    }

    private function _is_allowed_filetype(){
        require_once(APPPATH.'config/mimes'.EXT);

        $extention = explode("|", UPLOAD_FILETYPE_IMG);
        foreach( $extention as $ext ){
            $mime = $mimes[$ext];

            if( is_array($mime) ){
                if( in_array($this->_file['type'], $mime) ) return true;
            }else{
                if( $mime==$this->_file['type'] ) return true;
            }
        }
        return false;
    }

    private function _get_filename(){
        $name = preg_replace("/\s+/", "_", strtolower($this->_file['name']));
        return uniqid(time()) ."__". $name;
    }

    private function _show_error($msg){
        $this->_ajax['error'] = true;
        $this->_ajax['message'] = $msg;
        die(json_encode($this->_ajax));
    }

}
?>