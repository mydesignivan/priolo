<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Servicios extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('pages_model');
        $this->load->model('proveedores_model');

        $info = $this->pages_model->get_info('servicios');

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/servicios_view.php',
            'tlp_title'            =>  TITLE_SERVICIOS,
            'tlp_title_section'    =>  $info['title'],
            'tlp_meta_description' => META_DESCRIPTION_SERVICIOS,
            'tlp_meta_keywords'    => META_KEYWORDS_SERVICIOS,
            'tlp_sidebar'          => $this->proveedores_model->get_list_front()
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
            'info' => array('content' => $this->pages_model->get_content('servicios')),
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}
?>