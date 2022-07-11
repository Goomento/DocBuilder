<?php
/**
 * @package Goomento_DocBuilder
 * @link https://github.com/Goomento/DocBuilder
 */
declare(strict_types=1);

namespace Goomento\DocBuilder\Setup\Patch\Data;

use Exception;
use Goomento\DocBuilder\Samples\Luma;
use Goomento\PageBuilder\Api\SampleImporterInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class LumaSampleImportV1 implements DataPatchInterface
{
    /**
     * @var SampleImporterInterface
     */
    private $sampleImporter;
    /**
     * @var Luma
     */
    private $lumaSample;

    /**
     * @param SampleImporterInterface $sampleImporter
     * @param Luma $lumaSample
     */
    public function __construct(
        SampleImporterInterface $sampleImporter,
        Luma $lumaSample
    )
    {
        $this->sampleImporter = $sampleImporter;
        $this->lumaSample = $lumaSample;
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        try {
            $this->sampleImporter
                ->setSampleImport($this->lumaSample)
                ->import();
        } catch (Exception $e) {}
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }
}
