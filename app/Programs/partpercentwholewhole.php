<?php

namespace MathApp\Programs;

use MathApp\Classes;

class PartPercentWholeWhole extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Part/Percent/Whole - Whole';

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $whole = $nums['part'] / $this->percent($nums['percent']);
            $this->answer = 'Whole = ' . $whole;
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
            'percent' => 'Percent Amount %',
            'part' => 'Part Amount'
        );
    }

}
