<?php
namespace App\Helpers;

class APIHelpers{

    // $is_error indicate true or false
    // $code indicate Status Code
    // $message indicate custom message
    // $content indicate response data 
    public static function createAPIResponse($is_error, $code, $message, $content){
        $result = [];

        if($is_error){
            $result["success"] = false;
            $result["code"] = $code;
            $result["message"] = $message;
        }
        else{
            $result["success"] = true;
            $result["code"] = $code;
            if( $content == null ){
                $result["message"] = $message;
            }
            else{
                $result["data"] = $content;
            }
        }

        return $result;
    }
}

?>