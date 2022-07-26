<?php


namespace Lobby\command;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player\player;
use pocketmine\utils\TextFormat;

class FlyCommand extends Command
{

    public function __construct()
    {
        parent::__construct('fly', 'fly command');
        $this->setPermission('fly.use');
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if (!$sender->hasPermission("fly.use")) {
             $sender->sendMessage("§l[§r§c§l!§r§l] §r§c§lyou do not have permissions to use this command ")
            return;
        }

        if (!$sender instanceof Player) {
            return;
        }

        if ($sender->getAllowFlight() === false) {
            $sender->setFlying(true);
            $sender->setAllowFlight(true);
            $sender->sendMessage(TextFormat::GREEN . "You have enabled the flight!");
        } else {
            $sender->setFLying(false);
            $sender->setAllowFlight(false);
            $sender->sendMessage(TextFormat::RED . "You have disabled the flight!");
        }
    }
}