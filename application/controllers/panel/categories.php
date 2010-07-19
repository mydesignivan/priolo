<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("categories_model");
        
        $this->load->library('dataview', array(
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Categor&iacute;as"
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        //print_array($this->categories_model->get_list(), true);
        
        $this->_data = $this->dataview->set_data(array(
            'tlp_section'    =>  'panel/categories_list_view.php',
            'tlp_script'     =>  array('aerowindows', 'categories'),
            'listCategories' =>  $this->categories_model->get_list()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_show_form(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->helper('form');

            $data = array('comboCategories'=>$this->categories_model->get_combo_categories(0, array('0' => '--Ninguno--')));

            if( isset($_POST['id']) ){
                $data['info'] = $this->categories_model->get_info($_POST['id']);
            }

            $this->load->view('panel/ajax/popup_form_view', $data);
    }
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>