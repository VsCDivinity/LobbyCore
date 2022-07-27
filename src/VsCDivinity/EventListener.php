<?php

namespace VsCDivinity;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class EventListener implements Listener {
  
  public function onDamage(EntityDamageEvent $event):void {
        if(!$event->getEntity() instanceof Player) return;
        
        $event->cancel();
    }
    
    public function onHunger(PlayerExhaustEvent $event):void {
        $event->cancel();
    }
    
    public function onPlayerJoinEvent(PlayerJoinEvent $event) : void {
        $player = $event->getPlayer();
        $event->setJoinMessage("§l[§r§d+§r§l] §l" . $player->getName());
        $player->sendMessage("========================");
        $player->sendMessage("Lobby Core");
        $player->sendMessage("§7Discord: §bDiscord.gg/Lobbycore");
        $player->sendMessage("========================");
    }
}