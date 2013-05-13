<?php

class Zygnis_Customerfeedback_Model_Resource_Customerfeedback extends Mage_Core_Model_Resource_Db_Abstract{
    
    protected function _construct() {
        $this->_init('zygnis_customerfeedback/customerfeedback', 'customerfeedback_id'); 
    }
    
}