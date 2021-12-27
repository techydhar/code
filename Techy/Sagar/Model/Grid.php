<?php
namespace Techy\Sagar\Model;
use Magento\Framework\Model\AbstractModel;
use Techy\Sagar\Model\ResourceModel\Grid as GridResourceModel;
class Grid extends AbstractModel
{
  protected function _construct()
  {
    $this->_init(GridResourceModel::class);
  }
}
