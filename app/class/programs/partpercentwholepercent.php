<?php

class PartPercentWholePercent_Math extends Base_Math {

    protected $view_name = 'Part/Percent/Whole - Percent';

    public function calculate($nums) {
        $percent = ($nums['part'] / $nums['whole']) * 100;
        $this->answer = 'Percent = ' . $percent . '%';
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
            'whole' => 'Whole amount',
            'part' => 'Part Amount'
        );
    }

}

?>
