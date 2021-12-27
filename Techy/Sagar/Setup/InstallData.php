<?php
namespace Techy\Sagar\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface
{
  protected $_gridFactory;
  public function __construct(\Techy\Sagar\Model\GridFactory $gridFactory)
  {
    $this->_gridFactory = $gridFactory;
  }
  public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
  {
    $data = ['title'=>'This is New Title'];
    $grid = $this->_gridFactory->create();
    $grid->addData($data)->save();
  }
}
