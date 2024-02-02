<?php

namespace App\Console\Commands;

use PhpMqtt\Client\MqttClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MqttListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mqtt-listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mqtt = new MqttClient(env('MQTT_HOST'), 1883, uniqid(), MqttClient::MQTT_3_1);
        $mqtt->connect(null, true);        
        $mqtt->subscribe('kwhMeter42', function (string $topic, string $message) {
            echo sprintf("Received QoS level 1 message on topic [%s]: %s \n", $topic, $message);
            Log::channel('log-mqtt')->info(["message" => $message]);
            // $check = PenggunaanStation::where('user_id', 1)->first();
            // if(!$check){
            //     $check = new PenggunaanStation;
            //     $check->user_id = 1;
            //     $check->nama_stasiun = 'Stasiun Bandung - Bubat';
            //     $check->status = 'used';
            // }
            // if($message != 'Not Used'){
            //     $data = explode('-', $message);
            //     $check->elapsed_time = $data[0];
            //     $check->kwh = $data[1];
            //     $check->harga = $data[2];
            // }else{
            //     $check->status = 'not used';
            // }
            // $check->save();
        }, 1);
        $mqtt->loop(true);
    }
}
