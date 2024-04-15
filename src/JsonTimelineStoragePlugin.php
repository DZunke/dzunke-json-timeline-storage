<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage;

use Panaly\Plugin\BasePlugin;

final class JsonTimelineStoragePlugin extends BasePlugin
{
    /** @inheritDoc */
    public function getAvailableStorages(array $options): array
    {
        return [new TimelineStorage()];
    }
}
