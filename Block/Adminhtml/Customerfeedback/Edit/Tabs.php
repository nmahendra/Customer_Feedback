<?php

class Zygnis_Customerfeedback_Block_Adminhtml_Customerfeedback_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{
    
    public function __construct() {
        parent::__construct();
        $this->setId('page_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('zygnis_customerfeedback')->__('Customer Feedback Info'));
    }
}