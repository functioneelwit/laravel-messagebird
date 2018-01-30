<?php

namespace FunctioneelWit\LaravelMessageBird;

class MessageBird
{
    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        // constructor body
    }

    /**
     * Friendly welcome
     *
     * @param string $phrase Phrase to return
     *
     * @return string Returns the phrase passed in
     */
    public function sendSMS($phoneNumber, $message)
    {
        $MessageBird = new \MessageBird\Client(env('MESSAGE_BIRD_API_KEY', 'please_set_api_key'));

        $Message = new \MessageBird\Objects\Message();
        $Message->originator = env('MESSAGE_BIRD_FROM_NAME', config('app.name'));
        $Message->recipients = $phoneNumber;
        $Message->body = $message;
        
        $MessageBird->messages->create($Message);
    }

    /**
     * Friendly welcome
     *
     * @param string $phrase Phrase to return
     *
     * @return string Returns the phrase passed in
     */
    public function test()
    {
        return 'whoop!';
    }
}
