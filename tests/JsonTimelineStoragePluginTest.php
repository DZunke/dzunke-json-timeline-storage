<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage\Test;

use DZunke\PanalyJsonTimelineStorage\JsonTimelineStoragePlugin;
use DZunke\PanalyJsonTimelineStorage\TimelineStorage;
use PHPUnit\Framework\TestCase;

class JsonTimelineStoragePluginTest extends TestCase
{
    public function testThatStorageIsRegistered(): void
    {
        $plugin = new JsonTimelineStoragePlugin();

        $storages = $plugin->getAvailableStorages([]);

        self::assertCount(1, $storages);
        self::assertInstanceOf(TimelineStorage::class, $storages[0]);
    }
}
