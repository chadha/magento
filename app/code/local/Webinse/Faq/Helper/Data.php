<?php

/**
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function Link($content,$link,$html){
        $tag="<a ";
        $tag.="href=\"".$link."\"";
        foreach($html as $val=>$var){
            $tag.=" ".$val."=\"".$var."\"";
        }
        $tag.=">".$content."</a>"."<br>";
        return $tag;

    }
}
