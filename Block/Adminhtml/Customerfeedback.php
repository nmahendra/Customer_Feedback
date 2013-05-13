<?php

class Zygnis_Customerfeedback_Block_Adminhtml_Customerfeedback extends Mage_Adminhtml_Block_Widget_Grid_Container{
    
    public function __construct() {
        $this->_controller = 'adminhtml_customerfeedback';        
        $this->_blockGroup = 'zygnis_customerfeedback';
        $this->_headerText = Mage::helper('zygnis_customerfeedback')->__('Customerfeed Manager');
        $this->_addButtonLabel = Mage::helper('zygnis_customerfeedback')->__('Add New Feeds');          
        parent::__construct();
        
        if(Mage::helper('zygnis_customerfeedback/admin')->isActionAllowed('save')){
            $this->_updateButton('add','label',Mage::helper('zygnis_customerfeedback')->__('Add New Feedback'));
        }else{
            $this->_removeButton('add');
        }
        
    }
}