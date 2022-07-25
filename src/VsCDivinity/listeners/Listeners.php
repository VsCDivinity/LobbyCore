<?php

namespace VsCDivinity\Listeners;

use VsCDivinity\EventListener;

class Listeners {
  
  public function onEnable(): void {
    $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
  }
  
}