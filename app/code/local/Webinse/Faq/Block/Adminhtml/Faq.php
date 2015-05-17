<?php

/**
 * Adminhtml faq page content block
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Block_Adminhtml_Faq extends Mage_Adminhtml_Block_Widget_Grid_Container
{


    protected $_blockGroup = 'WebinseFaq'; //name module

    public function __construct()
    {
        $this -> _controller = 'adminhtml_faq';
        $this -> _blockGroup = 'WebinseFaq';


        $this->_headerText     = Mage::helper('faq') -> __('Question');
        $this->_addButtonLabel = Mage::helper('faq') -> __('Add question');


        parent::__construct();
    }

    /**
     * Redefine header css class
     *
     * @return string
     */
    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }



} //end class
