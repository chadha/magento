<?php

/**
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */

class Webinse_Faq_IndexController extends Mage_Core_Controller_Front_Action{


    private function _initLayout()
    {
        $this -> loadLayout() -> renderLayout();
    }


    public function indexAction()
    {

        $this->_forward('getAllFaq');
    }

    public function getAllFaqAction()
    {

        $this -> _initLayout();

    }


    public function addNewFaqAction()
    {
        $this -> _initLayout();
    }

    public function editFaqByIdAction()
    {

        $this -> _initLayout();
    }

    public function formAction()
    {
        $id = intval(Mage::app() -> getRequest() -> getParam('id'));
        if($id)
        {
            $user = Mage::getModel('WebinseFaq/Faq') -> load($id);
            if(!$user -> isEmpty())
            {
                $this -> save(Mage::getModel('WebinseFaq/Faq') -> load($id));
            }
            Mage::getSingleton('core/session')->addSuccess('Запись с таким ид успешно изменена');
        }
        else
        {
            $this -> save(Mage::getModel('WebinseFaq/Faq'));
            Mage::getSingleton('core/session')->addSuccess('Запись с таким ид успешно добавлена');
        }

        $this -> _redirectUrl(Mage::getUrl('faq/index/getAllFaq'));
    }

    public function save($user)
    {
        $dat = new Mage_Core_Model_Date();
        $user -> setDate($dat -> date());
        $user -> setQuestion($_POST['Question']);
        $user -> setAnswer($_POST['Answer']);
        $user -> save();


    }

    public function deleteFaqByIdAction()
    {


        $id = intval(Mage::app() -> getRequest() -> getParam('id'));
        $user = Mage::getModel('WebinseFaq/Faq') -> load(intval($id));
        if(!$user -> isEmpty())
        {
            Mage::register('DataDel',$user -> getId());
            $user -> delete();
            Mage::getSingleton('core/session')->addSuccess('Запись с таким ид успешно изменена');
            $this -> _redirectUrl(Mage::getUrl('faq/index/getAllFaq'));

        }

    }

}