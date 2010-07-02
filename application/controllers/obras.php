<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Obras extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('obras_model');
        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/obras_view.php',
            'tlp_title'            =>  TITLE_OBRAS,
            'tlp_title_section'    =>  "Obras",
            'tlp_meta_description' => META_DESCRIPTION_OBRAS,
            'tlp_meta_keywords'    => META_KEYWORDS_OBRAS
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
            'tlp_script' => array('fancybox'),
            'list'  => $this->obras_model->get_list()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}
?>