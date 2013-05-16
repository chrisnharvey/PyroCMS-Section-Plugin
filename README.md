# PyroCMS Section Plugin

Use Laravel Blade style sections in your PyroCMS templates with this simple plugin.

## Purpose

The purpose of this plugin to to allow you to declare a section in any of your
views and access it anywhere, no matter which comes first.

So if you need to append some metadata to your header from your footer then
you can do so by delcaring your section in your footer and yielding the section
in your header.

So you can yield a section anywhere in any view, even if that view is processed
before your section is declared.

Sound good? Awesome! See below for a usage guide.

## Usage

This plugin is very simple to use.

### Declaring a section

To declare a section, use the following syntax.

```
{{ section:name }}
 This is my section
{{ /section:name }}
```

`name` is whatever you want to call your section.

### Yielding a section

To yield a section, use the following syntax.

```
{{ section:name }}
```

### Appending to a section
If you want to add to your section in multiple places, then you can append to your section using the same syntax which you used to declare it.
