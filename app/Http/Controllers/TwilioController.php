<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TwilioController extends Controller
{
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    // require_once '/path/to/vendor/autoload.php';
    protected $sid;
    protected $token;
    protected $phone;

    public function __construct()
    {
        $this->sid    = env('TWILIO_ACCOUNT_SID');
        $this->token  = env('TWILIO_AUTH_TOKEN');
        $this->phone  = env('TWILIO_PHONE_NUMBER_WHATSAPP');
    }
    
    public function sendWhatsAppMessage()
    {
        $recipientNumber = 'whatsapp:553399834822';
        $nome = 'Andre';
        $message = 'Teste de mensagem - ' . $nome;

        $twilio = new Client($this->sid, $this->token);
        
        try {

            $message = $twilio->messages->create(
                $recipientNumber, array(
                    "from" => $this->phone,
                    "body" => $message
                    )
                );

            return response()->json([
                'message' => 'WhatsApp message sent successfully',
                'sid' => $message->sid,
                'outro' => $message->body,
                'phone' => $recipientNumber
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'details' => 'Check your Twilio number and recipient number formatting'
            ], 500);
        }
        
        
        print($message->sid);
    }
}
