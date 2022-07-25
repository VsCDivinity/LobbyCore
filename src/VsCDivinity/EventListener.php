<?php

namespace VsCDivinity;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class EventListevent implements Listener {
  
  public function onDamage(EntityDamageEvent $event):void {
        if(!$event->getEntity() instanceof Player) return;
        
        $event->cancel();
    }
    
    public function onHunger(PlayerExhaustEvent $event):void {
        $event->cancel();
    }

}