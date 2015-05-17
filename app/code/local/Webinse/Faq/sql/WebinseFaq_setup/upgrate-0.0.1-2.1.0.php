<?php

$installer = $this;
$installer->startSetup();



$resource = Mage::getResourceModel('WebinseFaq/faq');
die('sfsf');

if(!method_exists($resource, 'getEntity')){

    $table = $this->getTable('WebinseFaq/table_faq');
    $query = 'ALTER TABLE `' . $table . '` ADD COLUMN `user_id` INT  DEFAULT NULL';
    $connection = Mage::getSingleton('core/resource')->getConnection('core_write');
    try {
        $connection->query($query);
    } catch (Exception $e) {

    }
}

$installer->endSetup();