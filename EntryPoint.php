<?php
/**
 * @package Goomento_DocBuilder
 * @link https://github.com/Goomento/DocBuilder
 */
declare(strict_types=1);

namespace Goomento\DocBuilder;

use Goomento\DocBuilder\Builder\Widgets\HelloWorld;
use Goomento\PageBuilder\Builder\Managers\Elements;
use Goomento\PageBuilder\Builder\Managers\Widgets;
use Goomento\PageBuilder\BuilderRegister;
use Goomento\PageBuilder\Helper\ThemeHelper;

class EntryPoint extends BuilderRegister
{
    /**
     * Add widget categories, where is grouping the similar widget types
     *
     */
    public function registerWidgetCategories(Elements $elements)
    {
        $elements->addCategory('document', [
            'title' => __('Document'),
        ]);
    }

    /**
     * Add to queue your css files, that can be used by widget or theme later
     *
     * @return void
     */
    public function registerStyles()
    {
        ThemeHelper::registerStyle(
            'doc-builder-widget',
            ThemeHelper::getProductionResourceUrl('Goomento_DocBuilder/css/widget', '.css')
        );
    }

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

    /**
     * Add your widgets to be used here
     *
     * @see Widgets::registerWidgetType()
     */
    public function registerWidgets(Widgets $widgetsManager)
    {
        $widgetsManager->registerWidgetType(
            HelloWorld::class
        );
    }
}
