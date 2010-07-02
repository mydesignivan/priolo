<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Myaccount extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("users_model");
        $this->load->library("simplelogin");
        $this->load->library('dataview', array(
            'tlp_section'        =>  'panel/myaccount_view.php',
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Mi Cuenta"
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
            'tlp_script'    =>  array('validator', 'account'),
            'info'          =>  $this->users_model->get_info()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function save(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->users_model->save();
            $this->session->set_flashdata('status', $res ? "ok" : "error");
            redirect('/panel/myaccount/');
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_check_pss(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('encpss');
            $res = $this->users_model->get_info($this->session->userdata('user_id'));
            die( ($this->encpss->decode($res['password'])==$_POST['pss']) ? "ok" : "error");
        }
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>