<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage;

use Panaly\Configuration\ConfigurationFile;
use Panaly\Configuration\RuntimeConfiguration;
use Panaly\Plugin\Plugin;

final class JsonTimelineStoragePlugin implements Plugin
{
    /** @inheritDoc */
    public function initialize(
        ConfigurationFile $configurationFile,
        RuntimeConfiguration $runtimeConfiguration,
        array $options,
    ): void {
        $runtimeConfiguration->addStorage(new TimelineStorage());
    }
}
