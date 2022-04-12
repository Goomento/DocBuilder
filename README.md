# Sample And Document Module For [Goomento Page Builder Extension](https://github.com/Goomento/PageBuilder)

#### Easy steps to create your first module to perform Page Builder by Goomento in your Magento installation

Run the following command in Magento 2 root folder to install this repository
```bash
composer require goomento/module-doc-builder
php bin/magento module:enable Goomento_DocBuilder
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## User Guide
### [How To Use](https://github.com/Goomento/DocBuilder/blob/master/Guide/HOW_TO_USE.md)
### [How To Import Content From Other Sites](https://github.com/Goomento/DocBuilder/blob/master/Guide/IMPORT.md)
### [Migrate From Old Site](https://github.com/Goomento/DocBuilder/blob/master/Guide/REPLACE_URLS.md)

## Developer Document
### [1. Register Entry Point On Module](https://github.com/Goomento/DocBuilder/blob/master/DevDoc/SETUP.md)
### [2. Create First Builder Widget](https://github.com/Goomento/DocBuilder/blob/master/DevDoc/WIDGETS.md)
### [3. Add JS/CSS](https://github.com/Goomento/DocBuilder/blob/master/DevDoc/RESOURCES.md)
