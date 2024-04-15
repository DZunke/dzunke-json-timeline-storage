<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage\Test;

use DZunke\PanalyJsonTimelineStorage\TimelineStorage;
use Panaly\Result\Result;
use PHPUnit\Framework\TestCase;

class TimelineStorageTest extends TestCase
{
    public function testThatTheIdentifierIsCorrectlyDefined(): void
    {
        $storage = new TimelineStorage();

        self::assertSame('json-timeline-storage', $storage->getIdentifier());
    }

    public function testThatThereIsAnExceptionForInvalidDirectoryOption(): void
    {
        $this->expectException(TimelineStorage\InvalidOptions::class);

        $storage = new TimelineStorage();
        $storage->store(new Result(), ['directory' => 'invalid']);
    }
}
