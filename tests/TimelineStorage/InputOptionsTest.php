<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage\Test\TimelineStorage;

use DZunke\PanalyJsonTimelineStorage\TimelineStorage\InputOptions;
use DZunke\PanalyJsonTimelineStorage\TimelineStorage\InvalidOptions;
use PHPUnit\Framework\TestCase;

class InputOptionsTest extends TestCase
{
    public function testThatCreationWorksWithExistingTargetPath(): void
    {
        $inputOptions = new InputOptions('.');

        self::assertSame('.', $inputOptions->targetPath);
    }

    public function testThatANonExistingDirectoryDoesFail(): void
    {
        $this->expectException(InvalidOptions::class);
        $this->expectExceptionMessage('The target path "/foo/bar/baz" is not writable.');

        new InputOptions('/foo/bar/baz');
    }

    public function testThatCreatingWithArrayWithoutNeededOptionsWorks(): void
    {
        $inputOptions = InputOptions::fromArray([]);

        self::assertSame('./panaly-storage', $inputOptions->targetPath);
    }

    public function testThatHandingOverOptionsWithArrayWorks(): void
    {
        $inputOptions = InputOptions::fromArray(['directory' => '../../']);

        self::assertSame('../../', $inputOptions->targetPath);
    }
}
