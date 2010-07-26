<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("products_model");
        $this->load->model("categories_model");

        $this->load->library('dataview', array(
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Productos"
        ));
        $this->_data = $this->dataview->get_data();

        $this->load->library('superupload', array(
            'path'          => UPLOAD_DIR_PRODUCTS,
            'thumb_width'   => IMAGE_THUMB_WIDTH_PRODUCTS,
            'thumb_height'  => IMAGE_THUMB_HEIGHT_PRODUCTS,
            'image_width'   => IMAGE_ORIGINAL_WIDTH_PRODUCTS,
            'image_height'  => IMAGE_ORIGINAL_HEIGHT_PRODUCTS,
            'maxsize'       => UPLOAD_MAXSIZE_IMG,
            'filetype'      => UPLOAD_FILETYPE_IMG
        ));


        $this->_count_per_page=10;
        $uri = $this->uri->uri_to_assoc(2);
        //print_array($uri, true);
        $this->_offset = !isset($uri['page']) || empty($uri['page']) ? 0 : $uri['page'];
        //echo $this->_offset."<br>";
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;
    private $_count_per_page;
    private $_offset;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->display();
    }

    public function showcat(){
        $id = $this->uri->segment(4);
        $this->display($id, site_url('/panel/products/showcat/'.$id.'/page/'));
    }

    public function display($categorie_id=0, $base_url=null){
        $this->load->library('pagination');
        $this->load->helper('text');

        $listProducts = $this->products_model->get_list_panel($this->_count_per_page, $this->_offset, $categorie_id);

        if( $base_url==null ) $base_url = site_url('/panel/products/index/page/');

        $config['base_url'] = $base_url;
        $config['total_rows'] = $listProducts['count_rows'];
        $config['per_page'] = $this->_count_per_page;
        $config['uri_segment'] = $this->uri->total_segments();
        $this->pagination->initialize($config);

        $this->_data = $this->dataview->set_data(array(
            'tlp_section'      => 'panel/products_list_view.php',
            'tlp_script'       => array('sortable', 'json', 'products_list'),
            'listProducts'     => $listProducts['result'],
            'comboCategories'  => $this->categories_model->get_combo_catprod(array('0'=>'Todos')),
            'var_pag_countreg' => $listProducts['count_rows'],
            'var_pag_base_url' => $base_url,
            'var_pag_offset'   => $this->_offset,
            'var_pag_countperpage' => $this->_count_per_page
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function form(){
        $this->load->helper('form');

        $id = $this->uri->segment(4);

        $tlp_script = array('fancybox', 'validator', 'products_form');
        $comboCategories = $this->categories_model->get_combo_categories();
        $comboProducts = $this->products_model->get_combo_products();


        if( $id ){  // Edit
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        =>  'panel/products_form_view.php',
                'tlp_script'         =>  $tlp_script,
                'tlp_title_section'  =>  'Modificar Producto',
                'info'               =>  $this->products_model->get_info($id)->row_array(),
                'comboCategories'    =>  $comboCategories,
                'comboProducts'      =>  $comboProducts
            ));

        }else{    // New
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        =>  'panel/products_form_view.php',
                'tlp_script'         =>  $tlp_script,
                'tlp_title_section'  =>  'Nuevo Producto',
                'comboCategories'    =>  $comboCategories,
                'comboProducts'      =>  $comboProducts
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
                    $message = 'Los datos no han podido ser guardado.';

                    @unlink(UPLOAD_DIR_PRODUCTS . $outUpload[0]['filename_image']);
                    @unlink(UPLOAD_DIR_PRODUCTS . $outUpload[0]['filename_thumb']);
                }
            }else $message = $outUpload[0]['error_msg'];

            if( $status=="error"){
                $this->session->set_flashdata('status', $status);
                $this->session->set_flashdata('message', $message);
            }

            redirect($status=="success" ? '/panel/products/' : '/panel/products/form/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $uploaded = $_FILES['txtUploadFile']['name']!='';
            $status="success";

            if( $uploaded ) {
                $outUpload = $this->superupload->upload();
                $status = $outUpload[0]['status'];
            }

            if( $status=="success" ){
                $status = $this->products_model->edit($uploaded ? $outUpload[0] : null);

                if( $status=="error" ){
                    $message = 'Los datos no han podido ser guardado.';

                    if( $uploaded ) {
                        @unlink(UPLOAD_DIR_PRODUCTS . $outUpload[0]['filename_image']);
                        @unlink(UPLOAD_DIR_PRODUCTS . $outUpload[0]['filename_thumb']);
                    }

                }else $message = 'Los datos han sido guardado con &eacute;xito.';
            }else $message = $outUpload[0]['error_msg'];

            $this->session->set_flashdata('status', $status);
            $this->session->set_flashdata('message', $message);
            redirect('/panel/products/form/'.$_POST['products_id']);
        }
    }

    public function delete(){
        $uri = $this->uri->segment_array();
        $uri = array_slice($uri, 3);

        if( count($uri)>0 ){
            if( !$this->products_model->delete($uri) ){
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
        echo $this->products_model->order() ? "success" : "error";
        die();
    }
    public function ajax_search(){
        echo $this->products_model->search();
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>