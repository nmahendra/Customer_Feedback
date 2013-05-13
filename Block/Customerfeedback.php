<?php

class Zygnis_Customerfeedback_Block_Customerfeedback extends Mage_Core_Block_Template{
    
    public function _prepareLayout() {
        return parent::_prepareLayout();
    }
    
    public function getCustomerfeedback(){
        return 'Customer feed backs goes here';
    }
}