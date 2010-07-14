<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Proveedores extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("proveedores_model");
        $this->load->library('dataview', array(
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Proveedores"
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
            'tlp_section'     =>  'panel/proveedores_list_view.php',
            'tlp_script'      =>  array('sortable', 'json', 'proveedores_list'),
            'listProveedores' =>  $this->proveedores_model->get_list_panel()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function form(){
        $id = $this->uri->segment(4);

        $tlp_script = array('fancybox', 'validator', 'json', 'picturegallery', 'sortable', 'proveedores_form');

        if( $id ){  // Edit
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        =>  'panel/proveedores_form_view.php',
                'tlp_script'         =>  $tlp_script,
                'tlp_title_section'  =>  'Modificar Proveedor',
                'info'               =>  $this->proveedores_model->get_info($id)
            ));

        }else{    // New
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        =>  'panel/proveedores_form_view.php',
                'tlp_script'         =>  $tlp_script,
                'tlp_title_section'  =>  'Nuevo Proveedor'
            ));
        }

        $this->load->view('template_panel_view', $this->_data);
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->proveedores_model->create();
            if( $res['status']=="error" ){
                $this->session->set_flashdata('status', 'error');
                $this->session->set_flashdata('message', 'Los datos no han podido ser guardado.');
            }

            redirect($res['status']=="success" ? '/panel/proveedores/' : '/panel/proveedores/form/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->proveedores_model->edit();
            $this->session->set_flashdata('status', $res['status']);
            if( $res['status']=="error" ){
                $this->session->set_flashdata('message', 'Los datos no han podido ser guardado.');
            }else{
                $this->session->set_flashdata('message', 'Los datos han sido guardado con &eacute;xito.');
            }

            redirect('/panel/proveedores/form/'.$_POST['proveedor_id']);
        }
    }

    public function delete(){
        if( is_numeric($this->uri->segment(4)) ){
            if( !$this->proveedores_model->delete($this->uri->segment(4)) ){
                $this->session->set_flashdata('status', 'error');
                $this->session->set_flashdata('message', 'No se pudo eliminar el proveedor seleccionada.');
            }
            redirect('/panel/proveedores/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_check_exists(){
        die($this->proveedores_model->check() ? "yes" : "no");
    }
    public function ajax_order(){
        echo $this->proveedores_model->order() ? "success" : "error";
        die();
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>