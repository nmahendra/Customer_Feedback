<?php

class Zygnis_Customerfeedback_Mysql4_Customerfeedback extends Mage_Core_Model_Mysql4_Abstract{
    
    public function _construct() {
        $this->_init('customerfeedback/customerfeedback', 'customerfeedback_id');
    }
}