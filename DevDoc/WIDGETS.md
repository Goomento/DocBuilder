# Create First Builder Widget

### 1. Create your widget class

Create `<Module_Folder>/Builder/Widgets` folder to stores all the widget

`WidgetClass` must extend from `Goomento\PageBuilder\Builder\Base\AbstractWidget`

Eg: [Goomento\DocBuilder\Builder\Widgets\HelloWorld](https://github.com/Goomento/DocBuilder/blob/master/Builder/Widgets/HelloWorld.php)
Widget Class

```php
namespace Goomento\DocBuilder\Builder\Widgets;

use Goomento\PageBuilder\Builder\Base\AbstractWidget;
use Goomento\PageBuilder\Builder\Managers\Controls;
use Magento\Framework\Phrase;

class HelloWorld extends AbstractWidget
{
    /**
     * Unique name of widget
     */
    const NAME = 'hello-world';

    /**
     * Template which present for HTML output of widget
     *
     * @var string
     */
    protected $template = 'Goomento_DocBuilder::widgets/hello_world.phtml';

    /**
     * Name of widget, It will display in Page Builder Editor
     *
     * @return Phrase|string
     */
    public function getTitle()
    {
        return __('Hello World');
    }

    /**
     * Icon of widget, It will display in Page Builder Editor
     
     * @link https://fontawesome.com/
     * @return string
     */
    public function getIcon()
    {
        return 'fas fa-hand-peace';
    }

    /**
     * Keywords for search of widget, ease to find this widget
     *
     * @return string[]
     */
    public function getKeywords()
    {
        return [ 'hello world' ];
    }

    /**
     * Used to add new controls to widget. For example, external
     * developers use this method to register controls in a widget.
     *
     * @return void
     */
    protected function registerControls()
    {
        $this->startControlsSection(
            'section_hello_world_info',
            [
                'label' => __('Information'),
            ]
        );

        $this->addControl(
            'hello-world-name',
            [
                'label' => __('Your Name Is'),
                'type' => Controls::TEXT,
                'default' => '',
                'placeholder' => __('Eg: John'),
            ]
        );

        $this->endControlsSection();
    }
}
```

Other samples can be found here [Goomento\PageBuilder\Builder\Widgets](https://github.com/Goomento/PageBuilder/blob/master/Builder/Widgets)

### 2. Add template `.phtml`

Create file `<Module_Folder>/view/frontend/widgets/<template_name>.phtml` then add to `WidgetClass`

Eg:

Phtml template [Goomento_DocBuilder::widgets/hello_world.phtml](https://github.com/Goomento/DocBuilder/blob/master/view/frontend/templates/widgets/hello_world.phtml) 
```php
use Goomento\DocBuilder\Builder\Widgets\HelloWorld;
use Goomento\PageBuilder\Block\View\Element\Widget;
use Goomento\PageBuilder\Helper\EscaperHelper;

/**
 * @var Widget $block
 * @var HelloWorld $widget
 * @var array $settings
 */

$widget = $block->getWidget();
$settings = $block->getSettingsForDisplay();

/**
 * `hello-world-name` is the key, which is set in the `registerControls`
 * @see Goomento\DocBuilder\Builder\Widgets\HelloWorld::registerControls()
 */
if (!empty($settings['hello-world-name'])) : ?>
    <p class="hello-world"><?= __('Hello World! My name is %1', EscaperHelper::escapeHtml($settings['hello-world-name'])) ?></p>
<?php endif;

```

Add to class
```php
namespace Goomento\DocBuilder\Builder\Widgets;

class HelloWorld extends AbstractWidget
{
    protected $template = 'Goomento_DocBuilder::widgets/hello_world.phtml';
}
```

### 3. Add To Page Builder Editor

Overwrite method `registerWidgets` on `EntryPoint` then add `WidgetClass`

Eg:
```php
namespace Goomento\DocBuilder;

class EntryPoint extends BuilderRegister
{
    /**
     * Add your widgets to be used here
     *
     * @see Widgets::registerWidgetType()
     */
    public function registerWidgets(Widgets $widgetsManager)
    {
        $widgetsManager->registerWidgetType(
            \Goomento\DocBuilder\Builder\Widgets\HelloWorld::class
        );
    }
}

```
