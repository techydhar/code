<?php
namespace Techy\Sagar\Model\ResourceModel\Grid;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Techy\Sagar\Model\Grid as GridModel;
use Techy\Sagar\Model\ResourceModel\Grid as GridResourceModel;
class Collection extends AbstractCollection
{
  protected function _construct()
  {
    $this->_init(GridModel::class, GridResourceModel::class);
  }
}
