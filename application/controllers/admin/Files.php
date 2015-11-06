<?php

class Files extends Brightery_Controller
{

    public $layout = 'full';
    public $module = 'files';
    public $model = 'Files_model';
    public $uploadedFiles;
    public $_uploadedFiles;
    public $_uploadedFileNames;
    private $_sorting = array(
        'serial' => 'files.serial',
        'consultant' => 'consultants.first_name',
        'certification' => 'certificates.name',
        'status' => 'status.name',
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission($this->module . '_index');
    }

    public function index()
    {
        $this->{$this->model}->custom_select = 'files.*, companies.business_name, branches.branch_name';
        if ($this->input->get('serial'))
            $this->{$this->model}->{'files.serial'} = $this->input->get('serial');

        $this->{$this->model}->joins = array(
            'companies' => array('companies.company_id = files.company_id', 'inner'),
            'branches' => array('branches.branch_id = files.branch_id', 'inner'),
        );
        $this->load->library('pagination');
        $this->{$this->model}->order_by['files.serial'] = 'ASC';
        $config['total_rows'] = $this->{$this->model}->get(TRUE);
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['base_url'] = site_url('admin/files/index');
        $config['per_page'] = config('pagination_limit');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        if ($this->uri->segment(4))
            $this->{$this->model}->offset = $this->uri->segment(4);

        $data['total'] = $config['total_rows'];
        $this->{$this->model}->limit = config('pagination_limit');
        $data['items'] = $this->{$this->model}->get();
        $this->load->view($this->module . '/index', $data);
    }

    public function new_index()
    {
        $this->load->library('pagination');


        if (!$sorting = $this->input->get('sorting'))
            $sorting = 'ASC';

        if (!$order_by = $this->input->get('order_by'))
            $order_by = 'serial';

        $data['order_by'] = $order_by;
        $data['sorting'] = $sorting;

        unset($_GET['order_by']);
        unset($_GET['sorting']);

        $data['get'] = http_build_query($_GET);
        $this->{$this->model}->order_by[$this->_sorting[$order_by]] = $sorting;

        if ($this->input->get('serial'))
            $this->{$this->model}->{'files.serial'} = $this->input->get('serial');
        else {
            if ($this->input->get('consultant'))
                $this->{$this->model}->{'files.consultant_id'} = $this->input->get('consultant');

            if ($this->input->get('certificate'))
                $this->{$this->model}->{'certificates.certificate_id'} = $this->input->get('certificate');

            if ($this->input->get('country'))
                $this->{$this->model}->{'branches.country_id'} = $this->input->get('country');

            if ($this->input->get('status'))
                $this->{$this->model}->{'files.status_id'} = $this->input->get('status');

        }

        $this->{$this->model}->custom_select = 'files.*, consultants.first_name as consultant, certificates.name as certificate, status.name as status, companies.business_name, branches.branch_name';

        $this->{$this->model}->joins = array(
            'consultants' => array('consultants.consultant_id = files.consultant_id', 'inner'),
            'certificates' => array('certificates.certificate_id = files.certificate_id', 'inner'),
            'status' => array('status.status_id = files.status_id', 'inner'),
            'companies' => array('companies.company_id = files.company_id', 'inner'),
            'branches' => array('branches.branch_id = files.branch_id', 'inner'),
        );

        $config['total_rows'] = $this->{$this->model}->get(TRUE);
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['base_url'] = site_url('admin/files/new_index');
        $config['per_page'] = config('pagination_limit');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total'] = $config['total_rows'];

        if ($this->uri->segment(4))
            $this->{$this->model}->offset = $this->uri->segment(4);

        $this->{$this->model}->limit = config('pagination_limit');
        $data['items'] = $this->{$this->model}->get();
        $this->load->view($this->module . '/new_index', $data);
    }

    public function manage($id = null)
    {
        $data = array();
        $data['files'] = array();
        $data['selected_crops'] = array();
        if ($id) {
            $this->{$this->model}->{$this->_primary_key} = $id;
            $data['item'] = $this->{$this->model}->get();
            if (!$data['item'])
                show_404();
            $this->permission($this->module . '_edit');
            $op = 'edit';
            $data['files'] = $this->db->where('file_id', $id)->get('file_documents')->result();
        } else {
            $data['item'] = new Std();
            $data['item']->status_id = 1;
            $data['item']->payment = 'yes';
            $this->permission($this->module . '_add');
            $op = 'add';
        }

        foreach ($this->db->where('file_id', $id)->get('file_categories')->result() as $st)
            $data['selected_categories'][] = $st->category_id;

        foreach ($this->db->where('file_id', $id)->get('file_crops')->result() as $st)
            $data['selected_crops'][] = $st->crop_id;

        $this->load->library("form_validation");
        if ($op == 'add') {
            $this->form_validation->set_rules('number', 'Number', 'trim|required|is_unique[files.number]');
        } else {
            $this->form_validation->set_rules('number', 'Number', 'trim|required');
        }
        $this->form_validation->set_rules('service_provider_id', 'service provider', 'trim|required');
        $this->form_validation->set_rules('company_id', 'Company', 'trim|required');
        $this->form_validation->set_rules('branch_id', 'Facility', 'trim|required');
        $this->form_validation->set_rules('certificate_id', 'Certificate', 'trim|required');
        $this->form_validation->set_rules('grade_id', 'Grade', 'trim|required');
        $this->form_validation->set_rules('option_id', 'Option', 'trim|required');
//        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
//        $this->form_validation->set_rules('crop_id', 'Crop', 'trim|required');
        $this->form_validation->set_rules('brc_site_code', 'Brc Site Code', 'trim|required');
//        $this->form_validation->set_rules('reg_id', 'reg', 'trim|required');
        $this->form_validation->set_rules('consultant_id', 'consultant', 'trim|required');
        $this->form_validation->set_rules('issue_date', 'Issue Date', 'trim|required');
        $this->form_validation->set_rules('re_evaluation', 'Re-evaluation Date', 'trim|required|callback_issuedate');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|callback_issuedate');
        $this->form_validation->set_rules('status_id', 'Status', 'trim|required');
        $this->form_validation->set_rules('payment', 'Payment', 'trim|required');
        $this->form_validation->set_rules('documents', 'Documents', "trim|callback_upload_file[$id]");

        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module . '/manage', $data);

        else {
            $this->{$this->model}->number = $this->input->post('number');
            $this->{$this->model}->me_number = $this->input->post('me_number');
            $this->{$this->model}->service_provider_id = $this->input->post('service_provider_id');
            $this->{$this->model}->company_id = $this->input->post('company_id');
            $this->{$this->model}->branch_id = $this->input->post('branch_id');
            $this->{$this->model}->certificate_id = $this->input->post('certificate_id');
            $this->{$this->model}->grade_id = $this->input->post('grade_id');
            $this->{$this->model}->option_id = $this->input->post('option_id');
//            $this->{$this->model}->category_id = $this->input->post('category_id');
//            $this->{$this->model}->crop_id = $this->input->post('crop_id');
            $this->{$this->model}->brc_site_code = $this->input->post('brc_site_code');
//            $this->{$this->model}->reg_id = $this->input->post('reg_id');
            $this->{$this->model}->consultant_id = $this->input->post('consultant_id');
            $this->{$this->model}->issue_date = $this->input->post('issue_date');
            $this->{$this->model}->re_evaluation = $this->input->post('re_evaluation');
            $this->{$this->model}->expire_date = $this->input->post('expire_date');
            $this->{$this->model}->status_id = $this->input->post('status_id');
            $this->{$this->model}->payment = $this->input->post('payment');

            $file_id = $this->{$this->model}->save();

            $this->db->where('file_id', $file_id)->delete('file_categories');
            if ($this->input->post('category_id'))
                foreach ($this->input->post('category_id') as $cat) {
                    $this->db->insert('file_categories', array(
                        'file_id' => $file_id,
                        'category_id' => $cat
                    ));
                }

            $this->db->where('file_id', $file_id)->delete('file_crops');
            if ($this->input->post('crop_id'))
                foreach ($this->input->post('crop_id') as $cat) {
                    $this->db->insert('file_crops', array(
                        'file_id' => $file_id,
                        'crop_id' => $cat
                    ));
                }
//            $this->uploadedFiles = $this->input->post('file_name');
            $this->db->where('file_id', $file_id)->delete('file_documents');
            $exists = $this->input->post('file_name');
            if ($this->input->post('file_comment'))
                foreach ($this->input->post('file_comment') as $key => $comment) {
                    if ((isset($this->_uploadedFileNames[$key]) && $this->_uploadedFileNames[$key]) || (isset($exists[$key]) && $exists[$key]))
                        $this->db->insert('file_documents', array(
                            'file_id' => $file_id,
                            'document' => isset($this->_uploadedFileNames[$key]) && $this->_uploadedFileNames[$key] ? $this->_uploadedFileNames[$key] : $exists[$key],
                            'comment' => $comment
                        ));
                }
            if (!$id)
                $this->generate_code($file_id);
            redirect('admin/' . $this->module);
        }
    }

    public function delete($id = null)
    {
        $this->permission($this->module . '_delete');
        if (!$id)
            show_404();
        $this->{$this->model}->{$this->_primary_key} = $id;
        $data['item'] = $this->{$this->model}->get();
        if (!$data['item'])
            show_404();
        $this->{$this->model}->delete();
        redirect('admin/' . $this->module);
    }

    public function get_branches($id = null)
    {
        $this->layout = 'ajax';
        $company_id = $this->input->post('company_id');
        $this->db->order_by('branch_name', 'ASC');
        foreach ($this->db->where('company_id', $company_id)->get('branches')->result() as $branch) {
            if ($branch->branch_id == $id)
                echo '<option value="' . $branch->branch_id . '" selected="selected">' . $branch->branch_name . '</option>';
            else
                echo '<option value="' . $branch->branch_id . '">' . $branch->branch_name . '</option>';
        }
    }

    public function get_categories($id = null, $file_id = null)
    {
        $this->layout = 'ajax';
        $arr = array();

        if (json_decode($this->input->post('arr')))
            $arr = json_decode($this->input->post('arr'));
        else
            if ($file_id)
                $arr = dd2menu('file_categories', array('file_category_id' => 'category_id'), array('file_id' => $file_id), TRUE);

        foreach ($this->db->where('certificate_categories.certificate_id', $id)->join('certificate_categories', 'certificate_categories.category_id = categories.category_id')->get('categories')->result() as $item) {
            if (in_array($item->category_id, $arr))
                echo '<input type="checkbox" name="category_id[]" value="' . $item->category_id . '" class="cats" checked="checked"> ' . $item->name . '<br />';
            else
                echo '<input type="checkbox" name="category_id[]" value="' . $item->category_id . '" class="cats"> ' . $item->name . '<br />';
        }
    }

    public function get_crops($id = null, $file_id = null)
    {
        $this->layout = 'ajax';
        $arr = array();

        if (json_decode($this->input->post('arr')))
            $arr = json_decode($this->input->post('arr'));
        else
            if ($file_id)
                $arr = dd2menu('file_crops', array('file_crop_id' => 'crop_id'), array('file_id' => $file_id), TRUE);
        $this->db->order_by('crops.name');
        foreach ($this->db->where('certificate_crops.certificate_id', $id)
                     ->join('certificate_crops', 'certificate_crops.crop_id = crops.crop_id')
                     ->get('crops')
                     ->result() as $item) {
            if (in_array($item->crop_id, $arr))
                echo '<input type="checkbox" name="crop_id[]" value="' . $item->crop_id . '" class="_crops" checked="checked"> ' . $item->name . '<br />';
            else
                echo '<input type="checkbox" name="crop_id[]" value="' . $item->crop_id . '" class="_crops"> ' . $item->name . '<br />';
        }
    }

    public function get_option($id = null, $option_id = null)
    {
        $this->layout = 'ajax';
        $this->db->order_by('options.name');
        foreach ($this->db->where('certificate_options.certificate_id', $id)->join('certificate_options', 'certificate_options.option_id = options.option_id')->get('options')->result() as $item) {
            if ($item->option_id == $option_id)
                echo '<option value="' . $item->option_id . '" selected="selected">' . $item->name . '</option>';
            else
                echo '<option value="' . $item->option_id . '">' . $item->name . '</option>';
        }
    }

    public function get_grades($id = null, $grade_id = null)
    {
        $this->layout = 'ajax';
        $this->db->order_by('grades.name');
        foreach ($this->db->where('certificate_grades.certificate_id', $id)->join('certificate_grades', 'certificate_grades.grade_id = grades.grade_id')->get('grades')->result() as $item) {
            if ($item->grade_id == $grade_id)
                echo '<option value="' . $item->grade_id . '" selected="selected">' . $item->name . '</option>';
            else
                echo '<option value="' . $item->grade_id . '" selected="selected">' . $item->name . '</option>';
        }
    }

    public function generate_code($id)
    {
        $file = $this->db->where('file_id', $id)->get('files')->row();
//        $branch = $this->db->where('branch_id', $file->branch_id)->get('branches')->row();
//        $country = $this->db->where('country_id', $branch->country_id)->get('countries')->row();
//        $certificate = $this->db->where('certificate_id', $file->certificate_id)->get('certificates')->row();
//        $var = '-' . $certificate->short_code . '-' . $country->code;
//        $serial = $this->db->order_by('serial', 'DESC')->like('serial', $var, 'left')->get('files')->row();
        $serial = $this->db->order_by('serial', 'DESC')->get('files')->row();
        if ($serial && $serial->file_id != $id) {
            $match = preg_match('/([0-9]+)/', $serial->serial, $matches);
            $_serial = $matches[1];
            $_serial++;
        } else
            $_serial = '101';

        $this->db->where('file_id', $id)->update('files', array(
            'serial' => ($_serial) // . $var
        ));
    }

    public function upload_file($var, $id)
    {
        if ($_FILES['documents']['name'])
            $this->upload_files($_FILES);
        return true;
    }

    public function issuedate($date)
    {
        if (strtotime($date) > strtotime($this->input->post('issue_date'))) {
            return true;
        } else {
            $this->form_validation->set_message('issuedate', "The field %s must be after Issue date");
            return false;
        }
    }

    private function upload_files($files)
    {
        $input_name = 'documents';
        $config = array(
            'upload_path' => './cdn/files/',
            'allowed_types' => '*',
        );

        $this->load->library('upload', $config);

        $this->_uploadedFiles = array();
        $this->_uploadedFileNames = array();

        for ($i = 0; $i < count($files[$input_name]['name']); $i++) {
            $_FILES[$input_name]['name'] = $files[$input_name]['name'][$i];
            $_FILES[$input_name]['type'] = $files[$input_name]['type'][$i];
            $_FILES[$input_name]['tmp_name'] = $files[$input_name]['tmp_name'][$i];
            $_FILES[$input_name]['error'] = $files[$input_name]['error'][$i];
            $_FILES[$input_name]['size'] = $files[$input_name]['size'][$i];

            $this->upload->initialize($config);

            if ($this->upload->do_upload($input_name)) {
                $data = $this->upload->data();
                $this->_uploadedFiles[] = $_FILES[$input_name]['name'];
                $this->_uploadedFileNames[] = $data['file_name'];
            } else {
                $this->_uploadedFiles[] = $_FILES[$input_name]['name'];
                $this->_uploadedFileNames[] = null;
            }
        }

        return $this->_uploadedFiles;
    }

    public function ajax_filter_status()
    {
        $this->layout = 'ajax';
        $content = "<option value=''>Select ...</option>";;
        $this->db->select('status.status_id, status.name');
        $this->db->group_by('status.status_id');
        $q = $this->query();

        if ($statss = $q->result())
            foreach ($statss as $qu)
                $content .= "<option value='$qu->status_id'>$qu->name</option>";

        echo $content;

    }

    public function ajax_filter_certificate()
    {
        $this->layout = 'ajax';
        $content = "<option value=''>Select ...</option>";;
        $this->db->select('certificates.certificate_id, certificates.name');
        $this->db->group_by('certificates.certificate_id');
        $q = $this->query();

        if ($statss = $q->result())
            foreach ($statss as $qu)
                $content .= "<option value='$qu->certificate_id'>$qu->name</option>";

        echo $content;

    }

    public function ajax_filter_country()
    {
        $this->layout = 'ajax';
        $content = "<option value=''>Select ...</option>";;
        $this->db->select('countries.country_id, countries.name');
        $this->db->group_by('countries.country_id');
        $q2 = $this->query();
        if ($couns = $q2->result())
            foreach ($couns as $qu)
                $content .= "<option value='$qu->country_id'>$qu->name</option>";

        echo $content;

    }

    function query()
    {

        if ($this->input->get('consultant')) {
            $this->db->where('files.consultant_id', $this->input->get('consultant'));

        }
        if ($this->input->get('country')) {
            $this->db->where('countries.country_id', $this->input->get('country'));
        }

        if ($this->input->get('status')) {
            $this->db->where('files.status_id', $this->input->get('status'));
        }

        $this->db->join('consultants', 'consultants.consultant_id = files.consultant_id');
        $this->db->join('certificates', 'certificates.certificate_id = files.certificate_id');
        $this->db->join('status', 'status.status_id = files.status_id');
        $this->db->join('branches', 'branches.branch_id = files.branch_id');
        $this->db->join('countries', 'countries.country_id = branches.country_id');
        return $q = $this->db->get('files');

    }

    function serial_autocomplete()
    {
        $this->layout = 'ajax';
        $serials = array();
        foreach ($this->db->like('serial', $this->input->get('term'), 'both')->get('files')->result() as $serial) {
            $serials[] = array('id' => $serial->serial,
                'label' => $serial->serial,
                'value' => $serial->serial);
        }
        echo json_encode($serials);
    }

    function get_company_details($id)
    {
        $this->layout = 'ajax';
        $item = $this->db->where('company_id', $id)->get('companies')->row();
        echo $item->business_name . "<br />";
        echo $item->address . ", " . $item->city . "," . $item->state . "<br />";
//        echo "City: " . $item->city . "<br />";
//        echo "State: " . $item->state . "<br />";
        echo "Phone: " . $item->phone . "<br />";
        echo "Email: <a href='mailto:" . $item->email . "'>" . $item->email . "</a><br />";
        echo "Website: <a href='http://" . $item->website . "'>" . $item->website . "</a><br />";
    }

    function get_facility_details($id)
    {
        $this->layout = 'ajax';
        $item = $this->db->where('branch_id', $id)->get('branches')->row();
        echo $item->branch_name . "<br />";
        echo $item->address . ", " . $item->city . "," . $item->state . "<br />";
        echo "Phone: " . $item->phone . "<br />";
        echo "Email: <a href='mailto:" . $item->email . "'>" . $item->email . "</a><br />";
    }

    function get_consultant_details($id)
    {
        $this->layout = 'ajax';
        $item = $this->db->where('consultant_id', $id)->get('consultants')->row();
        echo "Name: " . $item->first_name . "<br />";
        echo "Cell Phone: " . $item->cell_phone . "<br />";
        echo "Phone: " . $item->phone . "<br />";
    }
}
