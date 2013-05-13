<?php

class Zygnis_Customerfeedback_Model_Resource_Customerfeedback_Collection extends 
        Mage_Core_Model_Resource_Db_Collection_Abstract{
    
    protected function _construct() {
        //parent::_construct();
        $this->_init('zygnis_customerfeedback/customerfeedback');
    }
    
    public function prepareForList($page){
        $this->setPageSize(Mage::helper('zygnis_customerfeedback')->getCustomerfeedbackPerPage());
        $this->setCurPage($page)->setOrder('created_time',  Varien_Data_Collection::SORT_ORDER_DESC);
        
        return $this;
    }
}