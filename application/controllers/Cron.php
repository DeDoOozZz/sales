<?php

class Cron extends Brightery_Controller
{
    public $layout = 'full';
    public $module = 'home';

    function __construct() {
        parent::__construct();
        require './mailer/PHPMailerAutoload.php';
//            $this->email->initialize($config);
    }
    public function index()
    {
        $date[] = date('Y-m-d', time() + (60 * 60 * 24 * 30));
        $date[] = date('Y-m-d', time() + (60 * 60 * 24 * 15));
        $date[] = date('Y-m-d', time() + (60 * 60 * 24 * 1));

        foreach($date as $day) {
            $data['table'] = $this->queryBuilder($day);

            if($data['table'])
            foreach($this->db->where('alert', '1')->get('users')->result() as $user) {
                $data['user'] = $user;
                echo $message = $this->load->view('cronjob_email', $data, TRUE);
                $this->sendEmail($user->email, $message);
            }
        }



    }
    function queryBuilder($date) {
        $q = $this->db->order_by('files.re_evaluation')
            ->join('companies', 'companies.company_id = files.company_id')
            ->join('branches', 'branches.branch_id = files.branch_id')
            ->where('re_evaluation', $date)
            ->or_where('expire_date', $date)
            ->get('files')->result();
        if( ! $q)
            return false;
        return $this->drawTables($q, $date);
    }
    function drawTables($q, $date)
    {
        $content = "<table width='100%'><tr>
                    <td style=\"color:red\">Certificate Serial number</td>
                    <td style=\"color:red\">Company</td>
                    <td style=\"color:red\">Re-evaluation/Expiring date</td>
                </tr>";
        foreach ($q as $i) {
            $content .=  "<tr>";
            $content .=  "<td>";
            $content .=  $i->serial;
            $content .=  "</td>";
            $content .=  "<td>";
            $content .=  $i->business_name;
            $content .=  "</td>";
            $content .=  "<td>";
            $content .=   strtotime($i->re_evaluation) == strtotime($date) ? $i->re_evaluation : $i->expire_date;
            $content .=  "</td>";
            $content .=  "</tr>";
        }
        $content .= "</table>";
        return $content;
    }

    public function sendEmail($email, $message) {

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Debugoutput = 'html';
        $mail->SMTPAuth = true;
//        $mail->Host = "smtp.sparkpostmail.com";
//        $mail->Username = "SMTP_Injection";
//        $mail->Password = "6ad95f20f267fded8377b093f0e1c865fb3dd3c5";
//        $mail->Port = 587;
        $mail->Host = "mail.acerta-me.com";
        $mail->Username = "database@acerta-me.com";
        $mail->Password = "Egypt123$";
        $mail->Port = 25;

        $mail->setFrom("info@acerta-me.com" , 'ACERTA');
        $mail->addAddress($email);
        $mail->Subject = 'Acerta Alert';
        $mail->msgHTML($message);
        $mail->send();
    }
}
