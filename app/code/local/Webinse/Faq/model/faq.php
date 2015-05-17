<?php

class Webinse_Faq_Model_Faq extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('WebinseFaq/Faq');
    }
    /*public function _beforesave()
    {
        $dat = new Mage_Core_Model_Date();
        $tmp = $this -> getId();
        if ($tmp == null)
        {
            $this -> setDate($dat -> date());
        }
        parent::_beforeSave();
    }
    */

}