<?php

namespace VsCDivinity;

pocketmine\plugin\PluginBase;

main class extends PluginBase {
  
  public function OnLoad(): void {
    $this->getLogger()->notice("LobbyCore Activado");
  }
  public function OnEnable(): void {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");
  }
  
  
}