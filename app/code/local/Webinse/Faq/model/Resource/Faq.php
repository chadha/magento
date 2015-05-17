<?php

class Webinse_Faq_Model_Resource_Faq extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('WebinseFaq/table_faq', 'question_id');
    }
}