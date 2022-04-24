<?php
/**
 * @package Goomento_DocBuilder
 * @link https://github.com/Goomento/DocBuilder
 */
declare(strict_types=1);

namespace Goomento\DocBuilder\Builder\Widgets;

use Goomento\PageBuilder\Builder\Base\AbstractWidget;
use Goomento\PageBuilder\Builder\Managers\Controls;
use Magento\Framework\Phrase;

class HelloWorld extends AbstractWidget
{
    /**
     * Disabled this sample widget
     */
    const ENABLED = false;

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

    /**
     * Get widget categories.
     *
     * Retrieve the widget categories.
     *
     * @see \Goomento\DocBuilder\EntryPoint::registerWidgetCategories()
     * @return string[]
     */
    public function getCategories()
    {
        return ['document'];
    }

    /**
     * Icon of widget, It will display in Page Builder Editor
     * @link https://fontawesome.com/
     *
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
