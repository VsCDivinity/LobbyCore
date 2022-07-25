<?php

namespace VsCDivinity;

pocketmine\plugin\PluginBase;

class Main extends PluginBase {
  
  public function OnLoad(): void {
    $this->getLogger()->notice("LobbyCore Activado");
  }
  
  public function OnEnable(): void {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");
    
    $NetworkName = $this->getConfig()->get("NetworkName");
    $this->getServer()->getNetwork()->setname("");
  }
  
  
}