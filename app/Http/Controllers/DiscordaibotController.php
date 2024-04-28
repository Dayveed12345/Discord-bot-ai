<?php

namespace App\Http\Controllers;
use Discord\Discord;
use Discord\WebSockets\Event;
use App\Http\Controllers\GeminiController;


class DiscordaibotController extends Controller
{
    protected $geminiController;
    public function __construct(){
        $this->geminiController = new GeminiController();
    }
    public function run()
    {

        $discord = new Discord([
            'token' => config("discord.discord_token")
        ]);

        $discord->on(Event::MESSAGE_CREATE, function ($message, $discord) {

            if (strpos($message->content, '!hello') === 0) {
                $firstSpacePos = strpos($message->content, ' ');
                
                if($firstSpacePos!==false){
                    $submessage=substr($message, $firstSpacePos+1);
                    $message->channel->sendMessage($this->geminiController->respond($submessage));
                }
            }
        });


        $discord->run();
    }
}
