<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Obras_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_list(){
        $this->db->order_by('order', 'asc');
        $listObras = $this->db->get(TBL_OBRAS)->result_array();

        $result['listObras'] = $listObras;

        foreach( $listObras as $row ){
            $this->db->where('obra_id', $row['obra_id']);
            $this->db->order_by('order', 'asc');
            $listObrasGallery = $this->db->get(TBL_OBRASGALLERY);
            if( $listObrasGallery->num_rows>0 ) $result['listGallery'][$row['obra_id']] = $listObrasGallery->result_array();
        }

        //print_array($result, true);
        
        return $result;
    }

    public function get_list2(){
        $this->db->order_by('order', 'asc');
        return $this->db->get(TBL_OBRAS)->result_array();
    }
    
}
?>