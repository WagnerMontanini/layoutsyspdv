<?php
namespace WagnerMontanini\LayoutSyspdv;

use DateTime;

abstract class Helpers
{

    /**
     * Helper constructor.
     */
     public function __construct()
     {
 
     }
 
     /**
     * @param string $string
     * @param int $limit
     * @return string
     */
     protected function str_limit_chars(string $string, int $limit): string
     {
         $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
         if (mb_strlen($string) <= $limit) {
             return $string;
         }
 
         $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), "&nbsp"));
         return $chars;
     }
 
     /**
     * @param string $input
     * @param int $pad_length
     * @param string $pad_string
     * @param int $pad_style
     * @param string $encoding
     * @return string
     */
     protected function mb_str_pad(string $input, int $pad_length, string $pad_string=" ", int $pad_style=STR_PAD_RIGHT, string $encoding="UTF-8"): string
     {
         return str_pad($input, strlen($input)-mb_strlen($input,$encoding)+$pad_length, $pad_string, $pad_style);
     } 
 
     /**
     * @param string $date
     * @param string $format
     * @return string
     * @throws Exception
     */
     protected function date_fmt(?string $date, string $format = "Ymd"): string
     {
         $date = (empty($date) ? "now" : $date);
         return (new DateTime($date))->format($format);
     }
}


