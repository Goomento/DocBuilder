# How To Use Page Builder

### 1. Use the Goomento Builder Assistant
Go to specific Magento entity (CMS page/blocks or product ...) editable page

![Use the Goomento Builder Assistant](https://i.imgur.com/CeSYeBL.png)

Some buttons might be considered

- **Migrate Now** Migrate the old content - which is not compatible with Page Builder.
- **Create New** Create new Page Builder entity then attach it into content.
- **Open Editor** Open Page Builder Editor for editing

You can also de-activate the Page Builder Assistance, then back to Magento Editor

![De-activate the Page Builder Assistance](https://i.imgur.com/PnladKO.png)

For permanent deactivating Builder Assistance, you have set the config here to `No`

    Stores > Settings > Configuration > Goomento > Page Builder > Builder Assistance > Active

![Permanent deactivating Builder Assistance](https://i.imgur.com/2IBBzIZ.png)

### 2. Use the WYSIWYG widget in any text editor
Open text editor, then select the widget chosen
![WYSIWYG Widget](https://i.imgur.com/uMwCbej.png)
Choose your page
![Choose widget](https://i.imgur.com/8n7H664.png)

### 3. Use content widget code
Add this snippet

```
{{widget type="PageBuilderRenderer" identifier="page-builder-identifier"}}
```

Like this
![Text editor](https://i.imgur.com/ZNCdTVA.png)

### 4. Use this snippet in the layout `.xml` file

```xml
<block class="PageBuilderRenderer" name="unique-block-name">
    <arguments>
        <argument name="identifier" xsi:type="string">page-builder-identifier</argument>
    </arguments>
</block>
```

### 5. Use this snippet in the template `.phtml` file

```php
<?= $block->getLayout()
    ->getBlock('PageBuilderRenderer')
    ->setIdentifier('page-builder-identifier')
    ->toHtml(); ?>
```


**Note:**
* Replace `page-builder-identifier` alias with your actual page builder identifier
* Replace `unique-block-name` alias with your actual unique block name
