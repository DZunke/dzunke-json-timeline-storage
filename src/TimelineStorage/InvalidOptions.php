<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage\TimelineStorage;

use InvalidArgumentException;

final class InvalidOptions extends InvalidArgumentException
{
    public static function targetPathIsNotWritable(string $targetPath): InvalidOptions
    {
        return new self('The target path "' . $targetPath . '" is not writable.');
    }

    public static function dateFormatMustNotBeBlank(): InvalidOptions
    {
        return new self('The date format must not be configured with a blank string.');
    }
}
