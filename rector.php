<?php

declare(strict_types=1);

use Contao\Rector\Set\ContaoSetList;
use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Php81\Rector\Array_\ArrayToFirstClassCallableRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/contao',

    ])
    ->withPhpVersion(PhpVersion::PHP_84)
    ->withPhpSets(php84: true)
    ->withRules([
        AddVoidReturnTypeWhereNoReturnRector::class,
    ])

    ->withImportNames(
        importShortClasses: false,
        removeUnusedImports: true
    )
    ->withComposerBased(
        twig: true,
        doctrine: true,
        phpunit: true,
        symfony: true,
    )
    ->withSets([
        // The cumulative Contao sets reference constants removed in Rector 2.6.
        // Composer-based sets cover the installed Symfony and Doctrine versions.
        ContaoSetList::CONTAO_49,
        ContaoSetList::CONTAO_413,
        ContaoSetList::CONTAO_50,
        ContaoSetList::CONTAO_51,
        ContaoSetList::CONTAO_53,
        DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
        ContaoSetList::FQCN,
        ContaoSetList::ANNOTATIONS_TO_ATTRIBUTES,
    ])
    ->withSkip([
        ArrayToFirstClassCallableRector::class,
    ])
    ;
