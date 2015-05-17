<?php

/**
 * Faq edit block
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Block_Adminhtml_Faq_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {


        $this -> _blockGroup = 'WebinseFaq';
        $this -> _controller = 'adminhtml_faq';

        parent::__construct();
        if (!Mage::registry('current_faq')->getId()) {
           $this -> removeButton('delete');
        }
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('faq');
        $model = Mage::registry('current_faq');

        if ($model->getId()) {
            return $helper->__("Edit question '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add question");
        }
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }

}
