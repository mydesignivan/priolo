<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));

        $this->load->model('pages_model');

        $this->load->library('dataview', array(
            'tlp_section'          =>  'panel/pages_view.php',
            'tlp_title_section'    => "P&aacute;ginas",
            'tlp_title'            =>  TITLE_INDEX
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
            'tlp_script'    =>  array('tinymce', 'pages'),
            'listPages'     =>  $this->pages_model->get_list()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function update(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            die($this->pages_model->save() ? "success" : "error");
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/


    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>