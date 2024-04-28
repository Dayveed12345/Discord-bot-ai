<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Discord\Discord;
use Discord\WebSockets\Event;
use App\Http\Controllers\DiscordaibotController;

class triggerBot extends Command
{
    protected $discordaibotController;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:trigger-bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'triggers the bot to send a message';

    /**
     * Execute the console command.
     */
    public function handle(DiscordaibotController $discordaibotController)
    {
        $discordaibotController->run();
    }
}
