<?php

namespace VsCDivinity;

pocketmine\plugin\PluginBase;

main class extends PluginBase {
  
  protected function onEnable(): void {
    self::$instance = $this;
    $this->getLogger()->notice("LobbyCore Activado");
    (new Loader($this))->load();
  }
  
  protected function onDisable(): void {
    $this->getLogger()->notice("LobbyCore Desactivado")
  }