<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage\Test;

use DZunke\PanalyJsonTimelineStorage\JsonTimelineStoragePlugin;
use DZunke\PanalyJsonTimelineStorage\TimelineStorage;
use Panaly\Configuration\ConfigurationFile;
use Panaly\Configuration\RuntimeConfiguration;
use PHPUnit\Framework\TestCase;

class JsonTimelineStoragePluginTest extends TestCase
{
    public function testThatStorageIsRegistered(): void
    {
        $configurationFile    = $this->createMock(ConfigurationFile::class);
        $runtimeConfiguration = $this->createMock(RuntimeConfiguration::class);

        $matcher = $this->exactly(1);

        $runtimeConfiguration->expects($matcher)
            ->method('addStorage')
            ->willReturnCallback(static function (object $metric) use ($matcher): void {
                match ($matcher->numberOfInvocations()) {
                    1 => self::assertInstanceOf(TimelineStorage::class, $metric),
                    default => self::fail('Too much is going on here!'),
                };
            });

        (new JsonTimelineStoragePlugin())->initialize($configurationFile, $runtimeConfiguration, []);
    }
}
