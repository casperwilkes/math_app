<?php

/**
 * This class controlls all of the I/O functionality of the application.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
class Main_Controller {

    /**
     * Sets the model controller. 
     * @var \Model_Controller
     */
    private $model;

    /**
     * Sets the viewing template.
     * @var \View_Controller
     */
    private $view;

    /**
     * Load the model factory and the 
     * Templating system. 
     */
    public function __construct() {
        $this->model = new Model_Controller();
        $this->view = new View_Controller();
    }

    /**
     * Loads all of the output, and accepts all of the input from the index.php file.
     * @param \Router $route
     */
    public function load(\Router $route) {
        $page = $route->page();
        $request = $route->request();
        // If model exists and can be loaded //
        if ($this->model->load_model($page)) {
            $this->view->set_title_page($this->model->get_viewable_name());
            $this->view->assign('form_action', $route->form_action());
            $this->view->assign('fields', $this->model->get_fields());
            $this->view->assign('example', $this->model->get_example());

            /**
             * If the class called was the list of primes, go ahead and preset
             * the variables.
             */
            if ($page == 'listofprimes') {
                $this->model->get_calculation();
                $this->view->assign('answer', $this->model->get_answer());
            }

            /**
             * Everythingn has been set, go ahead and calculate the submission. 
             */
            if (isset($request['post']['submit'])) {
                $this->model->get_calculation($request['post']);
                $this->view->assign('answer', $this->model->get_answer());
            }
        } else {
            // Set page to default because non existing class was called.
            $page = 'default';
        }

        // Render the page //
        $this->view->load_view($page);
    }

}

?>
