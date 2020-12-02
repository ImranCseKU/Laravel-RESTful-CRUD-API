<?php 
namespace App\Helpers;

class PostAPI{

    public static function FormatResponse($is_error, $code, $message, $content){
        $result=[];

        if($is_error){
            $result["success"] = false;
            $result["code"] = $code;
            $result["message"] = $message;
        }
        else{
            if($content == null){
                $result["success"] = true;
                $result["code"] = $code;
                $result["message"] = $message;
            }
            else{
                $result["success"] = true;
                $result["code"] = $code;
                $result["data"] = $content;
            }
        }

        return $result;
    }
}

?>