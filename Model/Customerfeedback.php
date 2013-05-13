<?php

class Zygnis_Customerfeedback_Model_Customerfeedback extends Mage_Core_Model_Abstract{
    
    public function _construct() {
        parent::_construct();
            $this->_init('zygnis_customerfeedback/customerfeedback');
    }
    
    protected function _beforeSave() {
        parent::_beforeSave();
        if($this->isObjectNew()){
            $this->setData('created_time',  Varien_Date::now());
        }
        return $this;
    }
    
}