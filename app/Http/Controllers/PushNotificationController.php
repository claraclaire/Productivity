<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PushNotification;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PushNotificationController extends Controller
{
    //  public function sendNotificationToDevice()
    // {
    //     $deviceToken = '2dfafFMVSP84eAvg:APadf21bEiWPOBVkcyMBsaSiyXXbhqaV22DatihS0D1irxUmek0_Vh81H8DGjkr80y25dA212AdfDFeHkl@lijhiCLa8V9NgTP-x7f3nXnQaolhKeuNMJ2cXg2_0';

    //     $message = 'We have successfully sent a push notification!';

    //     // Send the notification to the device with a token of $deviceToken
    //     $collection = PushNotification::app('appNameAndroid')
    //         ->to($deviceToken)
    //         ->send($message);
    // }
}
