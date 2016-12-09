# Installation

## Composer

Add the following to your composer.json file

```json
{  
    "require": {  
        "cyber-duck/silverstripe-social-sharer": "1.0.*"
    }
}
```

Run composer and then visit /dev/build?flush=all to rebuild the database and flush the cache.

## Calling the Widget

Call the widget method in one of your templates to render the widget

```
$Top.SocialShareWidget
```