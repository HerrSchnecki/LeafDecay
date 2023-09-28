<?php

namespace schnecki\leaf;

use pocketmine\event\Listener;
use pocketmine\event\block\LeavesDecayEvent;
use pocketmine\plugin\PluginBase;

class leave extends PluginBase implements Listener {

    public function onEnable():void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onLeafDecay(LeavesDecayEvent $event) {
        $event->cancel();
    }
}