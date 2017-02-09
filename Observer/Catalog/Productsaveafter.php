<?php

namespace Codepeak\Productfix\Observer\Catalog;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class Productsaveafter
 *
 * @package Codepeak\Productfix\Observer\Catalog
 * @author  Robert Lord <robert@codepeak.se>
 */
class Productsaveafter implements ObserverInterface
{
    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        if ($observer->getProduct() && $observer->getProduct()->getId()) {
            $productId = $observer->getProduct()->getId();
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
            $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
            $connection = $resource->getConnection();
            $tableName = $resource->getTableName('catalog_product_entity'); //gives table name with prefix
            $connection->query(
                "UPDATE `" . $tableName . "` SET `updated_at` = NOW() WHERE `entity_id` =  '" . $productId . "' LIMIT 1"
            );
        }
    }
}
