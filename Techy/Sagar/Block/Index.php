<?php
namespace Techy\Sagar\Block;
use Magento\Framework\View\Element\Template;
use Techy\Sagar\Model\GridFactory;
class Index extends Template
{
  protected $_gridFactory;
  public function __construct(
    Template\Context $context,
    GridFactory $gridFactory
    )
  {
    $this->_gridFactory = $gridFactory;
    parent::__construct($context);
  }
  public function getDataDisplay()
  {
    $grid = $this->_gridFactory->create();
    $collection = $grid->getCollection();
    return $collection;
  }
}
