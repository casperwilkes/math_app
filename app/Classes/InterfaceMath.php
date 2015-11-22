<?php

namespace MathApp\Classes;

/**
 * This interface is used to ensure that all programs are uniform in nature
 * All public functions should go here.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
interface InterfaceMath {

    /**
     * Calculates the input and sets the answer.
     * @param int $nums The input from the user.
     */
    public function calculate($nums);
}
