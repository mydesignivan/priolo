<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Obras extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('obras_model');
        $this->load->model('proveedores_model');

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/obras_view.php',
            'tlp_title'            =>  TITLE_OBRAS,
            'tlp_title_section'    =>  "Obras",
            'tlp_meta_description' => META_DESCRIPTION_OBRAS,
            'tlp_meta_keywords'    => META_KEYWORDS_OBRAS,
            'tlp_sidebar'          => $this->proveedores_model->get_list_front()
        ));
        $this->_data = $this->dataview->get_data();

        $this->_count_per_page = 10;
        $uri = $this->uri->uri_to_assoc(2);
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

        $listObras = $this->obras_model->get_list_front($this->_count_per_page, $this->_offset);

        $config['base_url'] = site_url('/obras/page/');
        $config['total_rows'] = $listObras['count_rows'];
        $config['per_page'] = $this->_count_per_page;
        $config['uri_segment'] = $this->uri->total_segments();
        $this->pagination->initialize($config);

        $this->_data = $this->dataview->set_data(array(
            'tlp_script' => array('fancybox'),
            'list'       => $listObras['result']
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}
?>