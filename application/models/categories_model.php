<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_list_categories(){
        $this->db->order_by('order', 'asc');       
        $listCategories = $this->db->get(TBL_CATEGORIES)->result_array();

        $result['listCategories'] = $listCategories;

        foreach( $listCategories as $row ){
            $this->db->where('parent_id', $row['categories_id']);
            $this->db->order_by('order', 'asc');
            $listSubCategories = $this->db->get(TBL_PRODUCTSCATEGORIES);
            if( $listSubCategories->num_rows>0 ) $result['listSubCategories'][$row['obra_id']] = $listObrasGallery->result_array();
        }


    }

}
?>