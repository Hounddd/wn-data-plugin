# Winter Data plugin

![Winter Data](https://github.com/hounddd/wn-data-plugin/blob/main/.github/Data-plugin.png?raw=true)

> [Spatie Laravel Data](https://github.com/spatie/laravel-google-calendar) wrapper for WinterCMS

This package enables the creation of rich data objects which can be used in various ways. Using this package you only need to describe your data once.

## Compatibility

| PHP  | Data plugin v2 |  Data plugin v1 | 
|------|----------------|----------------|
| 8.1+ | ✅ | best to use v2 |
| 8.0+ | ❌ | ✅ |

## Features

A laravel-data specific object is just a regular PHP object that extends from Data:

```php
use Spatie\LaravelData\Data;

class SongData extends Data
{
    public function __construct(
        public string $title,
        public string $artist,
    ) {
    }
}
```
Since this is just a simple PHP object, it can be initialized as such:

```php
new SongData('Never gonna give you up', 'Rick Astley');
```

But with this package, you can initialize the data object also with an array:

```php
SongData::from(['title' => 'Never gonna give you up', 'artist' => 'Rick Astley']);
```

ℹFollow the official plugin repository: https://github.com/spatie/laravel-data/tree/v1  
ℹSee official documentation: https://spatie.be/docs/laravel-data/


## Installation
*Let assume you're in the root of your wintercms installation*

### Using composer
Just run this command
```bash
composer require hounddd/wn-data-plugin
```

### Clone
Clone this repo into your winter plugins folder.

```bash
cd plugins
mkdir hounddd && cd hounddd
git clone https://github.com/Hounddd/wn-data-plugin data
```

⚠ Do not use the publish command. This plugin handles this the way it should be done in WinterCMS, which is why it was created in the first place.  
See: https://wintercms.com/docs/v1.2/docs/architecture/using-composer#using-laravel-packages


***
Make awesome sites with ❄ [WinterCMS](https://wintercms.com) !
