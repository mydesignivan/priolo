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
}
?>