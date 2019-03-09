<?php
namespace Kalaweit\Transverse;
/**
 *
 */
trait Get_param_request
{
    function get_param_request()
    {

        $array_param_request = [];

        $param_request = explode('?', $_SERVER['REQUEST_URI']);

        if(isset($param_request[1])){

        $param_request = explode('&', $param_request[1]);

        foreach ($param_request as $key => $value) {

            $data_param_request = explode('=' , $value);

            if($data_param_request[1] != NULL){

                $array = [

                    $data_param_request[0] => '%'.$data_param_request[1].'%'

                ];

                $array_param_request = array_merge($array_param_request, $array);

            }

        }

    }

        $pagination = explode('?',$_SERVER['REQUEST_URI']);
        $pagination = explode('/',$pagination[0]);
        $pagination = array_pop($pagination);

        $data = [$array_param_request,$pagination];

        return $data;
    }
}
