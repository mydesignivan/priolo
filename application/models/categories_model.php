<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();

        $this->_combo_options = array();
        $this->_combo_options[0] = 'Seleccione una Categor&iacute;a';
        $this->_combo_separator = '&nbsp;&nbsp;&nbsp;&nbsp;';
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_combo;
    private $_combo_options;


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

    public function get_categories_combo($parent_id=0){

        $this->db->order_by('order', 'asc');
        $query = $this->db->get_where(TBL_CATEGORIES, array('parent_id'=>$parent_id));
        foreach( $query->result_array() as $row ){

            $val = $row['categorie_name'];
            if( $row['level']!=0 ) {
                $separator='';
                for( $n=1; $n<=$row['level']; $n++ ) $separator.= $this->_combo_separator;
                $val = $separator . $val;
            }

            $this->_combo_options[$row['categories_id']] = $val;
            $query2 = $this->db->get_where(TBL_CATEGORIES, array('parent_id' => $row['categories_id']));
            if( $query2->num_rows>0 ) $this->get_categories_combo($row['categories_id']);
        }

        return $this->_combo_options;
    }

}
?>