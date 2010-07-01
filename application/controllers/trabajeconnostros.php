<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Trabajeconnostros extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/trabajeconnostros_view.php',
            'tlp_title'            =>  TITLE_TRABAJECONNOSOTROS,
            'tlp_title_section'    =>  "Trabaje con Nosotros",
            'tlp_script'           => array('validator', 'trabnosotros'),
            'tlp_meta_description' => META_DESCRIPTION_TRABAJECONNOSOTROS,
            'tlp_meta_keywords'    => META_KEYWORDS_TRABAJECONNOSOTROS
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;
    private $_file;
    private $_filename;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            if( $this->_upload() ){                
                $this->load->library('email');

                $message = sprintf(EMAIL_TCN_MESSAGE,
                    $_POST['txtName'],
                    $_POST['txtEmail'],
                    nl2br($_POST['txtComment'])
                );

                $this->email->from($_POST['txtEmail'], $_POST['txtName']);
                $this->email->to(EMAIL_TCN_TO);
                $this->email->subject(EMAIL_TCN_SUBJECT);
                $this->email->attach(UPLOAD_DIR_CV . $this->_filename);
                $this->email->message($message);
                $status = $this->email->send();
                $this->session->set_flashdata('status_sendmail', $status ? "ok" : "error_send");
            }

            redirect('/trabaje-con-nosotros/');
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _upload(){
        $this->load->helper('form');
        $this->_file = $_FILES['txtFileCurri'];

        if( !is_uploaded_file($this->_file['tmp_name']) ) {
            $this->session->set_flashdata('error_upload', ERR_UPLOAD_NOTUPLOAD);
            return false;
        }
        $size = (int)UPLOAD_MAXSIZE_CV;
        if( round($this->_file['size']/1024, 2) > (int)UPLOAD_MAXSIZE_CV ) {
            $this->session->set_flashdata('error_upload', sprintf(ERR_UPLOAD_MAXSIZE, (string)($size/1024)));
            return false;
        }
        if( !$this->_is_allowed_filetype() ) {
            $this->session->set_flashdata('error_upload', ERR_UPLOAD_FILETYPE);
            return false;
        }

        $this->_filename = preg_replace("/\s+/", "_", strtolower($this->_file['name']));
        $this->_filename = uniqid(time())."_".$this->_filename;

        move_uploaded_file($this->_file['tmp_name'], UPLOAD_DIR_CV.$this->_filename);

        return true;
    }

    private function _is_allowed_filetype(){
        require_once(APPPATH.'config/mimes'.EXT);

        $extention = explode("|", UPLOAD_FILETYPE_CV);
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

}
?>