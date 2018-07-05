<?php

namespace FunctioneelWit\LaravelMessagebird;

class Messagebird
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
        $Messagebird = new \Messagebird\Client($this->apiKey);

        $Message = new \Messagebird\Objects\Message();
        $Message->originator = $this->fromName;
        $Message->recipients = $phoneNumber;
        $Message->body = $message;
        
        $Messagebird->messages->create($Message);
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
        $Messagebird = new \Messagebird\Client($this->apiKey);

        return $Messagebird->balance->read();
    }
}
