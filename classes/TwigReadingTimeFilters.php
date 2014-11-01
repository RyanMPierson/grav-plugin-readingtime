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
      'minute'  => 'minute',
      'minutes' => 'minutes',
      'second'  => 'second',
      'seconds' => 'seconds',
      'format'  => '{minutes_count} {minutes_label}, {seconds_count} {seconds_label}'
    ];

    $options = array_merge( $defaults, $params );

    $words = str_word_count( strip_tags( $content ) );

    $minutes_count = floor( $words / 200 );
    $seconds_count = floor( $words % 200 / ( 200 / 60 ) );

    $minutes_label = ( $minutes_count <= 1 ) ? $options['minute'] : $options['minutes'];
    $seconds_label = ( $seconds_count <= 1 ) ? $options['second'] : $options['seconds'];

    $replace = [
      'minutes_count'   => $minutes_count,
      'seconds_count'   => $seconds_count,
      'minutes_label'   => $minutes_label,
      'seconds_label'   => $seconds_label
    ];

    $result = $options['format'];

    foreach ( $replace as $key => $value ) {
      $result = str_replace( '{' . $key . '}', $value, $result );
    }

    return $result;
  }
}
