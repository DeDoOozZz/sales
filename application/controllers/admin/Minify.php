<?php

class Minify extends CI_Controller
{
    public function index()
    {


        echo "<br /><br><br><br><form method='post'>
    <input name='table' />
    <textarea name='code'></textarea>
    <input type='submit'>
</form>";

        if($_POST) {
            $lines = explode("\n", $this->input->post('code'));
            $arr = $validation = $language = "";
            foreach ($lines as $line) {
                $input = trim(explode(" ", $line)[0]);
                $arr .= "'" . $input . "' => \$this->input->post('" . $input . "'),\n";
                $validation .= "\$this->form_validation->set_rules('$input', lang('".$this->input->post('table')."_$input'), \"trim|required\");\n";
                $language .= "\$lang['".$this->input->post('table')."_".$input."'] = \"".$this->beautify($input) . "\";\n";
            }
            echo "DB <textarea width='100%'>[\n";
            echo $arr;
            echo "]</textarea>";

            echo "Validation <textarea width='100%'>\n";
            echo $validation;
            echo "</textarea>";

            echo "Language <textarea width='100%'>\n";
            echo $language;
            echo "</textarea>";



        }

    }

    function beautify($str) {
        return str_replace('_', ' ', ucfirst($str));
    }
}