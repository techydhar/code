<?php
namespace Techy\Sagar\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Techy\Sagar\Model\GridFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
class Delete extends Action
{
  protected $resultPageFactory;
  protected $gridFactory;
  public function __construct(
    Context $context,
    PageFactory $resultPageFactory,
    GridFactory $gridFactory
  ){
    $this->resultPageFactory = $resultPageFactory;
    $this->gridFactory = $gridFactory;
     parent::__construct($context);
    }
    public function execute()
    {
      try{
         $data = (array)$this->getRequest()->getParams();
         //$data = $this->getRequest()->getParam('entity_id');
         print_r($data);
         if($data)
         {
           $model = $this->gridFactory->create()->load($data['id']);
           $model->delete();
           $this->messageManager->addSuccessMessage(__("Record Delete Successfully."));
         }
        }
         catch(\Exception $e){
           $this->messageManager->addErrorMessage($e,__("We can\'t delete record, Please try again."));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('sagar');
        return $resultRedirect;
    }
}
