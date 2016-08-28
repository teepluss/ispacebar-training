<?php

namespace App\Support\SMS;

class Sender
{
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
     * Reciever number
     *
     * @param  integer $number [
     * @return object         [
     */
    public function to($number)
    {
        $this->to = $number;

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
        return "Message ".$this->message. " sent to ".$this->to;
    }
}