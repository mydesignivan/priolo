<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();

        $this->_combo_options = array();
        $this->_combo_separator = '&nbsp;&nbsp;&nbsp;&nbsp;';
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_combo_separator;
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

    public function get_combo_categories($parent_id=0, $itemDefault=array('0'=>'Seleccione una Categor&iacute;a')){
        if( count($this->_combo_options)==0 ){
            $key = key($itemDefault);
            $this->_combo_options[$key] = $itemDefault[$key];
        }

        $this->db->order_by('`order`', 'asc');
        $query = $this->db->get_where(TBL_CATEGORIES, array('parent_id'=>$parent_id));
        foreach( $query->result_array() as $row ){

            $val = $row['categorie_name'];
            if( $row['level']!=0 ) {
                $separator='';
                for( $n=1; $n<=$row['level']; $n++ ) $separator.= $this->_combo_separator;
                $val = $separator . $val;
            }

            $this->_combo_options[$row['categories_id']] = $val;
            $this->get_combo_categories($row['categories_id']);
        }

        return $this->_combo_options;
    }

    public function get_combo_catprod($itemDefault=array('0'=>'Seleccione una Categor&iacute;a')){

        $list = $this->db->get(TBL_V_CATEGORIES)->result_array();
        $output = array();

        $output[key($itemDefault)] = current($itemDefault);

        foreach( $list as $row ){
            $output[$row['categories_id']] = implode(" > ", $this->get_path($row['categories_id']));
        }
        return $output;
    }

    public function get_path($id, &$path=array()){
        $query = $this->db->get_where(TBL_CATEGORIES, array('categories_id'=>$id));

        if( $query->num_rows>0 ){
            $row = $query->row_array();
            $path[] = $row['categorie_name'];
            $this->get_path($row['parent_id'], $path);
        }

        return array_reverse($path);
    }

}
?>