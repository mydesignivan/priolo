<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Productos extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model(array('products_model', 'categories_model'));
        $this->load->model('proveedores_model');
        $this->load->library('connmodel', array('model_name'=>'categories_model'));
        $this->load->library('pagination');

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/products_view.php',
            'tlp_title'            =>  TITLE_PRODUCTS,
            'tlp_title_section'    =>  "Productos",
            'tlp_script'           =>  "fancybox",
            'tlp_meta_description' => META_DESCRIPTION_PRODUCTS,
            'tlp_meta_keywords'    => META_KEYWORDS_PRODUCTS,
            'tlp_sidebar'          => $this->proveedores_model->get_list_front()
        ));
        $this->_data = $this->dataview->get_data();

        $this->_count_per_page=10;
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
        $this->_display();
    }

    public function show_products(){
        $this->_display($this->uri->segment(2));
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _display($reference=null){
        $listCategories = $this->categories_model->get_categories();
        
        $condition = is_null($reference);

        if( $condition ){
            $arr = $listCategories->result_array();
            $row = $arr[0];
            $title_categorie = $row['categorie_name'];
            $listProducts = $this->products_model->get_products($row['reference'], $this->_count_per_page, $this->_offset);
            $base_url = site_url('/productos/'.$row['reference'].'/page/');
            
        }else{
            $listProducts = $this->products_model->get_products($reference, $this->_count_per_page, $this->_offset);
            $title_categorie = $this->categories_model->get_title($reference);
            $base_url = site_url('/productos/'.$reference.'/page/');
        }

        $config['base_url'] = $base_url;
        $config['total_rows'] = $listProducts['count_rows'];
        $config['per_page'] = $this->_count_per_page;
        $config['uri_segment'] = $this->uri->total_segments();
        $this->pagination->initialize($config);

        $this->_data = $this->dataview->set_data(array(
            'tlp_script'      => array('fancybox'),
            'listCategories'  => $listCategories,
            'listProducts'    => $listProducts['result'],
            'model'           => $this->connmodel->model['categories_model'],
            'title_categorie' => $title_categorie
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

}
?>