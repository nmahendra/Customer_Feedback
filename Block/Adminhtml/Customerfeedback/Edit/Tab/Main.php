<?php

class Zygnis_Customerfeedback_Block_Adminhtml_Customerfeedback_Edit_Tab_Main
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface {
    
    protected function _prepareForm() {
        $model = Mage::helper('zygnis_customerfeedback')->getCustomerfeedbackItemInstance();
        
        if(Mage::helper('zygnis_customerfeedback/admin')->isActionAllowed('save')){
            $isElementDisabled = false;
        }else{
            $isElementDisabled = true;
            
        }
        
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('customerfeedback_main_');
        
        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => Mage::helper('zygnis_customerfeedback')->__('Customer Feedback Item Info')
        ));
        Mage::log('ID : ' .getId);      
        if ($model->getId()) {
            $fieldset->addField('customerfeedback_id', 'hidden', array(
                'name' => 'customerfeedback_id',
            ));
        }
        
        $fieldset->addField('title', 'text', array(
            'name'     => 'title',
            'label'    => Mage::helper('zygnis_customerfeedback')->__('Title'),
            'title'    => Mage::helper('zygnis_customerfeedback')->__('Title'),
            'required' => true,
            'disabled' => $isElementDisabled
        ));

        $fieldset->addField('customer', 'text', array(
            'name'     => 'customer',
            'label'    => Mage::helper('zygnis_customerfeedback')->__('Customer'),
            'title'    => Mage::helper('zygnis_customerfeedback')->__('Customer'),
            'required' => true,
            'disabled' => $isElementDisabled
        ));        

        $fieldset->addField('created_time', 'date', array(
            'name'     => 'created_time',
            'format'   => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image'    => $this->getSkinUrl('images/grid-cal.gif'),
            'label'    => Mage::helper('zygnis_customerfeedback')->__('Created Time'),
            'title'    => Mage::helper('zygnis_customerfeedback')->__('Created Time'),
            'required' => true
        ));       
        
        Mage::dispatchEvent('adminhtml_customerfeedback_edit_tab_main_prepare_form', array('form' => $form));
        
        $form->setValues($model->getData());
        
        $this->setForm($form);
        
        return parent::_prepareForm();
    }

    public function getTabLabel() {
        return Mage::helper('zygnis_customerfeedback')->__('Main Info');
    }
    
    public function getTabTitle() {
        return Mage::helper('zygnis_customerfeedback')->__('Main Info');
    }
    
    public function canShowTab() {
        return true;
    }
    
    public function isHidden() {
        return false;
    }
}