<?php
class Webinse_Faq_Adminhtml_FaqController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('FAQ');

        return $this;
    }
    protected function _initFaq()
    {
        $helper = Mage::helper('faq');
        $this->_title($helper->__('Webinse'));
        Mage::register('current_faq', Mage::getModel('WebinseFaq/faq'));
        $faqId = $this->getRequest()->getParam('id');
        if (!is_null($faqId)) {
            Mage::registry('current_faq')->load($faqId);
        }
    }
    public function indexAction()
    {
        $this->_initAction();
        $this->renderLayout();
    }
    public function newAction()
    {
        $this->_forward('edit');
    }
    public function editAction()
    {
        $this->_initFaq();
        $this->_initAction();
        $this->renderLayout();
    }
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('WebinseFaq/Faq');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if(!$model->getData()){
                    $model->setData(now());
                }

                Mage::getSingleton('admin/session')->getData();
                $user = Mage::getSingleton('admin/session');
                $userId = $user->getUser()->getUserId();
                $users = Mage::getModel('WebinseFaq/Faq');
                $users -> setuser_id($userId);
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Faq was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }
    public function deleteAction()
    {

        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('WebinseFaq/Faq')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Faq was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }
}//end class