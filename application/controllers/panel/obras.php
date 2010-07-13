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
            'tlp_script'    =>  array('sortable', 'obras_list'),
            'listObras'     =>  $this->obras_model->get_list_panel()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function form(){
        $id = $this->uri->segment(4);

        $tlp_script = array('fancybox', 'validator', 'json', 'picturegallery', 'sortable', 'obras_form');

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
                $this->session->set_flashdata('status', 'error');
                $this->session->set_flashdata('message', 'Los datos no han podido ser guardado.');
            }

            redirect($res['status']=="success" ? '/panel/obras/' : '/panel/obras/form/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->obras_model->edit();
            $this->session->set_flashdata('status', $res['status']);
            if( $res['status']=="error" ){
                $this->session->set_flashdata('message', 'Los datos no han podido ser guardado.');
            }else{
                $this->session->set_flashdata('message', 'Los datos han sido guardado con &eacute;xito.');
            }

            redirect('/panel/obras/form/'.$_POST['obra_id']);
        }
    }

    public function delete(){
        if( !$this->obras_model->delete($this->uri->segment(4)) ){
            $this->session->set_flashdata('status', 'error');
            $this->session->set_flashdata('message', 'No se pudo eliminar la obra seleccionada.');
        }
        redirect('/panel/obras/');
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