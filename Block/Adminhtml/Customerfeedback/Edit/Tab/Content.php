<?php

class Zygnis_Customerfeedback_Block_Adminhtml_Customerfeedback_Edit_Tab_Content 
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface{
    
    protected function _prepareLayout() {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        return $this;
    }
    
    protected function _prepareForm(){
        
        $model = Mage::helper('zygnis_customerfeedback')->getCustomerfeedbackItemInstance();
        
        if(Mage::helper('zygnis_customerfeedback/admin')->isActionAllowed()){
            $isElementDisabled = false;
        }  else {
            $isElementDisabled = true;
        }
        
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('customerfeedback_content_');
        
        $fieldset = $form->addFieldset('content_fieldset', array(
            'legend' => Mage::helper('zygnis_customerfeedback')->__('Content'),
            'class'  => 'fieldset-wide'
        ));        
        
        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(array(
            'tab_id' => $this->getTabId()
        ));

        $contentField = $fieldset->addField('description', 'editor', array(
            'name'     => 'description',
            'style'    => 'height:36em;',
            'required' => true,
            'disabled' => $isElementDisabled,
            'config'   => $wysiwygConfig
        ));
        
        $renderer = $this->getLayout()->createBlock('adminhtml/widget_form_renderer_fieldset_element')
            ->setTemplate('cms/page/edit/form/renderer/content.phtml');
        $contentField->setRenderer($renderer);

        $form->setValues($model->getData());
        $this->setForm($form);
        
        Mage::dispatchEvent('adminhtml_news_edit_tab_content_prepare_form', array('form' => $form));
        
        return parent::_prepareForm();
    }
 
    public function getTabLabel() {
        return Mage::helper('zygnis_customerfeedback')->__('Content');
    }
    
    public function getTabTitle() {
        return Mage::helper('zygnis_customerfeedback')->__('Content');
    }    
    
    public function canShowTab() {
        return true;
    }

    public function isHidden() {
        return false;
    }    
}