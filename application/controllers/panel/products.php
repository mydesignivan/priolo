<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("products_model");
        $this->load->library('dataview', array(
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Productos"
        ));
        $this->_data = $this->dataview->get_data();

        $this->load->library('superupload', array(
            'path' => UPLOAD_DIR_PRODUCTS,
            'thumb_width' => IMAGE_THUMB_WIDTH_PRODUCTS,
            'thumb_height' => IMAGE_THUMB_HEIGHT_PRODUCTS,
            'image_width' => IMAGE_ORIGINAL_WIDTH_PRODUCTS,
            'image_height' => IMAGE_ORIGINAL_HEIGHT_PRODUCTS,
            'maxsize' => UPLOAD_MAXSIZE_IMG,
            'filetype' => UPLOAD_FILETYPE_IMG
        ));


        $this->_count_per_page=5;
        $uri = $this->uri->uri_to_assoc(1);
        $this->_offset = !isset($uri['page']) ? 0 : $uri['page'];
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;
    private $_count_per_page;
    private $_offset;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->library('pagination');
        $this->load->helper('text');

        $listProducts = $this->products_model->get_list_panel($this->_count_per_page, $this->_offset);
        
        $config['base_url'] = site_url('/panel/products/index/page/');
        $config['total_rows'] = $listProducts['count_rows'];
        $config['per_page'] = $this->_count_per_page;
        $config['uri_segment'] = $this->uri->total_segments();
        $this->pagination->initialize($config);

        $this->_data = $this->dataview->set_data(array(
            'tlp_section'     =>  'panel/products_list_view.php',
            'tlp_script'      =>  array('sortable', 'json', 'products_list'),
            'listProducts'    =>  $listProducts['result']
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function form(){
        $this->load->model("categories_model");
        $this->load->helper('form');

        $id = $this->uri->segment(4);

        $tlp_script = array('fancybox', 'validator', 'json', 'products_form');
        $listCategories = $this->categories_model->get_categories_combo();


        if( $id ){  // Edit
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        =>  'panel/products_form_view.php',
                'tlp_script'         =>  $tlp_script,
                'tlp_title_section'  =>  'Modificar Producto',
                'info'               =>  $this->products_model->get_info($id)->row_array(),
                'listCategories'     =>  $listCategories
            ));

        }else{    // New
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        =>  'panel/products_form_view.php',
                'tlp_script'         =>  $tlp_script,
                'tlp_title_section'  =>  'Nuevo Producto',
                'listCategories'     =>  $listCategories
            ));
        }

        $this->load->view('template_panel_view', $this->_data);
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $outUpload = $this->superupload->upload();

            $status = $outUpload[0]['status'];

            if( $status=="success" ){
                $status = $this->products_model->create($outUpload[0]);

                if( $status=="error" ){
                    $this->session->set_flashdata('status', 'error');
                    $this->session->set_flashdata('message', 'Los datos no han podido ser guardado.');

                    @unlink(UPLOAD_DIR_PRODUCTS . $outUpload[0]['filename_image']);
                    @unlink(UPLOAD_DIR_PRODUCTS . $outUpload[0]['filename_thumb']);
                }
            }else{
                $this->session->set_flashdata('status', 'error');
                $this->session->set_flashdata('message', $outUpload[0]['error_msg']);
            }

            redirect($status=="success" ? '/panel/products/' : '/panel/products/form/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->products_model->edit();
            $this->session->set_flashdata('status', $res['status']);
            if( $res['status']=="error" ){
                $this->session->set_flashdata('message', 'Los datos no han podido ser guardado.');
            }else{
                $this->session->set_flashdata('message', 'Los datos han sido guardado con &eacute;xito.');
            }

            redirect('/panel/products/form/'.$_POST['products_id']);
        }
    }

    public function delete(){
        if( is_numeric($this->uri->segment(4)) ){
            if( !$this->products_model->delete($this->uri->segment(4)) ){
                $this->session->set_flashdata('status', 'error');
                $this->session->set_flashdata('message', 'No se pudo eliminar el producto seleccionado.');
            }
            redirect('/panel/products/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_check_exists(){
        die($this->products_model->check() ? "yes" : "no");
    }
    public function ajax_order(){
        echo $this->proveedores_model->order() ? "success" : "error";
        die();
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>