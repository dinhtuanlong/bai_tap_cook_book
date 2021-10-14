<?php
/**
 * Copyright © 2019 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Packt\HelloWorld\Setup\Patch\Schema;


use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class ChangeColumn implements SchemaPatchInterface
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


        $this->moduleDataSetup->getConnection()->changeColumn(
            $this->moduleDataSetup->getTable('intray_table2'),
            'body',
            'content',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 10,
                'nullable' => true,
                'comment' => 'Contents'
            ]
        );


        $this->moduleDataSetup->endSetup();
    }
}
