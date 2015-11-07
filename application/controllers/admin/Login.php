<?php

class Login extends CI_Controller {

    public function index() {
        $this->lang->load('users');
        $this->layout = 'ajax';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'lang:users_email', 'required|callback_check');
        $this->form_validation->set_rules('password', 'lang:users_password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index');
        } else {
            $user = $this->db->where('email', $this->input->post('email'))->where('password', md5($this->input->post('password')))->get('users')->row();
            $this->session->set_userdata(array(
                'email' => $user->email,
                'image' => $user->image,
                'user_id' => $user->user_id,
                'usergroup_id' => $user->usergroup_id,
                'name' => $user->name,
                'username' => $user->username
            ));
            redirect('admin/dashboard');
        }
    }

    public function forget_password() {
        $this->lang->load('users');
        $this->layout = 'ajax';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'lang:users_email', 'required|callback_check_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/forget_password');
        } else {
            $data['pass'] = $this->generate_password();
            $data['user'] = $this->db->where('email', $this->input->post('email'))->get('users')->row();

            $this->db->where('email', $this->input->post('email'))
                             ->update('users', array(
                                 'password' => md5($data['pass'])
                             ));

            $message = $this->load->view('login/reset_password_email', $data, TRUE);

require './mailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->SMTPAuth = true;
//$mail->Host = "smtp.sparkpostmail.com";
//$mail->Username = "SMTP_Injection";
//$mail->Password = "6ad95f20f267fded8377b093f0e1c865fb3dd3c5";

            $mail->Host = "mail.acerta-me.com";
            $mail->Username = "database@acerta-me.com";
            $mail->Password = "Egypt123$";
            $mail->Port = 25;

$mail->Port = 587;
$mail->setFrom("info@acerta-me.com" , 'ACERTA');
$mail->addAddress($data['user']->email);
$mail->Subject = 'Acerta password resetting';
$mail->msgHTML($message);
//$mail->addReplyTo('info@acerta-me.com');
if ($mail->send()) {
//    echo "Message sent!";
}
else
{
//    echo "Error";
}



//            echo $message;
//            $this->load->library('email');
////            $this->email->initialize($config);
//            $this->email->from('info@acerta-me.com', 'Acerta');
//            $this->email->to($data['user']->email);
//            $this->email->subject('Acerta password resetting');
//            $this->email->message($message);
//            $this->email->send();
            redirect('admin/login');
        }
    }

    public function check() {
        $user = $this->db->where('email', $this->input->post('email'))->where('password', md5($this->input->post('password')))->get('users')->row();
//        if (!$user) {
//            $this->form_validation->set_message('check', lang('users_invalid_email_or_password'));
//            return FALSE;
//        }
//        else
            return TRUE;
    }
    public function check_email() {
        $user = $this->db->where('email', $this->input->post('email'))->get('users')->row();
//        if (!$user) {
//            $this->form_validation->set_message('check_email', "This email dosn't exists on the system");
//            return FALSE;
//        }
//        else
            return TRUE;
    }
    private function generate_password() {
        return substr(md5(time()), 0, 6);
    }

}