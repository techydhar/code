<?php

namespace Techy\Sagar\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_gridFactory;

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Techy\Sagar\Model\GridFactory $gridFactory
     ){
          $this->_pageFactory = $pageFactory;
          $this->_gridFactory = $gridFactory;
          return parent::__construct($context);
     }

     public function execute()
     {
       if (!$this->getRequest()->isPost()) {
           return $this->resultRedirectFactory->create()->setPath('*/*/');
         }
         $data = $this->validatedParams();
         $customform = $this->_gridFactory->create();
         $customform->setData($data);
         if($customform->save()){

             $this->messageManager->addSuccessMessage(__('You saved the data.'));

         }else{

             $this->messageManager->addErrorMessage(__('Data was not saved.'));

         }
         $resultRedirect = $this->resultRedirectFactory->create();
         $resultRedirect->setPath('sagar');
         return $resultRedirect;
     }
private function validatedParams()

{

    $request = $this->getRequest();

    if (trim($request->getParam('title')) === '') {

        throw new LocalizedException(__('Enter the First Name and try again.'));

    }
    return $request->getParams();
  }
}
