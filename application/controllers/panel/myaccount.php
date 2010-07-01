<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Myaccount extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
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
        $this->load->view('template_panel_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>