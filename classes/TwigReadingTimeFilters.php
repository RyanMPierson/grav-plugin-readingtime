<?php
namespace Grav\Common;

use RocketTheme\Toolbox\ResourceLocator\UniformResourceLocator;

class TwigReadingTimeFilters extends \Twig_Extension
{
  public function getName()
  {
    return 'TwigReadingTimeFilters';
  }

  public function getFilters()
  {
    return [
      new \Twig_SimpleFilter( 'readingtime', [$this, 'getReadingTime'] )
    ];
  }

  public function getReadingTime( $content, $params = array() )
  {
    $defaults = [
      'minute_label'  => 'minute',
      'minutes_label' => 'minutes',
      'second_label'  => 'second',
      'seconds_label' => 'seconds',
      'format'        => '{minutes_short_count} {minutes_text}, {seconds_short_count} {seconds_text}'
    ];

    $options = array_merge( $defaults, $params );

    $words = str_word_count( strip_tags( $content ) );

    $minutes_short_count = floor( $words / 200 );
    $seconds_short_count = floor( $words % 200 / ( 200 / 60 ) );

    $minutes_long_count = number_format( $minutes_short_count, 2 );
    $seconds_short_count = number_format( $seconds_short_count, 2 );

    $minutes_text = ( $minutes_short_count <= 1 ) ? $options['minute_label'] : $options['minutes_label'];
    $seconds_text = ( $seconds_short_count <= 1 ) ? $options['second_label'] : $options['seconds_label'];

    $replace = [
      'minutes_short_count'   => $minutes_short_count,
      'seconds_short_count'   => $seconds_short_count,
      'minutes_long_count'    => $minutes_long_count,
      'seconds_long_count'    => $seconds_long_count,
      'minutes_text'          => $minutes_text,
      'seconds_text'          => $seconds_text
    ];

    $result = $options['format'];

    foreach ( $replace as $key => $value ) {
      $result = str_replace( '{' . $key . '}', $value, $result );
    }

    return $result;
  }
}
