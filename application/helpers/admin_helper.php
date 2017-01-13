<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function change_config($file,$key,$value)
{
    $ci =& get_instance();
    $ci->load->helper('file');
    $file = './'.APPPATH.'config/'.$file.'.php';
    $string = read_file($file);
 
    $pattern = '/\$config\[\''.$key.'\']\s*?=s*?.*;/i';
    if(!is_numeric($value)) $value = "'$value'";
    $replacement = "\$config['$key'] = $value;";
    $text = preg_replace($pattern, $replacement, $string);
    if ( ! write_file($file, $text))
    {
        return false;
    }
    else
    {
        return true;
    }
}


?>