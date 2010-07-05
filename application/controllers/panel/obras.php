<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Obras extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("obras_model");
        $this->load->library('dataview', array(
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Obras"
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->helper('text');

        $this->_data = $this->dataview->set_data(array(
            'tlp_section'   =>  'panel/obras_list_view.php',
            'tlp_script'    =>  array('sortable'),
            'listObras'     =>  $this->obras_model->get_list2()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function form(){
        $this->_data = $this->dataview->set_data(array(
            'tlp_section'   =>  'panel/obras_list_view.php',
            'tlp_script'    =>  array('sortable')
            //'info'          =>  $this->users_model->get_info()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>