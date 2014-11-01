<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class ReadingTimePlugin extends Plugin
{
  public static function getSubscriptedEvents()
  {
    return [
      'onPluginsInitialized'  => ['onPluginsInitialized', 0],
      'onTwigExtensions '     => ['onTwigExtensions ', 0]
    ];
  }

  public function onPluginsInitialized()
  {
    if ( $this->isAdmin() ) {
      $this->active = false;
    }
  }

  public function onTwigExtensions()
  {
    if ( ! $this->active ) return;

    require_once( __DIR__ . '/classes/TwigReadingTimeFilters.php' );

    $this->grav['twig']->twig->addExtension( new \Grav\Common\TwigReadingTimeFilters() );
  }
}
