<?php

$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('zygnis_customerfeedback/customerfeedback'))
    ->addColumn('customerfeedback_id',Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        'auto_increment' => true,
        ), 'Comment ID')
        ->addColumn('title',Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
            'unsigned' => true,
            'nullable'=> false,
        ), 'Real Order ID')
        ->addColumn('description',  Varien_Db_Ddl_Table::TYPE_TEXT,'64k',array(
        ),'Comment')
        ->addColumn('customer',  Varien_Db_Ddl_Table::TYPE_TEXT,'64k',array(
        ),'Comment')        
        ->addColumn('created_time',  Varien_Db_Ddl_Table::TYPE_DATETIME,null,array(
        ),'Created Time');

        $installer->getConnection()->createTable($table);
        $installer->endSetup();

        

