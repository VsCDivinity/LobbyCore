<?php

namespace VsCDivinity;

pocketmine\plugin\PluginBase;

main class extends PluginBase {
  
  public function OnEnable(): void {
    $this->getLogger()->notice("LobbyCore Activado");
  }
  
  
}