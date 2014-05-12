<?php

class PartPercentWholeWhole_Math extends Base_Math {

    protected $view_name = 'Part/Percent/Whole - Whole';

    public function calculate($nums) {
        $whole = $nums['part'] / $this->percent($nums['percent']);
        $this->answer = 'Whole = ' . $whole;
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
            'percent' => 'Percent Amount %',
            'part' => 'Part Amount'
        );
    }

}

?>
