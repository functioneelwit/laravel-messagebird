<?php

namespace FunctioneelWit\LaravelMessageBird;

class MessageBird
{
    protected $apiKey;
    protected $fromName;

    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        if(! env('MESSAGE_BIRD_API_KEY'))
        {
            abort(501, 'Please set MESSAGE_BIRD_API_KEY in your .env file.');
        }

        // constructor body
        $this->apiKey = env('MESSAGE_BIRD_API_KEY');
        $this->fromName = env('MESSAGE_BIRD_FROM_NAME', config('app.name'));
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
        $MessageBird = new \MessageBird\Client($this->apiKey);

        $Message = new \MessageBird\Objects\Message();
        $Message->originator = $this->fromName;
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
    public function getBalance()
    {
        $MessageBird = new \MessageBird\Client($this->apiKey);

        return $MessageBird->balance->read();
    }
}
