<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

if (!defined('ABSPATH')) exit;


class ComposerStaticInitf296be7105b814a4d169e5372d2e164e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MailPoet\\Premium\\' => 17,
            'MailPoetGenerated\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MailPoet\\Premium\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
        'MailPoetGenerated\\' => 
        array (
            0 => __DIR__ . '/../..' . '/generated',
        ),
    );

    public static $classMap = array (
        'MailPoetGenerated\\PremiumCachedContainer' => __DIR__ . '/../..' . '/generated/PremiumCachedContainer.php',
        'MailPoet\\Premium\\API\\JSON\\v1\\ResponseBuilders\\StatsResponseBuilder' => __DIR__ . '/../..' . '/lib/API/JSON/v1/ResponseBuilders/StatsResponseBuilder.php',
        'MailPoet\\Premium\\API\\JSON\\v1\\Stats' => __DIR__ . '/../..' . '/lib/API/JSON/v1/Stats.php',
        'MailPoet\\Premium\\Config\\Env' => __DIR__ . '/../..' . '/lib/Config/Env.php',
        'MailPoet\\Premium\\Config\\Hooks' => __DIR__ . '/../..' . '/lib/Config/Hooks.php',
        'MailPoet\\Premium\\Config\\Initializer' => __DIR__ . '/../..' . '/lib/Config/Initializer.php',
        'MailPoet\\Premium\\Config\\Localizer' => __DIR__ . '/../..' . '/lib/Config/Localizer.php',
        'MailPoet\\Premium\\Config\\Renderer' => __DIR__ . '/../..' . '/lib/Config/Renderer.php',
        'MailPoet\\Premium\\DI\\ContainerConfigurator' => __DIR__ . '/../..' . '/lib/DI/ContainerConfigurator.php',
        'MailPoet\\Premium\\Newsletter\\StatisticsClicksRepository' => __DIR__ . '/../..' . '/lib/Newsletter/StatisticsClicksRepository.php',
        'MailPoet\\Premium\\Newsletter\\StatisticsOpensRepository' => __DIR__ . '/../..' . '/lib/Newsletter/StatisticsOpensRepository.php',
        'MailPoet\\Premium\\Newsletter\\StatisticsUnsubscribesRepository' => __DIR__ . '/../..' . '/lib/Newsletter/StatisticsUnsubscribesRepository.php',
        'MailPoet\\Premium\\Newsletter\\Stats\\PurchasedProducts' => __DIR__ . '/../..' . '/lib/Newsletter/Stats/PurchasedProducts.php',
        'MailPoet\\Premium\\Newsletter\\Stats\\SubscriberEngagement' => __DIR__ . '/../..' . '/lib/Newsletter/Stats/SubscriberEngagement.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf296be7105b814a4d169e5372d2e164e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf296be7105b814a4d169e5372d2e164e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf296be7105b814a4d169e5372d2e164e::$classMap;

        }, null, ClassLoader::class);
    }
}