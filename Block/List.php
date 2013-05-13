<?php

class Zygnis_Customerfeedback_Block_List extends Mage_Core_Block_Template{
    
    protected $_customerfeedbackCollection = null;
    
    
    /**
     * Retrieve Customer Feedback Collection
     * @return Zygnis_Customerfeedback_Model_Resource_Customerfeedback_Collection
     */
    protected function _getCollection()
    {
        return Mage::getResourceModel('zygnis_customerfeedback/customerfeedback_collection');
    }

    /**
     * Retrived prepared Customer Feedback Collection
     * @return Zygnis_Customerfeedback_Model_Resource_Customerfeedback_Collection
     */
    public function getCollection(){
        if(is_null($this->_customerfeedbackCollection)){
            $this->_customerfeedbackCollection = $this->_getCollection();
            $this->_customerfeedbackCollection->prepareForList($this->getCurrentPage());
        }
        return $this->_customerfeedbackCollection; 
    }
    
    public function getItemUrl($customerfeedbackItem){
        return $this->getUrl('*/*/view', array('id' => $customerfeedbackItem->getId()));
    }
    
    public function getCurrentPage() {
        return $this->getData('current_page') ? $this->getData('current_page') : 1;
    }
    
    public function getPager()
    {
        $pager = $this->getChild('customerfeedback_list_pager');
        if($pager){
            $customerfeedbackPerPage = Mage::helper('zygnis_customerfeedback')->getCustomerfeedbackPerPage();
            
            $pager->setAvailableLimit(array($customerfeedbackPerPage => $customerfeedbackPerPage));
            $pager->setTotalNum($this->getCollection()->getSize());
            $pager->setTotalNum(10);
            $pager->setCollection($this->getCollection());
            $pager->setShowPerPage(true);

            return $pager->toHtml();
        }
        return null;
    }

    public function getImageUrl($item, $width)
    {
        return Mage::helper('zygnis_customerfeedback/image')->resize($item,$width);
    }
    

}