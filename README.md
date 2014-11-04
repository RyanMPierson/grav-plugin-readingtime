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
{{ page.content|readingtime({'minutes_label': 'Minuti', 'minute_label': 'Minuto', 'seconds_label': 'Secondi', 'second_label': 'Secondo'}) }}
```

I used Italian translation for the labels, you can change with your language.

If you need you can change the format with this avariable variables (the code is default format):

```
{{ page.content|readingtime({'format': '{minutes_short_count} {minutes_text}, {seconds_short_count} {seconds_text}'}) }}
```

Avariable variables:
`{minute_label}`: minute label (ex. minute)
`{minutes_label}`: minutes label (ex. minutes)
`{second_label}`: second label (ex. second)
`{seconds_label}`: seconds label (ex. seconds)
`{format}`: display the format of reading time plugin (ex. {minutes_text} {minutes_short_count}, {seconds_text} {seconds_short_count})

Not avariable to edit but used in format variable:

`{minutes_short_count}`: display minutes (ex. 2)
`{seconds_short_count}`: display seconds (ex. 9)
`{minutes_long_count}`: display long version of minutes (ex. 02)
`{seconds_long_count}`: display long version of seconds (ex. 09)

Display variables for text labels:
`{minutes_text}`: display the minutes text label based on number of minutes for write single or plural version.
`{seconds_text}`: display the seconds text label based on number of seconds for write single or plural version.

>> NOTE: Any time you are making alterations to a theme's files, you will likely want to duplicate the theme folder in the `user/themes/` directory, rename it, and set the new name as your active theme. This will ensure that you don't lose your customizations in the event that a theme is updated.
