<?php

$installer = $this;
$tableNews = $installer->getTable('WebinseFaq/table_faq');


$installer -> startSetup();

$installer -> getConnection() -> dropTable($tableNews);

$table = $installer->getConnection()
    ->newTable($tableNews)
    ->addColumn('question_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        'autoinc'   => true
    ))
    ->addColumn('question', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('answer', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);
$installer->endSetup();