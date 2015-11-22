<?php

namespace MathApp\Programs;

use MathApp\Classes;

class PartPercentWholePercent extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Part/Percent/Whole - Percent';

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $percent = ($nums['part'] / $nums['whole']) * 100;
            $this->answer = 'Percent = ' . $percent . '%';
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
            'whole' => 'Whole amount',
            'part' => 'Part Amount'
        );
    }

}
