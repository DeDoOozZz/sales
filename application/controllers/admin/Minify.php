<?php

class Minify extends CI_Controller
{
    public function index()
    {
        define('database', $this->db->database);
        $tables = $this->db->query("SHOW TABLES")->result();
        foreach ($tables as $table) {
            $table = $table->{'Tables_in_' . database};
            echo "<a href='" . site_url('admin/minify/generate/' . $table) . "'>" . $table . "</a><br />";
        }
    }

    public function generate($table)
    {

        $fields = $this->db->query("SHOW COLUMNS FROM " . $table)->result();
//        print_r($fields);
        foreach ($fields as $field) {
            $lines[] = $field->Field;
            if($field->Key == 'PRI')
            $pk = $field->Field;
        }

        $arr = $view_inputs = $validation = $language = "";
        $language .= "\$lang['menu_" . $table . "'] = \"" . $this->beautify($table) . "\";\n";
        foreach ($lines as $line) {
            $input = trim(explode(" ", $line)[0]);
            $arr .= "'" . $input . "' => \$this->input->post('" . $input . "'),\n";
            $validation .= "\$this->form_validation->set_rules('$input', lang('" . $table . "_$input'), \"trim|required\");\n";
            $language .= "\$lang['" . $table . "_" . $input . "'] = \"" . $this->beautify($input) . "\";\n";
            $view_inputs .= "
                    <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"$input\">{{ lang('{$table}_{$input}') }}</label>

                    <div class=\"col-sm-10\">
                        {{ form_input('$input', set_value('$input', item.$input), 'class=\"form-control\" id=\"$input\"') }}
                    </div>
                </div>
                <div class=\"form-group-separator\"></div>
                \n";
        }

$title = ucfirst($table);

$controller = <<<EEE
<?php

class $title extends Crud
{
    public \$_table = '$table';
    public \$_primary_key = '$pk';
    public \$_index_fields = [
        'name',
    ];

    public function __construct()
    {
        parent::__construct();
        \$this->_index_fields[] = name();
    }

    public function indexFixes()
    {
        \$this->{\$this->model}->custom_select = '*';
//        \$this->{\$this->model}->joins = array(
//            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
//        );
        \$this->{\$this->model}->order_by[name()] = 'ASC';

    }

    protected function onValidationEvent(\$op, \$id = false)
    {
        \$this->data['invoice_types'] = dd2menu('invoice_types', ['invoice_type_id' => name()]);

        \$config['upload_path'] = './cdn/' . \$this->_table;
        \$config['allowed_types'] = 'gif|jpg|png|jpeg';
        \$this->load->library('upload', \$config);
        \$required = (\$op == 'add') ? '1' : '1';

        $validation
        \$this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . \$required ."]");

    }
    protected function onSuccessEvent(\$op, \$id = false)
    {
        \$vars = [
            $arr
        ];
        if(\$op == 'add')
            \$vars['created_at'] = now();

        foreach (\$vars as \$vark => \$varv)
            \$this->{\$this->model}->{\$vark} = \$varv;
        \$this->{\$this->model}->save();

    }
}

EEE;

$views = <<<RRR
{% extends _layout %}
{% block content %}

    <div class="page-title">
        <div class="title-env">
            <h1 class="title">{{ lang('menu_' ~ that._table) }}</h1>
            <p class="description"></p>
        </div>
        <div class="breadcrumb-env"></div>
    </div>

    <!-- Admin Table-->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ lang('menu_' ~ that._table) }}</h3>
        </div>
        <div class="panel-body">
            {% if (validation_errors()) %}
            <div class="alert alert-danger">
                {{ validation_errors() }}
            </div>
            {% endif %}
            <form role="form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                $view_inputs
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-secondary " name="submit" value="{{ lang('global_submit') }}">
                        <a href="{{ admin_url(that._table ~ '/index') }} "
                           class="btn btn-danger">{{ lang('global_cancel') }}</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
{% endblock %}
RRR;

        echo "Controller<br /> <textarea style=\"width:100%; height: 300px;\">\n";
        echo $controller;
        echo "</textarea><br />";

        $file = fopen('application/controllers/admin/'.$title.'.php', "w+");
        fwrite($file, $controller);
        fclose($file);


        $file = fopen('styles/admin/default/'.$table.'.twig', "w+");
        fwrite($file, $views);
        fclose($file);


        $file = fopen('application/language/english/admin_lang.php', "a+");
        fwrite($file, $language);
        fclose($file);



//        echo "Validation<br /> <textarea width='100%'>\n";
//        echo $validation;
//        echo "</textarea><br />";

        echo "Language<br /> <textarea style=\"width:100%; height: 300px;\">\n";
        echo $language;
        echo "</textarea><br />";


        echo "view inputs<br /> <textarea style=\"width:100%; height: 300px;\">\n";
        echo $view_inputs;
        echo "</textarea><br />";




    }

    function beautify($str)
    {
        return str_replace('_', ' ', ucfirst($str));
    }
}