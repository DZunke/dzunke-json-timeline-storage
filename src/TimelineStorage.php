<?php

declare(strict_types=1);

namespace DZunke\PanalyJsonTimelineStorage;

use DZunke\PanalyJsonTimelineStorage\TimelineStorage\InputOptions;
use Panaly\Plugin\Plugin\Storage;
use Panaly\Result\Result;

use function date;
use function dirname;
use function file_put_contents;
use function json_encode;
use function realpath;

use const DIRECTORY_SEPARATOR;
use const JSON_PRETTY_PRINT;
use const JSON_THROW_ON_ERROR;

final class TimelineStorage implements Storage
{
    public function getIdentifier(): string
    {
        return 'json-timeline-storage';
    }

    public function store(Result $result, array $options): void
    {
        $storageOptions = InputOptions::fromArray($options);

        $storageDocument = [
            'result' => $result->toArray(),
        ];

        $targetFilename = date($storageOptions->dateFormat) . '.json';
        $targetFilePath = $storageOptions->targetPath . DIRECTORY_SEPARATOR . $targetFilename;

        file_put_contents(
            realpath(dirname($targetFilePath)) . DIRECTORY_SEPARATOR . $targetFilename,
            json_encode($storageDocument, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT),
        );
    }
}
