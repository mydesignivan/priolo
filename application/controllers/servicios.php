<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Servicios extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/servicios_view.php',
            'tlp_title'            =>  TITLE_SERVICIOS,
            'tlp_title_section'    =>  "Servicios",
            'tlp_meta_description' => META_DESCRIPTION_SERVICIOS,
            'tlp_meta_keywords'    => META_KEYWORDS_SERVICIOS
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->view('template_frontpage_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}
?>