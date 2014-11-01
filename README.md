# Grav ReadingTime Plugin

**ReadingTime** is a [Grav](http://github.com/getgrav/grav) plugin which allows Grav to display the reading time.

Enabling the plugin is very simple. Just install the plugin folder to `/user/plugins/` in your Grav install. By default, the plugin is enabled.

# Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the resulting folder to `readingtime`.

>> It is important that the folder be named `readingtime` as this is the folder referenced in the plugin's code.

The contents of the zipped folder should now be located in the `/your/site/grav/user/plugins/readingtime` directory.

>> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav), the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) plugins, and a theme to be installed in order to operate.

# Usage

### Initial Setup

Place the following line of code in the theme file you wish to add readingtime plugin for:

```
{{ page.content|readingtime }}
```

You need to pass a Twig Filter 'readingtime' to display the reading time values. You can translate the labels with this example:

```
{{ page.content|readingtime({'minutes': 'Minuti', 'minute': 'Minuto', 'seconds': 'Secondi', 'second': 'Secondo'}) }}
```

I used Italian translation for the labels, you can change with your language.

>> NOTE: Any time you are making alterations to a theme's files, you will likely want to duplicate the theme folder in the `user/themes/` directory, rename it, and set the new name as your active theme. This will ensure that you don't lose your customizations in the event that a theme is updated.
