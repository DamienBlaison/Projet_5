<?php
namespace Kalaweit\Transverse;
/**
 *
 */
trait Get_param_post
{
    function get_param_post()
    {

        $param_post = "" ;
        $array_prepare = [];

        foreach ($_POST as $key => $value) {

            if ($value != NULl){

                $param_post .= $key.' = :'.$key.' , ' ;
                $set_array = [ ":$key" => $value ];

                $array_prepare = array_merge($array_prepare ,$set_array);

            }

            else {

                $param_post .= $key.' = :'.$key.' , ' ;

                $array_prepare = array_merge($array_prepare ,[":$key" => ' ']);    // code...
            }


        }

        $param_post = substr($param_post, 0 , -2);

        $id = ["id" => $_GET["id"]];


        $array_prepare = array_merge($array_prepare, [":id" => $_GET["id"]]);

        $array_param_post = [$param_post,$array_prepare];

        return $array_param_post;

    }
    function get_param_post_add()
    {

        $into       = "";
        $set        = "";
        $prepare    = [];

        foreach ($_POST as $key => $value) {

            if ($value != NULl){

                $into .= $key.', ';
                $set  .= ':'.$key.', ';

                $set_array = [ ":$key" => $value ];

                $prepare = array_merge($prepare ,$set_array);

            }


        }

        $into = substr($into, 0 , -2);
        $set  = substr($set, 0 , -2);

        $array_param_post = [

            "p_into"    => $into,
            "p_set"     => $set,
            "p_prepare" => $prepare

        ];

        return $array_param_post;

    }
}
