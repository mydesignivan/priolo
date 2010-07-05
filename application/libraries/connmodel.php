<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class connmodel{
    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct($params) {
        if( !is_array($params['model_name']) ) $arr_modelname = array($params['model_name']);

        $this->model = array();
        foreach( $arr_modelname as $modelname ){
            $str = '$this->model["'. $modelname .'"] = new '. $modelname .'();';
            eval($str);
        }
    }

    /* PUBLIC PROPERTIES
     **************************************************************************/
    public $model;

    /* PUBLIC FUNCTIONS
     **************************************************************************/

}
?>
