<?php

namespace schnecki;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\LeavesDecayEvent;

class Main extends PluginBase implements Listener {

    private array $ignoredWorlds = [];

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->ignoredWorlds = $this->getConfig()->get("ignored-worlds", []);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onLeafDecay(LeavesDecayEvent $event): void {
        $world = $event->getBlock()->getPosition()->getWorld()->getFolderName();
        if (!in_array($world, $this->ignoredWorlds)) {
            $event->cancel();
        }
    }
}
