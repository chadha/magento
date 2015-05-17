<?php

/**
 * Adminhtml product discount edit form
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Block_Adminhtml_Faq_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareLayout()
    {

        $helper = Mage::helper('faq');
        $model = Mage::registry('current_faq');




        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
            'class' => 'validate-no-html-tags'
        ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('News Information')));

        $fieldset->addField('question', 'text', array(
            'label' => $helper->__('Question'),
            'required' => true,
            'name' => 'question',
        ));

        $fieldset->addField('answer', 'text', array(
            'label' => $helper->__('Answer'),
            'required' => true,
            'name' => 'answer',
        ));
        $fieldset->addField('date', 'date', array(
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'label' => $helper->__('date'),
            'name' => 'date'
        ));



        $form->setUseContainer(true);
        Mage::getSingleton('admin/session')->getData();

        if($data = Mage::getSingleton('adminhtml/session')->getFormData())
        {
            $form->setValues($data);

        } else
        {
            $form->setValues($model->getData());
            $users -> setUser_id($userId);

        }

        return parent::_prepareForm();
    }

}
