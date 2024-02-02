<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;
use App\Events\StationDataReceived;

class StationController extends Controller
{
    public function useStation(Request $request){
        $mqtt = MQTT::connection();
        MQTT::publish('kwhMeter43', $request->message);

        $mqtt->disconnect();

        return response()->json(['status' => 'success']);
    }

    public function receiveData(Request $request)
    {
        $data = $request->input('data');

        // Broadcast event to all connected clients
        event(new StationDataReceived($data));

        return response()->json(['status' => 'success']);
    }
}
