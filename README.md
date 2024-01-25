# Winter Data plugin

![Winter Data](https://github.com/hounddd/wn-data-plugin/blob/main/.github/Data-plugin.png?raw=true)

> [Spatie Laravel Data](https://github.com/spatie/laravel-google-calendar) wrapper for WinterCMS

This package enables the creation of rich data objects which can be used in various ways. Using this package you only need to describe your data once.

**V1: for PHP 8.0+**

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

<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:32px; height:32px; float:left; margin-right:4px; "><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" /></svg>
Follow the official plugin repository: https://github.com/spatie/laravel-data/tree/v1  
See official documentation: https://spatie.be/docs/laravel-data/


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
Do not use the publish command. This plugin handles this the way it should be done in WinterCMS, which is why it was created in the first place.  
See: https://wintercms.com/docs/v1.2/docs/architecture/using-composer#using-laravel-packages


***
Make awesome sites with ❄ [WinterCMS](https://wintercms.com) !
