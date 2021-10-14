<?php
/**
 * Copyright © 2019 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Packt\HelloWorld\Setup\Patch\Schema;


use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class CreateTable implements SchemaPatchInterface
{
    private $moduleDataSetup;


    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }


    public static function getDependencies()
    {
        return [];
    }


    public function getAliases()
    {
        return [];
    }


    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        if (!$this->moduleDataSetup->tableExists('intray_table4') && $this->moduleDataSetup->tableExists('intray_table2')) {
            $table = $this->moduleDataSetup->getConnection()
                ->newTable($this->moduleDataSetup->getTable('intray_table4'))
                ->addColumn('email_id', Table::TYPE_INTEGER, 10, [
                    'auto_increment' => true,
                    'nullable' => false,
                    'primary' => true,
                ], 'Follow Up Email Id')
                ->addColumn('receiver', Table::TYPE_TEXT, 255, [
                    'nullable' => false
                ], 'Follow Up Email Receiver')
                ->addColumn('group_id', Table::TYPE_INTEGER, 10, [
                    'nullable' => false,
                ], 'Follow Up Email Group Id')
                ->addColumn('email_template', Table::TYPE_TEXT, null, [
                    'nullable' => false,
                ], 'Follow up Email Template')
                ->addColumn('email_event', Table::TYPE_TEXT, null, [
                    'nullable' => false,
                ], 'Follow up Email Event')
                ->addColumn('content', Table::TYPE_TEXT, null, [
                    'nullable' => false,
                ], 'Follow up Email Content')
                ->addColumn(
                    'send_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                    'Send At')
                ->setComment('Follow Up Email');
            $this->moduleDataSetup->getConnection()->createTable($table);
        }
        $this->moduleDataSetup->endSetup();
    }
}

