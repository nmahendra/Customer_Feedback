<?php

class Zygnis_Customerfeedback_IndexController extends Mage_Core_Controller_Front_Action{
    
    public function preDispatch() {
        parent::preDispatch();

        if (!Mage::helper('zygnis_customerfeedback')->isEnabled()) {            
            $this->setFlag('', 'no-dispatch', true);
            $this->_redirect('noRoute');
        }
    }

    public function indexAction()
    {
        $this->loadLayout();
        
        Mage::helper('firephp')->send('Lorem ipsum sit ame');
        
        $listBlock = $this->getLayout()->getBlock('customerfeedback.list');
        
        if ($listBlock) {
            $currentPage = abs(intval($this->getRequest()->getParam('p')));
            if ($currentPage < 1) {
                $currentPage = 1;
            }
            $listBlock->setCurrentPage($currentPage);
        }
        $this->renderLayout();
    }
    
    
    public function viewAction(){
        $customerfeedbackId = $this->getRequest()->getParam('id');
        
        if(!$customerfeedbackId){
            return $this->_forward('noRoute');
        }
        
        $model = Mage::getModel('zygnis_customerfeedback/customerfeedback');
        $model->load($customerfeedbackId);
        
        if(!$model->getId()){
            return $this->_forward('noRoute'); 
        }
        
        Mage::register('customerfeedback_item', $model);
        Mage::dispatchEvent('before_customerfeedback_item_display', array('customerfeedback_item' => $model));
        
        $this->loadLayout();
        $itemBlock = $this->getLayout()->getBlock('customerfeedback_item');
        if($itemBlock){
            $listBlock = $this->getLayout()->getBlock('customerfeedback_item');
            if($listBlock){
                $page = (int)$listBlock->getCurrentPage() ? (int)$listBlock->getCurrentPage() : 1;
            }  else {
                $page = 1;
            }
            $itemBlock->setPage($page);
        }
        $this->renderLayout();
    }
    
    
}