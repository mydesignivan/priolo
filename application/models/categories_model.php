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
    public function create(){
        $data = $this->_get_data();
        $data['order'] = $this->_get_last_order();
        $data['date_added'] = date('Y-m-d H:i:s');
        return $this->db->insert(TBL_CATEGORIES, $data);
    }

    public function edit(){
        $data = $this->_get_data();
        $data['last_modified'] = date('Y-m-d H:i:s');
        $this->db->where('categories_id', $_POST['categories_id']);
        return $this->db->update(TBL_CATEGORIES, $data);
    }

    public function delete($uri){
        $catname = array();
        $error=false;

        foreach( $uri as $id ){

            $this->db->trans_start();

            $status = "success";
            $query = $this->db->get_where(TBL_V_PRODUCTS, array('categories_id' => $id));

            // Hay productos
            if( $query->num_rows>0 ){
                $products_id = array();
                $image = array();
                $thumb = array();

                $this->db->select('categorie_name');
                $dataCat = $this->db->get_where(TBL_CATEGORIES, array('categories_id'=>$id));

                foreach( $query->result_array() as $row ) {
                    $products_id[] = $row['products_id'];
                    $image[] = $row['image'];
                    $thumb[] = $row['thumb'];
                }
                
                $this->db->where_in('products_id', $products_id);
                if( $this->db->delete(TBL_PRODUCTS) ){
                    if( !$this->db->delete(TBL_PRODUCTSCATEGORIES, array('categories_id'=> $id)) ) {
                        $error=true;
                        $status = "error";
                    }

                }else{
                    $error=true;
                    $status = "error";
                }
            }

            if( !$this->db->delete(TBL_CATEGORIES, array('categories_id'=>$id)) ) {
                $error=true;
                $status = 'error';
            }

            if( $status == "success" ){
                if( isset($image) ){
                    for( $n=0; $n<=count($image)-1; $n++ ){
                        @unlink(UPLOAD_DIR_PRODUCTS . $image[$n]);
                        @unlink(UPLOAD_DIR_PRODUCTS . $thumb[$n]);
                    }
                }
                $this->db->trans_commit();
                
            }else{
                $catname[] = $dataCat['categorie_name'];
                $this->db->trans_rollback();
            }

        }

        return array('error' => $error, 'categories'=>$catname);
    }

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

            $this->_combo_options[$row['categories_id'].'_'.$row['level']] = $val;
            $this->get_combo_categories($row['categories_id']);
        }

        return $this->_combo_options;
    }

    public function get_combo_catprod($itemDefault=array('0'=>'Seleccione una Categor&iacute;a')){
        $this->db->select('categorie_name, categories_id');
        $this->db->order_by('categorie_name', 'asc');
        $output = $this->db->get(TBL_V_CATEGORIES)->result_array();

        $output = array_merge($itemDefault, $output);


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

    public function get_list(){
        $output = $this->_get_list();
        return substr($output, 0, -5);
    }

    public function get_info($id){
        $output = array();
        $output = $this->db->get_where(TBL_CATEGORIES, array('categories_id' => $id))->row_array();
        $query = $this->db->get_where(TBL_CATEGORIES, array('categories_id' => $output['parent_id']));

        $level=0;
        if( $query->num_rows > 0 ){
            $row = $query->row_array();
            $level = $row['level'];
        }

        $output['level'] = $level;
        return $output;
    }

    public function order(){
        $order = $_POST['initorder'];
        $rows = json_decode($_POST['rows']);

        //print_array($rows, true);

        foreach( $rows as $row ){
            $id = substr($row, 3);
            $this->db->where('categories_id', $id);
            if( !$this->db->update(TBL_CATEGORIES, array('order' => $order)) ) return false;
            $order++;
        }

        return true;
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
     private function _get_data(){
         $a = array();
         if( $_POST['cboParentCat']=="0" ) {
             $a[0] = 0;
             $a[1] = 0;
         }else{
            $a = explode("_", $_POST['cboParentCat']);
            $a[1]+=1;
         }

        return array(
            'parent_id'       => $a[0],
            'categorie_name'  => $_POST['txtName'],
            'reference'       => normalize($_POST['txtName']),
            'level'           => $a[1]
        );
     }

     private function _get_last_order(){
        $a = explode("_", $_POST['cboParentCat']);

        $this->db->select_max('`order`');
        $this->db->where('parent_id', $a[0]);
        $row = $this->db->get(TBL_CATEGORIES)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
     }

    private function _get_list($parent_id=0, &$output=''){
        $this->db->order_by('`order`', 'asc');

        $sql = TBL_CATEGORIES.".*,";
        $sql.= "(SELECT count(*) FROM ". TBL_PRODUCTSCATEGORIES ." WHERE categories_id = ".TBL_CATEGORIES.".categories_id) AS count_products";
        $this->db->select($sql, false);
        $query = $this->db->get_where(TBL_CATEGORIES, array('parent_id'=>$parent_id));

$enter="
";
        $level=-1;
        $j=0;

        foreach( $query->result_array() as $row ){
            $j++;

            $val = $row['categorie_name'];
            if( $row['level']!=0 ) {
                $separator='';
                for( $n=1; $n<=$row['level']; $n++ ) $separator.= $this->_combo_separator;
                $val = $separator . $val;
            }

            $this->db->from(TBL_CATEGORIES);
            $this->db->where('parent_id', $row['categories_id']);
            $count_child = $this->db->count_all_results();


            if( $level!=$row['level'] ) {
                //$output.= '<ul class="clear sortable'.$row['level'].'">'.$enter;
                $output.= '<ul class="clear sortable">'.$enter;
            }

            $output.= '<li id="row'.$row['categories_id'].'">'.$enter;
            $output.= '<div class="float-left cell1 row-hover"><input type="checkbox" value="'.$row['categories_id'].'" onclick="Categories.check(this)" /></div>
                <div class="float-left cell2 row-hover">'. $val .'</div>
                <div class="float-left cell3 jq-countprod row-hover">'.$row['count_products'].'</div>
                <div class="float-left cell4 row-hover"><a href="javascript:void(0)" class="handle"><img src="images/icon_arrow_move.png" alt="" width="16" alt="16" /></a></div>
                <div class="float-left cell5 row-hover"><a href="javascript:void(Categories.open_popup('. $row['categories_id'] .'))"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Editar</span></a></div>
                <div class="float-left cell6 row-hover"><a href="javascript:void(0)" onclick="Categories.del(this,'. $row['count_products'] .",'". $row['categorie_name'] .'\')"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></div>'.$enter;

            if( $count_child==0 ) {
                $output.= '</li>';
                if( $j==$query->num_rows ) $output.= '</ul></li>';
            }

            $level = $row['level'];

            if( $count_child>0 ) $this->_get_list($row['categories_id'], $output);
        }

        return $output;
    }


}
?>