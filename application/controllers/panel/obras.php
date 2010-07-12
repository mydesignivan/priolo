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
            'listObras'     =>  $this->obras_model->get_list_panel()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function form(){
        $id = $this->uri->segment(4);

        $tlp_script = array('fancybox', 'validator', 'json', 'picturegallery', 'obras');

        if( $id ){  // Edit
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        =>  'panel/obras_form_view.php',
                'tlp_script'         =>  $tlp_script,
                'tlp_title_section'  =>  'Modificar Obra',
                'info'               =>  $this->obras_model->get_info($id)
            ));

        }else{    // New
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        =>  'panel/obras_form_view.php',
                'tlp_script'         =>  $tlp_script,
                'tlp_title_section'  =>  'Nueva Obra'
            ));
        }

        $this->load->view('template_panel_view', $this->_data);
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->obras_model->create();
            if( $res['status']=="error" ){
                $this->session->set_flashdata('msgerror', $res['msgerror']);
            }

            redirect($res['status']=="ok" ? '/panel/obras/' : '/panel/obras/form/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->_upload();

            if( $res['status']=="ok" ){
                if( !empty($this->_file['tmp_name']) && $_POST['filename']!=$this->_filename ) $this->_delete_images($_POST['filename']);

                $res = $this->products_model->edit($_POST['product_id'], $this->_filename);

                if( $res['status']=="error" ) $this->_delete_images($this->_filename);
            }

            if( $res['status']=="error" ){
                $this->session->set_flashdata('savestatus', $res['status']);
                $this->session->set_flashdata('msgerror', @$res['msgerror']);
            }

            redirect($res['status']=="ok" ? '/panel/products/' : '/panel/products/form/'.$_POST['product_id']);
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_check_exists(){
        die($this->obras_model->check() ? "yes" : "no");
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>