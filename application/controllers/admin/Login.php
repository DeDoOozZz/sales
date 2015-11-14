<?php

class Login extends Brightery_Controller
{
    public $user;

    public function index()
    {
        $this->layout = 'ajax';
        if (session('email'))
            redirect(ADMIN . '/dashboard');

        $this->load->library('form_validation');
        $this->form_validation->set_message('check', lang('users_invalid_email_or_password'));
        $this->form_validation->set_rules('email', 'lang:users_email', 'required|callback_check');
        $this->form_validation->set_rules('password', 'lang:users_password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->twiggy->template('login/login')->display();
        } else {
            session('email', $this->user->email);
            session('password', md5($this->input->post('password')));
            redirect(ADMIN . '/dashboard');
        }
    }
    // TODO: FOEGET MY PASSWORD AND TESTING
    public function forget_password()
    {
        $this->layout = 'ajax';
        $this->load->library('form_validation');
        $this->form_validation->set_message('check', lang('users_invalid_login'));
        $this->form_validation->set_rules('email', 'lang:users_email', 'required|callback_check');
        if ($this->form_validation->run() == FALSE) {
            $this->twiggy->template('login/forget_password')->display();
        } else {

            $data['pass'] = $this->generate_password();
            $data['user'] = $this->user;

            $this->db->where('email', $this->input->post('email'))
                ->update('users', array(
                    'password' => md5($data['pass'])
                ));

            $message = $this->load->view('login/reset_password_email', $data, TRUE);

//require './mailer/PHPMailerAutoload.php';
//$mail = new PHPMailer;
//$mail->isSMTP();
//$mail->Debugoutput = 'html';
//$mail->SMTPAuth = true;
////$mail->Host = "smtp.sparkpostmail.com";
////$mail->Username = "SMTP_Injection";
////$mail->Password = "6ad95f20f267fded8377b093f0e1c865fb3dd3c5";
//
//            $mail->Host = "mail.acerta-me.com";
//            $mail->Username = "database@acerta-me.com";
//            $mail->Password = "Egypt123$";
//            $mail->Port = 25;
//
//$mail->Port = 587;
//$mail->setFrom("info@acerta-me.com" , 'ACERTA');
//$mail->addAddress($data['user']->email);
//$mail->Subject = 'Acerta password resetting';
//$mail->msgHTML($message);
////$mail->addReplyTo('info@acerta-me.com');
//if ($mail->send()) {
////    echo "Message sent!";
//}
//else
//{
////    echo "Error";
//}


//            echo $message;
            $this->load->library('email');
////            $this->email->initialize($config);
            $this->email->from(config('webmaster_email'), config('title'));
            $this->email->to($data['user']->email);
            $this->email->subject('Acerta password resetting');
            $this->email->message($message);
            $this->email->send();
            redirect(ADMIN. '/login');
        }
    }

    public function check()
    {
        $username = $this->input->post('email');
        if ($this->input->post('password'))
            $this->db->where('password', md5($this->input->post('password')));

        $this->user = $this->db
            ->where("(`username` = '$username' OR `email` = '$username')")
            ->get('users')
            ->row();

        if (!$this->user) {
            return FALSE;
        } else
            return TRUE;
    }

    private function generate_password()
    {
        return substr(md5(time()), 0, 6);
    }

}