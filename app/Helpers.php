<?php
namespace App\Helpers;

class StringHelper 
{

    public static function truncate($str, $limit = 150) 
    {
        $str_s = "";
        if(stripos($str," ")){
            $ex_str = explode(" ",$str);
            if(count($ex_str)>$limit){
                for($i=0;$i<$limit;$i++){
                    $str_s.=$ex_str[$i]." ";
                }
                return $str_s."...";
            }
            return $str_s."...";
        }
        return $str_s."...";
    }

    public static function formatNumber($number)
    {
        if ($number<=9 && $number>0){
            return "0".$number;
        }
        return $number;
    }

}
?>

