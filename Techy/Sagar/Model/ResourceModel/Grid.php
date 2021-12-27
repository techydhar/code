<?php
namespace Techy\Sagar\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Grid extends AbstractDb
{
  protected function _construct()
  {
    $this->_init('techy_sagar_grid', 'entity_id');
  }
}
