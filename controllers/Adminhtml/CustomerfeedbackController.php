<?php

class Zygnis_Customerfeedback_Adminhtml_CustomerfeedbackController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()
                ->_setActiveMenu('customerfeedback/manage')
                ->_addBreadcrumb(
                        Mage::helper('zygnis_customerfeedback')->__('customerfeedback'),
                        Mage::helper('zygnis_customerfeedback')->__('customerfeedback')
                )
                ->_addBreadcrumb(
                        Mage::helper('zygnis_customerfeedback')->__('Manage Customer Feedback'),
                        Mage::helper('zygnis_customerfeedback')->__('Manage Customer Feedback')
                );
        return $this;
    }
    
    public function indexAction(){
        $this->_title($this->__('Customer Feedback'))
             ->_title($this->__('Manage Customer Feedback'));
        
        $this->_initAction();
            var_dump(Mage::getSingleton('core/layout')->getUpdate()->getHandles());
            //$myblock = $this->getLayout()->createBlock('zygnis_customerfeedback/adminhtml_customerfeedback');
            //$this->_addContent($myblock);        
        $this->renderLayout();
	
    }
    
    public function newAction(){
        $this->_forward('edit');
    }
    
    public function editAction(){
        
        $this->_title($this->__('Customerfeedback'))
             ->_title($this->__('Manage Customerfeedback'));
        
        $model = Mage::getModel('zygnis_customerfeedback/customerfeedback');
        $customerfeedbackId = $this->getRequest()->getParam('customerfeedback_id');

        if ($customerfeedbackId) {
            $model->load($customerfeedbackId);
            
                if (!$model->getId()) {
                    $this->_getSession()->addError(
                    Mage::helper('zygnis_customerfeedback')->__('Customerfeedback item does not exist.'));
                    return $this->_redirect('*/*/');
                }
            // prepare title
            $this->_title($model->getTitle());
                $breadCrumb = Mage::helper('zygnis_customerfeedback')->__('Edit Item');
        } else {
            $this->_title(Mage::helper('zygnis_customerfeedback')->__('New Item'));
            $breadCrumb = Mage::helper('zygnis_customerfeedback')->__('New Item');
        }
        $this->_initAction()->_addBreadcrumb($breadCrumb, $breadCrumb);

        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (!empty($data)) {
            $model->addData($data);
        }
var_dump(Mage::getSingleton('core/layout')->getUpdate()->getHandles());
        Mage::register('customerfeedback_item', $model);
        $this->renderLayout();
    }
    
    
    protected function _isAllowed() {
        switch ($this->getRequest()->getActionName()) {
            case 'new':
            case 'save':
                return Mage::getSingleton('Admin/session')->isAllowed('customerfeedback/manage/save');
                break;
            case 'delete':
                return Mage::getSingleton('Admin/session')->isAllowed('customerfeedback/manage/delete');
                break;
            default:
                return Mage::getSingleton('Admin/session')->isAllowed('customerfeedback/manage');
                break;
        }
    }
    
    protected function _filterPostData($data)
    {
        $data = $this->_filterDates($data, array('time_published'));
        return $data;
    }
    
    public function gridAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    

}
