<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Obras_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/

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

        $this->db->trans_start(); // INICIO TRANSACCION

        if( $this->db->insert(TBL_OBRAS, $data) ){
            $obra_id = $this->db->insert_id();
            if( !$this->_copy_images($json->images_new, $obra_id) ) return array('status'=>'error');

        }else return array('status'=>'error');

        $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

        $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        return array('status'=>'success');
    }

    public function edit(){
        $json = json_decode($_POST['json']);
        //print_array($json, true);

        $data = array(
            'name'          => $_POST['txtName'],
            'last_modified' => date('Y-m-d H:i:s')
        );

        $this->db->trans_off();
        $this->db->trans_start(); // INICIO TRANSACCION

        $this->db->where('obra_id', $_POST['obra_id']);
        if( $this->db->update(TBL_OBRAS, $data) ){
            if( !$this->_copy_images($json->images_new, $_POST['obra_id'], true) ) return array('status'=>'error');
            
        }else array('status'=>'error');

        $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

        // Elimina las imagenes quitadas
        foreach( $json->images_del as $row ){

            if( $this->db->delete(TBL_OBRASGALLERY, array('image'=>$row->image_full)) ){
                @unlink(UPLOAD_DIR_OBRAS . $row->image_full);
                @unlink(UPLOAD_DIR_OBRAS . $row->image_thumb);
            }else return array('status'=>'error');
            
        }

        // Reordena los thumbs
        foreach( $json->images_order as $row ){
            $this->db->where('image', $row->image_full);
            $this->db->update(TBL_OBRASGALLERY, array('order' => $row->order));
        }
        
        $this->db->trans_complete(); // COMPLETO LA TRANSACCION
        
        return array('status'=>'success');
    }

    public function delete($id){
        if( $this->db->delete(TBL_OBRAS, array('obra_id'=>$id)) ){
            $this->db->where('obra_id', $id);

            $list = $this->db->get_where(TBL_OBRASGALLERY, array('obra_id' => $id));
            if( $list->num_rows>0 ){
                if( $this->db->delete(TBL_OBRASGALLERY, array('obra_id'=>$id)) ){
                    foreach( $list->result_array() as $row ){
                        @unlink(UPLOAD_DIR_OBRAS . $row['image']);
                        @unlink(UPLOAD_DIR_OBRAS . $row['thumb']);
                    }
                }else return false;
            }
        }else return false;

        return true;
    }

    public function get_list_front($limit, $offset){
        $ret = array();

        $this->db->from(TBL_OBRAS);
        $ret['count_rows'] = $this->db->count_all_results();

        $this->db->order_by('order', 'asc');
        $listObras = $this->db->get(TBL_OBRAS, $limit, $offset)->result_array();

        $result['listObras'] = $listObras;

        foreach( $listObras as $row ){
            $this->db->where('obra_id', $row['obra_id']);
            $this->db->order_by('order', 'asc');
            $listObrasGallery = $this->db->get(TBL_OBRASGALLERY);
            if( $listObrasGallery->num_rows>0 ) $result['listGallery'][$row['obra_id']] = $listObrasGallery->result_array();
        }

        $ret['result'] = $result;

        //print_array($result, true);
        
        return $ret;
    }

    public function get_list_panel($limit, $offset){
        $ret = array();

        $this->db->from(TBL_OBRAS);
        $ret['count_rows'] = $this->db->count_all_results();

        $this->db->order_by('order', 'asc');
        $ret['result'] = $query = $this->db->get(TBL_OBRAS, $limit, $offset);

        return $ret;
    }

    public function get_info($id){
        $result = $this->db->get_where(TBL_OBRAS, array('obra_id'=>$id))->row_array();

        $this->db->order_by('order', 'asc');
        $gallery = $this->db->get_where(TBL_OBRASGALLERY, array('obra_id'=>$id))->result_array();
        $result['gallery'] = $gallery;

        return $result;
    }

    public function order(){
        $res = $this->db->query('SELECT `order` FROM '.TBL_OBRAS.' WHERE obra_id='.$_POST['initorder'])->row_array();
        $order = $res['order'];
        $rows = json_decode($_POST['rows']);

        //print_array($rows, true);

        foreach( $rows as $row ){
            $obra_id = substr($row, 3);
            $this->db->where('obra_id', $obra_id);
            if( !$this->db->update(TBL_OBRAS, array('order' => $order)) ) return false;
            $order++;
        }

        return true;
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name){
        $this->db->select_max('`order`');
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

    private function _delete_images_tmp(){
        $dir = UPLOAD_DIR_OBRAS.".tmp/";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                @unlink($dir.$file);
            }
        }
    }

    private function _copy_images($json, $obra_id, $mode_edit=false){
        $n=0;
        foreach( $json as $row ){
            $n++;
            $cp1 = @copy(UPLOAD_DIR_OBRAS.".tmp/".$row->image_full, UPLOAD_DIR_OBRAS.$row->image_full);
            $cp2 = @copy(UPLOAD_DIR_OBRAS.".tmp/".$row->image_thumb, UPLOAD_DIR_OBRAS.$row->image_thumb);

            if( $cp1 && $cp2 ){
                $data = array(
                    'obra_id'    => $obra_id,
                    'image'      => $row->image_full,
                    'thumb'      => $row->image_thumb,
                    'width'      => $row->width,
                    'height'     => $row->height,
                    'date_added' => date('Y-m-d H:i:s')
                );

                if( !$mode_edit ) $data['order'] = $n;

                if( !$this->db->insert(TBL_OBRASGALLERY, $data) ) return false;
            }else return false;
        }

        return true;
    }
}
?>