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
        //die( '<textarea cols="22" rows="10">'. $this->categories_model->get_list() .'</textarea>' );

        $this->_data = $this->dataview->set_data(array(
            'tlp_section'    =>  'panel/categories_list_view.php',
            'tlp_script'     =>  array('aerowindows', 'json', 'categories_list'),
            'listCategories' =>  $this->categories_model->get_list()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            echo json_encode(array(
                'error'  => !$this->categories_model->create(),
                'result' => $this->categories_model->get_list()
            ));
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            echo json_encode(array(
                'error'  => !$this->categories_model->edit(),
                'result' => $this->categories_model->get_list()
            ));
        }
    }

    public function delete(){

        $uri = $this->uri->segment_array();
        $uri = array_slice($uri, 3);

        if( count($uri)>0 ){
            $res = $this->categories_model->delete($uri);
            if( $res['error'] ){
                $msg = "Las siguientes categorias no pudieron ser eliminadas:<br /><br />".implode("<br />", $res['categories']);
                $this->session->set_flashdata('status', "error");
                $this->session->set_flashdata('message', $msg);
            }
            redirect('/panel/categories/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_show_form(){
        $this->load->helper('form');

        $data = array(
            'tlp_section'     => 'panel/ajax/popup_form_view.php',
            'tlp_script'      => array('json', 'validator', 'categories_form'),
            'comboCategories' => $this->categories_model->get_combo_categories(0, array('0' => '--Ninguno--'))
        );

        if( is_numeric($this->uri->segment(4)) ){
            $data['info'] = $this->categories_model->get_info($this->uri->segment(4));
        }

        $this->load->view('template_ajax_view', $data);
    }
    
    public function ajax_order(){
        echo $this->categories_model->order() ? "success" : "error";
        die();
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>