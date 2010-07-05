<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Empresa extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/empresa_view.php',
            'tlp_title'            =>  TITLE_EMPRESA,
            'tlp_title_section'    =>  "Empresa",
            'tlp_meta_description' => META_DESCRIPTION_EMPRESA,
            'tlp_meta_keywords'    => META_KEYWORDS_EMPRESA
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