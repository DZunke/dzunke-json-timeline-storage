<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage\TimelineStorage;

use RuntimeException;

use function dirname;
use function is_dir;
use function is_writable;
use function mkdir;
use function sprintf;

use const DIRECTORY_SEPARATOR;

readonly class InputOptions
{
    public function __construct(
        public string $targetPath,
        public string $dateFormat = 'Y-m-d-H-i-s',
    ) {
        if (! is_dir($this->targetPath) || ! is_writable($this->targetPath)) {
            throw InvalidOptions::targetPathIsNotWritable($this->targetPath);
        }

        if ($this->dateFormat === '') {
            throw InvalidOptions::dateFormatMustNotBeBlank();
        }
    }

    public static function fromArray(array $options): InputOptions
    {
        $targetPath = $options['directory'] ?? null;
        if ($targetPath === null) {
            $targetPath = dirname('.') . DIRECTORY_SEPARATOR . 'panaly-storage';
            if (! @mkdir($targetPath, 0755, true) && ! is_dir($targetPath)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $targetPath));
            }
        }

        return new self(
            $targetPath,
            $options['dateFormat'] ?? 'Y-m-d-H-i-s',
        );
    }
}
