<?php

class Dashboard extends CI_Controller {
    public $layout = 'default';
    public $module = 'dashboard';

    public function index() {
    $data = [];
//        $data['files'] = $this->db->query("SELECT COUNT(*) AS count FROM files")->row()->count;
//        $data['active'] = $this->db->query("SELECT COUNT(*) AS count FROM files WHERE status_id = 1")->row()->count;
//        $data['hold'] = $this->db->query("SELECT COUNT(*) AS count FROM files WHERE status_id = 2")->row()->count;
//        $data['canceled'] = $this->db->query("SELECT COUNT(*) AS count FROM files WHERE status_id = 3")->row()->count;
//        $data['suspended'] = $this->db->query("SELECT COUNT(*) AS count FROM files WHERE status_id = 4")->row()->count;
//        $data['periods'] = array(
//            '1' => '30 days',
//            '2' => '60 days',
//            '3' => '90 days'
//        );
//        $this->load->view($this->module, $data);


        $this->twiggy->template('dashboard')->display();
    }

    public function get_status($status = 'reevaluation', $period = 1, $orderby = null) {

        $this->layout = 'ajax';
        $date = date('Y-m-d', time() + (60*60*24*($period*30)));


        if($status == 'reevaluation') {
            if($orderby == 'certificate')
                $this->db->order_by('certificates.name');
            else
                $this->db->order_by('files.re_evaluation');

            $q = $this->db->join('companies', 'companies.company_id = files.company_id')
                ->join('branches', 'branches.branch_id = files.branch_id')
                ->join('certificates', 'certificates.certificate_id = files.certificate_id')
                ->where('re_evaluation <=', $date)->get('files')->result();
        } else {
            if($orderby == 'certificate')
                $this->db->order_by('certificates.name');
            else
                $this->db->order_by('files.re_evaluation');

            $q = $this->db->join('companies', 'companies.company_id = files.company_id')
                ->join('branches', 'branches.branch_id = files.branch_id')
                ->join('certificates', 'certificates.certificate_id = files.certificate_id')
                ->where('expire_date <=', $date)
                ->get('files')->result();
        }

        $iii = 0;

        foreach($q as $i) {
            echo "<tr>";

            echo "<td>";
            echo ++$iii;
            echo "</td>";

            echo "<td>";
            echo $status == 'reevaluation' ? $i->re_evaluation : $i->expire_date;
            echo "</td>";

            echo "<td>";
            echo $i->me_number;
            echo "</td>";

            echo "<td>";
            echo $i->serial;
            echo "</td>";

            echo "<td>";
            echo $i->branch_name;
            echo "</td>";

            echo "<td>";
            echo $i->name;
            echo "</td>";

            echo "</tr>";
        }
    }
}