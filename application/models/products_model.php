<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
        $this->load->model('categories_model');
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

    public function get_list_panel($limit, $offset, $categories_id){
        $ret = array();

        $sql = TBL_PRODUCTS.".*,";
        $sql.= TBL_CATEGORIES.'.categorie_name,';
        $sql.= TBL_CATEGORIES.'.categories_id';

        $this->db->select($sql, false);
        $this->db->from(TBL_PRODUCTS);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id = '.TBL_PRODUCTSCATEGORIES.'.products_id');
        $this->db->join(TBL_CATEGORIES, TBL_PRODUCTSCATEGORIES.'.categories_id = '.TBL_CATEGORIES.'.categories_id');
        if( $categories_id!=0 ) $this->db->where(TBL_CATEGORIES.'.categories_id', $categories_id);
        $ret['count_rows'] = $this->db->count_all_results();

        $this->db->select($sql, false);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id = '.TBL_PRODUCTSCATEGORIES.'.products_id');
        $this->db->join(TBL_CATEGORIES, TBL_PRODUCTSCATEGORIES.'.categories_id = '.TBL_CATEGORIES.'.categories_id');
        $this->db->order_by(TBL_CATEGORIES.'.order', 'asc');
        $this->db->order_by(TBL_PRODUCTS.'.order', 'asc');
        if( $categories_id!=0 ) $this->db->where(TBL_CATEGORIES.'.categories_id', $categories_id);
        $ret['result'] = $this->db->get(TBL_PRODUCTS, $limit, $offset);

        $output = array();
        foreach( $ret['result']->result_array() as $row ){
                $arr_path = $this->categories_model->get_path($row['categories_id']);
                $key = implode(' > ', $arr_path);
                $output[$key][] = $row;
        }

        $ret['result'] = $output;

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

        $categories_id = explode("_", $_POST['cboCategories']);
        $categories_id = $categories_id[0];

        $this->db->trans_start();  //INICIA TRANSACCION

        if( $this->db->insert(TBL_PRODUCTS, $data) ) {
            $products_id = $this->db->insert_id();

            $categorie_parent = $this->db->get_where(TBL_CATEGORIES, array('categories_id' => $_POST['cboCategories']))->row_array();

            $data = array(
                'products_id'      => $products_id,
                'categories_id'    => $categories_id,
                'categorie_parent' => $categorie_parent['parent_id']
            );
            
            if( !$this->db->insert(TBL_PRODUCTSCATEGORIES, $data) ) return "error";

        }else return 'error';

        $this->db->trans_complete();  //COMPLETA TRANSACCION

        return 'success';
    }

    public function edit($outUpload){
        //print_array($outUpload, true);

        $categories_id = explode("_", $_POST['cboCategories']);
        $categories_id = $categories_id[0];

        $data['product_name'] = $_POST['txtName'];
        $data['last_modified'] = date('Y-m-d H:i:s');
        if( is_array($outUpload) ){
            $data['image'] = $outUpload['filename_image'];
            $data['thumb'] = $outUpload['filename_thumb'];
            $data['thumb_width'] = $outUpload['thumb_width'];
            $data['thumb_height'] = $outUpload['thumb_height'];
            $dataProd = $this->db->get_where(TBL_PRODUCTS, array('products_id'=>$_POST['products_id']))->row_array();
        }

        $datProdCat = $this->db->get_where(TBL_PRODUCTSCATEGORIES, array('products_id' => $_POST['products_id']))->row_array();
        if( $datProdCat['categories_id'] != $categories_id ){
            $data['order'] = $this->_get_num_order();
        }

        $this->db->where('products_id', $_POST['products_id']);

        $this->db->trans_start();  //INICIA TRANSACCION

        if( $this->db->update(TBL_PRODUCTS, $data) ) {

            if( is_array($outUpload) ){
                @unlink(UPLOAD_DIR_PRODUCTS . $dataProd['image']);
                @unlink(UPLOAD_DIR_PRODUCTS . $dataProd['thumb']);
            }


            if( $datProdCat['categories_id'] != $categories_id ){
                $datCat = $this->db->get_where(TBL_CATEGORIES, array('categories_id' => $categories_id))->row_array();
                $data = array(
                    'products_id'      => $_POST['products_id'],
                    'categories_id'    => $categories_id,
                    'categorie_parent' => $datCat['parent_id']
                );
                $this->db->where('products_id', $_POST['products_id']);
                if( !$this->db->update(TBL_PRODUCTSCATEGORIES, $data) ) return "error";
            }

        }else return 'error';
        
        $this->db->trans_complete();  //COMPLETA TRANSACCION

        return 'success';
    }

    public function delete($id){
        $this->db->where_in('products_id', $id);
        $listProd = $this->db->get_where(TBL_PRODUCTS)->result_array();
        
        $this->db->trans_start(); //INICIO TRANSACCION

        $this->db->where_in('products_id', $id);
        $del1 = $this->db->delete(TBL_PRODUCTS);

        $this->db->where_in('products_id', $id);
        $del2 = $this->db->delete(TBL_PRODUCTSCATEGORIES);

        if( $del1 && $del2 ){

            foreach( $listProd as $row ){
                @unlink(UPLOAD_DIR_PRODUCTS . $row['image']);
                @unlink(UPLOAD_DIR_PRODUCTS . $row['thumb']);
            }

            $this->db->trans_commit();  //APLICO LOS CAMBIOS
            return true;

        }else {
            $this->db->trans_rollback(); //DESHACE LOS CAMBIOS
            return false;
        }

    }

    public function get_info($where){
        /*$this->db->from(TBL_PRODUCTS);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id = '.TBL_PRODUCTSCATEGORIES.'.products_id');*/
        $this->db->from(TBL_V_PRODUCTS);
        if( is_numeric($where) ) $where = array('products_id'=>$where);
        $this->db->where($where);
        return $this->db->get();
    }

    public function check(){
        $categories_id = explode("_", $_POST['categories_id']);
        $categories_id = $categories_id[0];

        $where = array(
            'product_name' => trim($_POST['name']),
            'categories_id' => $categories_id
        );
        if( is_numeric($_POST['products_id']) ) $where['products_id <>'] = $_POST['products_id'];

        $query = $this->get_info($where);

        return $query->num_rows>0;
    }

    public function order(){
        $order = $_POST['initorder'];
        $rows = json_decode($_POST['rows']);

        //print_array($rows, true);

        foreach( $rows as $row ){
            $id = substr($row, 3);
            $this->db->where('products_id', $id);
            if( !$this->db->update(TBL_PRODUCTS, array('order' => $order)) ) return false;
            $order++;
        }

        return true;
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order(){
        $this->db->select_max(TBL_PRODUCTS.'.`order`');
        $this->db->from(TBL_PRODUCTS);
        $this->db->join(TBL_PRODUCTSCATEGORIES, TBL_PRODUCTS.'.products_id = '.TBL_PRODUCTSCATEGORIES.'.products_id');
        $this->db->where(TBL_PRODUCTSCATEGORIES.'.categories_id', $_POST['cboCategories']);
        $row = $this->db->get()->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

}
?>