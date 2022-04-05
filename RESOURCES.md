# Add JS/CSS

### 1. Register CSS
Create the CSS file `<Module_Folder>/view/frontend/web/<file_path>.less`

Eg:
Phtml template [view/frontend/web/css/widget.less](https://github.com/Goomento/DocBuilder/blob/master/view/frontend/web/css/widget.less)

```less
/**
 * Should wrap widget style in wrapper
 * Wrapper format .gmt-widget-<unique-name-of-widget>
 */
.gmt-widget-hello-world {
    .hello-world {
        color: red; // change color of text to red
    }
}
```

Overwrite method `registerStyles` in `EntryPoint` then add CSS paths

Eg: 
```php
namespace Goomento\DocBuilder;

class EntryPoint extends BuilderRegister
{
    /**
     * Add to queue your css files, that can be used by widget or theme later
     *
     * @return void
     */
    public function registerStyles()
    {
        ThemeHelper::registerStyle(
            'doc-builder-widget',
            'Goomento_PageBuilder::css/widget.css'
        );
    }
}
```

### 2. Register JS

Create the JS file `<Module_Folder>/view/frontend/web/<file_path>.js`, 
and wrap your function in case of co-work with widget

```javascript
define([
    'pagebuilderRegister'
], function ($, model, pagebuilderRegister) {
    const defaultConfig = {};
    
    pagebuilderRegister.widgetRegister(
        'unique-name-of-widget',
        function (args) {
            // `args` will contain data of `defaultConfig`
            // console.log(args)
        },
        defaultConfig
    );
})
```
Eg: JS file [view/frontend/web/js/bubbling.js](https://github.com/Goomento/DocBuilder/blob/master/view/frontend/web/js/bubbling.js)
```javascript
define([
    'jquery',
    'pagebuilderRegister'
], function ($, pagebuilderRegister) {
    const defaultConfig = {
        colors: ['red', 'green', 'yellow', 'black'],
        $element: $
    };
    pagebuilderRegister.widgetRegister(
        'hello-world',
        function (args) {
            setInterval(function () {
                // Get random color from `defaultConfig`
                let color = args.colors[Math.random() * args.colors.length | 0];

                // Changing color
                args.$element.find('.hello-world').css('color', color);
            }, 1000);
        },
        defaultConfig
    );
})
```

Overwrite method `registerScripts` in `EntryPoint` then add JS paths

Eg:
```php
namespace Goomento\DocBuilder;

use Goomento\PageBuilder\Helper\ThemeHelper;

class EntryPoint extends BuilderRegister
{
    /**
     * Add to queue your js files, that can be used by widget
     *
     * @return void
     */
    public function registerScripts()
    {
        ThemeHelper::registerScript(
            'doc-builder-bubbling',
            'Goomento_DocBuilder/js/bubbling'
        );
    }

}
```
### 3. Add CSS/JS to Widget for use as dependencies

In case of Widget being used, the CSS or JS will be added automatically into storefront
. To do that, should add CSS or JS to widget as a dependency.

Eg:
```php
namespace Goomento\DocBuilder\Builder\Widgets;

use Goomento\PageBuilder\Helper\ThemeHelper;

class HelloWorld extends AbstractWidget
{
    
    /**
     * Get style dependencies.
     *
     * Retrieve the list of style dependencies the element requires.
     *
     * @see \Goomento\DocBuilder\EntryPoint::registerStyles()
     * @return array
     */
    public function getStyleDepends()
    {
        return ['doc-builder-widget'];
    }

    /**
     * Get script dependencies.
     *
     * Retrieve the list of script dependencies the element requires.
     *
     *
     * @return array Element scripts dependencies.
     */
    public function getScriptDepends()
    {
        return ['doc-builder-bubbling'];
    }
}
```

