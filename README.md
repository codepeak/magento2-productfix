# magento2-productfix

There is an issue in (at the time of writing) Magento 2.1.4 and previous versions that doesn't update the field `updated_at` in the table `catalog_product_entity` when a product is updated. This simple module uses raw SQL to force update the field.

**Use this module at own risk and make sure to test it first!**

## How to install

After installing Magento 2, run the following commands from your Magento 2 root directory:

```
composer require codepeak/magento2-productfix
php bin/magento cache:flush
```

## Contribute

Feel free to **fork** and contribute to this module. Simply create a pull request and we'll review and merge your changes to master branch.

## About Codepeak

Codepeak is a Magento consultant agency located in Sweden. For more information, please visit [codepeak.se](https://codepeak.se).