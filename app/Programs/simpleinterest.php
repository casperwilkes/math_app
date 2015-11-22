<?php

namespace MathApp\Programs;

use MathApp\Classes;

class SimpleInterest extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Simple Interest';
    private $interest;
    private $loan;

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $p = $nums['princ'];
            $r = $nums['rate'];
            $t = $nums['time'];

            $rate = $this->percent($r);
            $this->interest = $this->interest($p, $rate, $t);
            $this->loan = $p + $this->interest;

            $this->format_answer();
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = "
                    <table>
                        <tr>
                            <th>Principal</th>
                            <th>Rate of Interest</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td>$100</td>
                            <td>13%</td>
                            <td>1 year</td>
                        </tr>
                    </table>";
    }

    protected function setFields() {
        $this->form_fields = array(
            'princ' => 'Principal Amount $',
            'rate' => 'Percentage Rate %',
            'time' => 'Length'
        );
    }

    private function format_answer() {
        $this->answer = "Interest: $" . $this->interest . '<br />';
        $this->answer .= "Total amount: $" . $this->loan;
    }

}
