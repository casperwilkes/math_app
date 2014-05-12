<?php

class PartPercentWholePart_Math extends Base_Math {

    protected $view_name = 'Part/Percent/Whole - Part';

    public function calculate($nums) {
        $percent = $nums['whole'] * $this->percent($nums['percent']);
        $this->answer = 'Part = ' . $percent . ' parts';
    }

    protected function set_example() {
        $this->example = <<<EOT
            <table border="1">
                <tbody>
                    <tr>
                        <td>part</td>
                        <td>percent</td>
                    </tr>
                    <tr>
                        <td>whole</td>
                        <td>100</td>
                    </tr>
                </tbody>
            </table>
EOT;
    }

    protected function set_fields() {
        $this->form_fields = array(
            'whole' => 'Whole Amount',
            'percent' => 'Percent amount %'
        );
    }

}

?>