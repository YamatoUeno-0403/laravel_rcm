<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    //

    public function showServiceContainerTest()
    {
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルテスト';
        });

        app()->bind('sample', sample::class);
        $sample = app()->make('sample');
        $sample->run();
        dd($sample, app());
    }
}

class Sample{

    public $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }
}
class Message{

    public function send(){
        echo('メッセージ表示');
    }
}