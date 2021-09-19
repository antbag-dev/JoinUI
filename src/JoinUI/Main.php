<?php 

namespace antbag\JoinUI;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Commad;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class main extends PluginBase implements Listener {
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
                $this->saveDefaultConfig();
                $this->getResource("config.yml");
  }
  
  
  public function onJoin(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    
    $this->openMyForm($player);
  }
  
  public function openMyForm($player){
    $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
    $form = $api->createSimpleForm(function (Player $player, int $data = null){
       $result = $data;
       if($result === null){
         return true;
       }
       switch($result){
         case 0:
           
         break; 
       }
    });
    $form->setTitle($this->getConfig()->get("UI-Title"));
    $form->setContent($this->getConfig()->get("UI-Content"));
    $form->addButton("Close");
    $form->sendToPlayer($player);
    return $form;
  }
  
}
