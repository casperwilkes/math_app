<?php

class GreatestCommonfactor_Math extends Base_Math {

    protected $view_name = 'Greatest Common Factor';
    private $ray1;
    private $ray2;
    private $ray3;
    private $mult1;
    private $mult2;
    private $mult3;

    public function calculate($nums) {
        $this->mult1 = $nums['num1'];
        $this->mult2 = $nums['num2'];
        $this->mult3 = $nums['num3'];

        $this->ray1 = $this->factor($this->mult1);
        $this->ray2 = $this->factor($this->mult2);
        $this->ray3 = $this->factor($this->mult3);

        if ($this->check_empty($nums) >= 2) {
            $this->answer = 'Sorry, you must enter at least 2 digits.';
        } else {
            $this->format_answer();
        }
    }

    protected function set_example() {
        $this->example = 'Find the greatest common factor of 33, 55 and 99.';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'num1' => 'Number 1',
            'num2' => 'Number 2',
            'num3' => 'Number 3');
    }

    private function format_answer() {

        if (!empty($this->ray3)) {
            $result = array_intersect($this->ray1, $this->ray2, $this->ray3);
            $first = array_shift($result);

            $div1 = $this->mult1 / $first;
            $div2 = $this->mult2 / $first;
            $div3 = $this->mult3 / $first;

            $format = " %d / %d = %d <br />";

            $this->answer = $first . '<br />';
            $this->answer .= '<br />';
            $this->answer .= 'Results:<br />';
            $this->answer .= sprintf($format, $this->mult1, $first, $div1);
            $this->answer .= sprintf($format, $this->mult2, $first, $div2);
            $this->answer .= sprintf($format, $this->mult3, $first, $div3);
        } else {
            $result = array_intersect($this->ray1, $this->ray2);
            $first = array_shift($result);

            $div1 = $this->mult1 / $first;
            $div2 = $this->mult2 / $first;

            $format = " %d / %d = %d <br />";

            $this->answer = $first . '<br />';
            $this->answer .= '<br />';
            $this->answer .= 'Results:<br />';
            $this->answer .= sprintf($format, $this->mult1, $first, $div1);
            $this->answer .= sprintf($format, $this->mult2, $first, $div2);
        }
    }

}

?>
