<?php
    require __DIR__ . '/vendor/autoload.php';

    use Twilio\Rest\Client;
    use Dotenv\Dotenv;

    // Load environment variables from .env file
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    function sendSms($to, $message) {
        $sid = $_ENV['TWILIO_ACCOUNT_SID'];
        $token = $_ENV['TWILIO_AUTH_TOKEN'];
        $twilio_number = $_ENV['TWILIO_PHONE_NUMBER'];

        try {
            $client = new Client($sid, $token);
            $client->messages->create(
                $to,
                [
                    "from" => $twilio_number,
                    "body" => $message
                ]
            );
        } catch (Exception $e) {
            error_log("SMS sending failed: " . $e->getMessage());
            return false;
        }
    }
?>
