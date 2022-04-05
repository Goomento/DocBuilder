# How To Use Page Builder

### 1. Use default behavior to overwrite the Magento content
Go to specific Magento entity (CMS page/blocks or product) edit page
Open tab Page Builder
![Instruction ](https://i.imgur.com/y656InF.png)
Then
1. **Choose the content** or leave it blank then click on _Page Builder button_ on the top bar, It'll create automatically
2. **Enable PageBuilder**, this will overwrite the main content of this Magento entity

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
