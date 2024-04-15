<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage\Test\TimelineStorage;

use DZunke\PanalyJsonTimelineStorage\TimelineStorage\InvalidOptions;
use PHPUnit\Framework\TestCase;

class InvalidOptionsTest extends TestCase
{
    public function testTargetPathIsNotWritable(): void
    {
        $exception = InvalidOptions::targetPathIsNotWritable('foo');

        self::assertSame($exception->getMessage(), 'The target path "foo" is not writable.');
    }
}
