<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Productos extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model(array('products_model', 'categories_model'));
        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/products_view.php',
            'tlp_title'            =>  TITLE_PRODUCTS,
            'tlp_title_section'    =>  "Productos",
            'tlp_meta_description' => META_DESCRIPTION_PRODUCTS,
            'tlp_meta_keywords'    => META_KEYWORDS_PRODUCTS
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
            'listCategory'  => $this->categories_model->get_list_categories()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}
?>