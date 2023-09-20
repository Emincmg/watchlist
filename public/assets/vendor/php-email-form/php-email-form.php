<?php

class PHP_Email_Form
{
    public $ajax = false;
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp = array();

    protected $message = array();

    public function add_message($content, $name)
    {
        $this->message[] = array($content, $name);
    }

    public function send()
    {
        $headers = 'From: ' . $this->from_name . ' <' . $this->from_email . '>' . PHP_EOL;
        $headers .= 'Reply-To: ' . $this->from_email . PHP_EOL;
        $headers .= 'MIME-Version: 1.0' . PHP_EOL;
        $headers .= 'Content-Type: text/html; charset=UTF-8' . PHP_EOL;

        $message = '<html><body>';
        foreach ($this->message as $m) {
            $message .= '<p><strong>' . $m[1] . ':</strong> ' . $m[0] . '</p>';
        }
        $message .= '</body></html>';

        if ($this->ajax) {
            $response_array = array('status' => 'success');
            header('Content-type: application/json');
            echo json_encode($response_array);
            die();
        } else {
            return mail($this->to, $this->subject, $message, $headers);
        }
    }
}

