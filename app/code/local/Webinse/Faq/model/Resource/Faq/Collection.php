<?php
class Webinse_Faq_Model_Resource_Faq_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('WebinseFaq/Faq');
    }
}