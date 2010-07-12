<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Obras_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function create(){
        $json = json_decode($_POST['json']);
        //print_array($json, true);

        $data = array(
            'name'       => $_POST['txtName'],
            'order'      => $this->_get_num_order(TBL_OBRAS),
            'date_added' => date('Y-m-d H:i:s')
        );

        $ret_err = array('status'=>'error', 'msgerror'=>'Los datos no han podido ser guardados.');

        $this->db->trans_start(); // INICIO TRANSACCION

        if( $this->db->insert(TBL_OBRAS, $data) ){
            $obra_id = $this->db->insert_id();
            
            foreach( $json as $image ){
                $filename1 = $image->image_basename.".".$image->image_ext;
                $filename2 = $image->image_basename."_thumb.".$image->image_ext;

                $cp1 = @copy($image->image_full, UPLOAD_DIR_OBRAS.$filename1);
                $cp2 = @copy($image->image_thumb, UPLOAD_DIR_OBRAS.$filename2);

                if( $cp1 && $cp2 ){
                    $data = array(
                        'obra_id'    => $obra_id,
                        'image'      => $filename1,
                        'thumb'      => $filename2,
                        'order'      => $this->_get_num_order(TBL_OBRASGALLERY),
                        'date_added' => date('Y-m-d H:i:s')
                    );
                    if( !$this->db->insert(TBL_OBRASGALLERY, $data) ) return $ret_err;
                }else return $ret_err;
            }

        }else return $ret_err;

        //Elimina todas las imagenes temporales
        $dir = UPLOAD_DIR_OBRAS.".tmp/";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                @unlink($dir.$file);
            }
        }

        $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        return array('status'=>'ok');
    }


    public function get_list_front(){
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

    public function get_list_panel(){
        $this->db->order_by('order', 'asc');
        return $this->db->get(TBL_OBRAS)->result_array();
    }

    public function get_info($id){
        $result = $this->db->get_where(TBL_OBRAS, array('obra_id'=>$id));
        
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name){
        $this->db->select_max('`order`');
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

}
?>