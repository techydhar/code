<?php
namespace Techy\Sagar\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
class InstallSchema implements InstallSchemaInterface
{
  public function install(
     SchemaSetupInterface $setup,
     ModuleContextInterface $context
    )
    {
       $installer = $setup;
       $installer->startSetup();
       $table = $installer->getConnection()->newTable(
         $installer->getTable('techy_sagar_grid')
         )->addColumn(
           'entity_id',
           \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
           null,
           ['identity'=> true, 'nullable' => false, 'primary' => true],
           'Grid Record Id'
           )->addColumn(
             'title',
             \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
             255,
             ['nullable'=> false],
             'Title'
             )->addColumn(
               'created_at',
               \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
               null,
               [
                 'nullable' => false,
                 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT,
               ],
               'Created At'
               )->addColumn(
                 'updated_at',
                 \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                 null,
                 [
                   'nullable' => false,
                   'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT,
                 ],
                 'Modification Time'
                 )->setComment(
                   'Row Data Table'
                 );
                 $installer->getConnection()->createTable($table);
                 $installer->endSetup();
    }
}
