<?php

namespace MathApp\Programs;

use MathApp\Classes;

class PartPercentWholePart extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Part/Percent/Whole - Part';

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $percent = $nums['whole'] * $this->percent($nums['percent']);
            $this->answer = 'Part = ' . $percent . ' parts';
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = "
                    <table>
                        <tr>
                            <th>part</th>
                            <th>percent</th>
                        </tr>
                        <tr>
                            <td>whole</td>
                            <td>100</td>
                        </tr>
                    </table>";
    }

    protected function setFields() {
        $this->form_fields = array(
            'whole' => 'Whole Amount',
            'percent' => 'Percent amount %'
        );
    }

}
