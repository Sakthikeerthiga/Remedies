<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'user';
        parent::__construct();
        $this->load->database();
    }

    public function send_mail($from,$to,$subject,$message,$cc='')
    {
        $config = array(
		'protocol' => 'smtp',
		'smtp_host' => 'mail.best-remedies.com',
		'smtp_port' => 587,
		'smtp_user' => 'info@best-remedies.com',
		'smtp_pass' => 'rEn%b=]s4YjA',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html"); 
		
		$this->email->from($from);
        $this->email->to($to); 
        $this->email->subject($subject);
        $this->email->message($message);  
        $this->email->send();      
        return$this->email->print_debugger(); 
    }

}