<?php

/**
 * This class is used for routing all request and post data to the rest of the
 * application.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
class Router {

    /**
     * Page being requested.
     * @var string
     */
    private $page;

    /**
     * Array of variables used throughout the application.
     * @var array
     */
    private $get_vars = array();

    /**
     * Used for setting the action for forms.
     * @var string
     */
    private $form_action;

    /**
     * Set all class properties.
     */
    public function __construct() {
        $this->seperate_request();
    }

    /**
     * Gets the page requested.
     * @return string
     */
    public function page() {
        return $this->page;
    }

    /**
     * Get the variables used when submitting a form.
     * @return array
     */
    public function request() {
        return $this->get_vars;
    }

    /**
     * Gets the form Action field.
     * @return string
     */
    public function form_action() {
        return $this->form_action;
    }

    /**
     * Splits the incoming request and sets properties.
     */
    private function seperate_request() {
        // Sets the post variable for forms //
        $this->get_vars['post'] = (isset($_POST) && !empty($_POST)) ? $_POST : null;
        // Sets the action for form submission //
        $this->form_action = htmlspecialchars(basename($_SERVER['REQUEST_URI']));
        // The incoming page request //
        $request = htmlspecialchars($_SERVER['QUERY_STRING']);
        // If not set, set to default //
        $this->page = (strlen($request)) ? $request : 'default';
    }

}

?>