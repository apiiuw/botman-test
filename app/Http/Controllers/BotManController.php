<?php
namespace App\Http\Controllers;
   
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
   
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if ($message == 'Hai') {
                $this->askName($botman);
            }
            
            else{
                $botman->reply("Katakan Hai!");
            }
   
        });
   
        $botman->listen();
    }
   
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Dengan siapa saya berbicara?', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('Senang bertemu dengamu '.$name, '!');
        });
    }
}