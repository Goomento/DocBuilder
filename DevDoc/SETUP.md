# Register Entry Point On Module

### 1. Create the module entry point

In your module, Page Builder will only rely on your entry point and nowhere else

`EntryPoint` must extend from `Goomento\PageBuilder\BuilderRegister`

Eg: 
```php
namespace Goomento\DocBuilder;

use Goomento\PageBuilder\BuilderRegister;

class EntryPoint extends BuilderRegister
{
}
```

### 2. Inject the entry point to process by Page Builder

In your `<Module_Folder>/etc/di.xml` add

```xml
<type name="Goomento\PageBuilder\PageBuilder">
    <arguments>
        <argument name="components" xsi:type="array">
            <item name="component-name" xsi:type="string">Path/To/EntryPoint</item>
        </argument>
    </arguments>
</type>
```
Note: 
- `component-name`: must be unique
- `Path/To/EntryPoint`: `EntryPoint` which is created step above

Eg:
```xml
<type name="Goomento\PageBuilder\PageBuilder">
    <arguments>
        <argument name="components" xsi:type="array">
            <item name="doc-builder" xsi:type="string">Goomento\DocBuilder\DocBuilder</item>
        </argument>
    </arguments>
</type>
```

