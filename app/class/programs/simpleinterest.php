<?php

class SimpleInterest_Math extends Base_Math {

    protected $view_name = 'Simple Interest';
    private $interest;
    private $loan;

    public function calculate($nums) {
        $p = $nums['princ'];
        $r = $nums['rate'];
        $t = $nums['time'];

        $rate = $this->percent($r);
        $this->interest = $this->interest($p, $rate, $t);
        $this->loan = $p + $this->interest;

        $this->format_answer();
    }

    protected function set_example() {
        $this->example = <<<EOT
                    <table border="1">
                        <tr>
                            <td>Principal</td>
                            <td>Rate of Interest</td>
                            <td>Time</td>
                        </tr>
                        <tr>
                            <td>$100</td>
                            <td>13%</td>
                            <td>1 year</td>
                        </tr>
                    </table>
EOT;
    }

    protected function set_fields() {
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

?>
