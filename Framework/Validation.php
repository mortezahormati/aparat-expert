<?php

namespace Framework;

class Validation
{

    /**
     * validate string size
     *@param string $value;
     *@param int $min;
     * @param float $max
     * @return bool
     */
    public static function stringSize(string $value ,int $min=1 , float $max=INF):bool
    {
        if(is_string($value)){
            $value = trim($value);
            $length = strlen($value);

            return $length>=$min && $length<=$max;
        }
        return false;
    }

    /**
     * validate email size
     *@param string $value;
     * @return mixed
     */
    public static function email(string $value):mixed
    {

        $value = trim($value);
        return filter_var($value , FILTER_VALIDATE_EMAIL);

    }

    /**
     * match two variable is set
     * @param string $value1
     * @param string $value2
     * @return bool
     */
    public static function matchString(string $value1 , string $value2):bool
    {

        $value1 = trim($value1);
        $value2 = trim($value2);
        return $value1===$value2;
    }

    /**
     * alphabet character accepted
     * @param string $value
     * @return bool
     */
    public static function alphabet(string $value):bool
    {
        $value = trim($value);
        return is_string($value) && preg_match('/^[\pL\pM]+$/u' , $value);
    }

    /**
     * alphabet character accepted
     * @param string $value
     * @return bool
     */
    public static function numeric(string $value):bool
    {
        $value = trim($value);
        return is_numeric($value);
    }

    /**
     * alphabet character accepted
     * @param string $value
     * @return bool
     */
    public static function validateDate(string $value):bool
    {
        $value = trim($value);
        if(!is_string($value) &&  !is_numeric($value) || strtotime($value) === false){
            return false;
        }
        $date = date_parse($value);
        return checkdate($date['month'] , $date['day'] , $date['year']);
    }



}