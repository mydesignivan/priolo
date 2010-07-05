<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_categories($parent_id=0){
        $sql = 'DISTINCT '.TBL_CATEGORIES.'.*';
        //$sql.= "a(SELECT count(*) FROM ".TBL_PRODUCTSCATEGORIES.' WHERE categories_id='.TBL_CATEGORIES.'.categories_id) as count_products';

        $this->db->select($sql, false);
        $this->db->from(TBL_CATEGORIES);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_CATEGORIES.'.categories_id='.TBL_PRODUCTSCATEGORIES.'.categories_id OR '.TBL_CATEGORIES.'.categories_id='.TBL_PRODUCTSCATEGORIES.'.categorie_parent');
        $this->db->where('parent_id', $parent_id);
        $this->db->order_by(TBL_CATEGORIES.'.order', 'asc');
        return $this->db->get();
    }

    public function get_title($ref){
        $this->db->select('categorie_name');
        $row = $this->db->get_where(TBL_CATEGORIES, array('reference'=>$ref))->row_array();
        return $row['categorie_name'];
    }

}
?>