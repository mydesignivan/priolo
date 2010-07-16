<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contacto extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('users_model');
        $this->load->model('proveedores_model');

        $this->load->library('dataview', array(
            'tlp_section'          => 'frontpage/contacto_view.php',
            'tlp_title'            => TITLE_CONTACT,
            'tlp_title_section'    => "Contacto",
            'tlp_meta_description' => META_DESCRIPTION_CONTACT,
            'tlp_meta_keywords'    => META_KEYWORDS_CONTACT,
            'tlp_sidebar'          => $this->proveedores_model->get_list_front()
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){        

        $this->_data = $this->dataview->set_data(array(
            'tlp_script'    => array('validator', 'contact'),
            'info'          => $this->users_model->get_info()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');

            $message = sprintf(EMAIL_CONTACT_MESSAGE,
                $_POST['txtName'],
                $_POST['txtEmail'],
                nl2br($_POST['txtConsult'])
            );
            
            $datauser = $this->users_model->get_info();

            $to = $datauser['email'];
            //$to = "ivan@mydesign.com.ar";

            $this->email->from($_POST['txtEmail'], $_POST['txtName']);
            $this->email->to($to);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message($message);
            $status = $this->email->send();
            $this->session->set_flashdata('status_sendmail', $status ? "ok" : "error");

            redirect('/contacto/');
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}
?>