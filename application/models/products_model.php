<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_products($reference, $limit, $offset){
        $ret = array();

        $this->db->from(TBL_PRODUCTS);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id='.TBL_PRODUCTSCATEGORIES.'.products_id');
        $this->db->join(TBL_CATEGORIES, TBL_PRODUCTSCATEGORIES.'.categories_id='.TBL_CATEGORIES.'.categories_id OR '.TBL_PRODUCTSCATEGORIES.'.categorie_parent='.TBL_CATEGORIES.'.categories_id');
        $this->db->where(TBL_CATEGORIES.'.reference', $reference);
        $ret['count_rows'] = $this->db->count_all_results();

        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id='.TBL_PRODUCTSCATEGORIES.'.products_id');
        $this->db->join(TBL_CATEGORIES, TBL_PRODUCTSCATEGORIES.'.categories_id='.TBL_CATEGORIES.'.categories_id OR '.TBL_PRODUCTSCATEGORIES.'.categorie_parent='.TBL_CATEGORIES.'.categories_id');
        $this->db->where(TBL_CATEGORIES.'.reference', $reference);
        $this->db->order_by(TBL_PRODUCTS.'.order', 'asc');
        $ret['result'] = $this->db->get(TBL_PRODUCTS, $limit, $offset);

        return $ret;
    }

    public function get_list_panel($limit, $offset){
        $ret = array();

        $sql = TBL_PRODUCTS.".*,";
        $sql.= TBL_CATEGORIES.'.categorie_name';

        $this->db->select($sql, false);
        $this->db->from(TBL_PRODUCTS);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id = '.TBL_PRODUCTSCATEGORIES.'.products_id');
        $this->db->join(TBL_CATEGORIES, TBL_PRODUCTSCATEGORIES.'.categories_id = '.TBL_CATEGORIES.'.categories_id');
        $ret['count_rows'] = $this->db->count_all_results();

        $this->db->select($sql, false);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id = '.TBL_PRODUCTSCATEGORIES.'.products_id');
        $this->db->join(TBL_CATEGORIES, TBL_PRODUCTSCATEGORIES.'.categories_id = '.TBL_CATEGORIES.'.categories_id');
        $this->db->order_by(TBL_PRODUCTS.'.order', 'asc');
        $ret['result'] = $this->db->get(TBL_PRODUCTS, $limit, $offset);

        return $ret;
    }

    public function create($outUpload){
        //print_array($outUpload, true);

        $data['product_name'] = $_POST['txtName'];
        $data['image'] = $outUpload['filename_image'];
        $data['thumb'] = $outUpload['filename_thumb'];
        $data['thumb_width'] = $outUpload['thumb_width'];
        $data['thumb_height'] = $outUpload['thumb_height'];
        $data['order'] = $this->_get_num_order();
        $data['date_added'] = date('Y-m-d H:i:s');

        if( $this->db->insert(TBL_PRODUCTS, $data) ) {
            $products_id = $this->db->insert_id();

            $categorie_parent = $this->db->get_where(TBL_CATEGORIES, array('categories_id' => $_POST['cboCategories']))->row_array();

            $data = array(
                'products_id'      => $products_id,
                'categories_id'    => $_POST['cboCategories'],
                'categorie_parent' => $categorie_parent['parent_id']
            );
            
            if( !$this->db->insert(TBL_PRODUCTSCATEGORIES, $data) ) return "error";

        }else return 'error';

        return 'success';
    }

    public function get_info($where){
        $this->db->from(TBL_PRODUCTS);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id = '.TBL_PRODUCTSCATEGORIES.'.products_id');
        if( is_numeric($where) ) $where = array(TBL_PRODUCTS.'.products_id'=>$where);
        $this->db->where($where);
        return $this->db->get();
    }

    public function check(){
        $where = array(
            TBL_PRODUCTS.'.product_name' => trim($_POST['name']),
            TBL_PRODUCTSCATEGORIES.'.categories_id' => $_POST['categories_id']
        );
        if( is_numeric($_POST['products_id']) ) $where[TBL_PRODUCTS.'.products_id <>'] = $_POST['products_id'];

        $query = $this->get_info($where);

        return $query->num_rows>0;
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order(){
        $this->db->select_max('`order`');
        $row = $this->db->get(TBL_PRODUCTS)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

}
?>