<?php

class Minify extends CI_Controller
{
    public function index()
    {


        echo "<br /><br><br><br><form method='post'>
    <textarea name='code'></textarea>
    <input type='submit'>
</form>";

        if($_POST) {
            $lines = explode("\n", $this->input->post('code'));
            $arr = $validation = "";
            foreach ($lines as $line) {
                $input = trim(explode(" ", $line)[0]);
                $arr .= "'" . $input . "' => \$this->input->post('" . $input . "'),\n";
                $validation .= "\$this->form_validation->set_rules('$input', lang($input), \"trim|required\");\n";
            }
            echo "DB <textarea width='100%'>[\n";
            echo $arr;
            echo "]</textarea>";

            echo "Validation <textarea width='100%'>\n";
            echo $validation;
            echo "</textarea>";




        }

    }
}