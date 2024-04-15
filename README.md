# Panaly - Project Analyzer - JSON Timeline Storage

The plugin to the [Panaly Project Analyzer](https://github.com/DZunke/panaly) delivers a timelined storage engine that could be utilize to keep a
historical store of different metric runs. The json files will be pretty printed to be readable by humans. 

## Example Configuration

```yaml
# panaly.dist.yaml
plugins:
    DZunke\PanalyJsonTimelineStorage\JsonTimelineStoragePlugin: ~ # no options available

storage:
    json-timeline-storage:
        directory: "var/panaly-timeline-storage"
        dateFormat: "Y-m-d" # default is "Y-m-d-H-i-s", but setting it to daily will overwrite existing runs from the day
```

## Thanks and License

**Panaly Project Analyzer - JSON Timeline Storage** © 2024+, Denis Zunke. Released utilizing the [MIT License](https://mit-license.org/).

> GitHub [@dzunke](https://github.com/DZunke) &nbsp;&middot;&nbsp;
> Twitter [@DZunke](https://twitter.com/DZunke)
