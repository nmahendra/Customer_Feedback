<?php

class Zygnis_Customerfeedback_Block_Adminhtml_Customerfeedback_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

    public function __construct() {
        $this->_objectId = 'id';
        $this->_blockGroup = 'zygnis_customerfeedback';
        $this->_controller = 'adminhtml_customerfeedback';
        $this->_mode = 'edit';
        
        parent::__construct();
        
        if(Mage::helper('zygnis_customerfeedback/admin')->isActionAllowed('save')){
            $this->_updateButton('save','label',Mage::helper('zygnis_customerfeedback')->__('Save Customerfeedback Item'));
            $this->_addButton('saveandcontinue', array(
                'label' => Mage::helper('adminhtml')->__('Save and Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save',
            ), -100);
        }else{
            $this->_removeButton('save');
        }
        
        if(Mage::helper('zygnis_customerfeedback/admin')->isActionAllowed('delete')){
            $this->_updateButton('delete', 'label', Mage::helper('zygnis_customerfeedback')->__('Delete Feed Item'));
        }else{
            $this->_removeButton('delete');
        }
        
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('page_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'page_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'page_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }
    
      
    public function getHeaderText() {
        $model = Mage::helper('zygnis_customerfeedback')->getCustomerfeedbackItemInstance();
        
        if ($model->getId()) {
            return Mage::helper('zygnis_customerfeedback')->__("Edit Item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return Mage::helper('zygnis_customerfeedback')->__('New Item');
        }
    }
    
}