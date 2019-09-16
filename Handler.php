<?php

namespace Seekgeeks\AWSAlarm;


class Handler
{
    

    /**
     * 
     * Type of notification sent via AWS SNS
     * 
     *  */
    public $request_type  =   "";


    /**
     * 
     * Filter your SES notification based on for what server it has been sent from
     * 
     *  */
    public $server_name   =    'example.com';

    /**
     * 
     * Payload which would be sent by AWS SNS
     * 
     *  */
    public $payload         =   '';



    /**
     * ### process_bounce_email
     * Function will get payload from aws alarm if the notification type is "Bounce"
     * it will check if email already exists in database, if so, will skip else will add to database
     * 
     * @param object $payload
     * 
     * @return bool
     * 
     *  */
    public function bounce_email()
    {
        //echo json_encode($payload);

        $payload    =   $this->$payload;
        //  If current server is staging, but response is not from staging server, ignore
        if($_SERVER['SERVER_NAME']==$this->server_name AND $payload->mail->sourceIp!=$this->staging_ip){
            
            return false;
        }


        $response->date     =   $payload->mail->commonHeaders->date;
        $response->subject  =   $payload->mail->commonHeaders->subject;
        $response->to       =   $payload->mail->destination[0];
        $response->from     =   $payload->mail->source;
        $response->message_id     =   $payload->mail->messageId;
        $response->recieved_at    =   time();
        
        
        return $response;
    }






}

