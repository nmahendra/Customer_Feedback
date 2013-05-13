<?php

class Zygnis_Customerfeedback_Block_Adminhtml_Customerfeedback_Grid extends Mage_Adminhtml_Block_Widget_Grid{
    
    public function __construct() {
        parent::__construct();
        $this->setId('feedGrid');
        $this->setDefaultSort('customerfeedback_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('zygnis_customerfeedback/customerfeedback')->getResourceCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }    
    
    protected function _prepareColumns(){
        $this->addColumn('customerfeedback_id', array(
            'header' => Mage::helper('zygnis_customerfeedback')->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'customerfeedback_id',
        ));

        $this->addColumn('title', array(
            'header' => Mage::helper('zygnis_customerfeedback')->__('Title'),
            'align' => 'left',
            'index' => 'title',
        ));
        
        $this->addColumn('description', array(
            'header' => Mage::helper('zygnis_customerfeedback')->__('Item Content'),
            'width' => '150px',
            'index' => 'content',
        ));
        
        return parent::_prepareColumns();
    }    
    
    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}