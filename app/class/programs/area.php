<?php

class Area_Math extends Base_Math {

    public function calculate($nums) {
        $this->answer = $nums['height'] * $nums['width'];
    }

    public function set_example() {
        $this->example = 'If the height of a rectangle is 2 inches, and the width
                          is 4 inches, what is the area?';
    }

    protected function set_fields() {
        $this->form_fields = array('height' => 'height', 'width' => 'width');
    }

}

?>