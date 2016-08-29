<?php

namespace App\Support\SMS;

class Sender
{
    /**
     * SMS provider.
     *
     * @var object
     */
    protected $provider;

    /**
     * Mobile number to send SMS.
     *
     * @var integer
     */
    protected $to;

    /**
     * SMS message.
     *
     * @var string
     */
    protected $message;

    /**
     * Reguster provider.
     *
     * @param object $provider
     */
    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    /**
     * Reciever number
     *
     * @param  integer $number [
     * @return object         [
     */
    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Message to send.
     *
     * @param  string $message
     * @return object
     */
    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Send message.
     *
     * @return string
     */
    public function send()
    {
        return $this->provider->send($this->to, $this->message);
    }
}