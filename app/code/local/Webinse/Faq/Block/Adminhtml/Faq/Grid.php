<?php

/**
 * Adminhtml faq grid block
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Block_Adminhtml_Faq_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('registryList');
        $this->setUseAjax(true);
        $this->setDefaultSort('event_date');
        $this->setFilterVisibility(false);
        $this->setPagerVisibility(false);
    }// end construct

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('WebinseFaq/Faq')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this -> addColumn('question_id',array(
            'header' => 'ID',
            'wight' => 50,
            'index' => 'question_id',
            'sortable' => false,
        ));
        $this -> addColumn('question',array(
            'header' => 'Question',
            'wight' => 50,
            'index' => 'question',
            'sortable' => false,
        ));
        $this -> addColumn('answer',array(
            'header' => 'Answer',
            'wight' => 50,
            'index' => 'answer',
            'sortable' => false,
        ));
        $this -> addColumn('date',array(
        'header' => 'Date',
        'wight' => 50,
        'index' => 'date',
        'sortable' => false,
        ));
        $this -> addColumn('user_id',array(
            'header' => 'user_id',
            'wight' => 50,
            'index' => 'user_id',
            'sortable' => false,
        ));

        return parent::_prepareColumns();
    }
    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }


}//end class
