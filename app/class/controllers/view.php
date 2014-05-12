<?php

/**
 * This class assembles the viewing template used by the application.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
class View_Controller {

    /**
     * The path to the header file that will be used.
     * @var string
     */
    private $header;

    /**
     * The path to the footer file that will be used.
     * @var string
     */
    private $footer;

    /**
     * The path to the css file that will be used. 
     * @var string
     */
    private $css;

    /**
     * The data that will be passed from the model to the template as an associative array. 
     * @var array
     */
    private $data = array();

    /**
     * The title of the page being viewed. 
     * @var string
     */
    private $title = 'Math App';

    /**
     * The page being viewed. This property will be viewed in the template at the
     * top of the page. 
     * @var string
     */
    private $page = '';

    /**
     * Set the properties of the template. 
     */
    public function __construct() {
        $this->set_props();
    }

    /**
     * This loads the view that is displayed to the user.
     * @param string $view
     */
    public function load_view($view) {
        $template = '';

        if ($view == 'default') {
            $template = 'default';
        } else {
            $template = 'body';
        }

        include $this->header;
        include VIEWS_DIR . DS . "tpl.{$template}.php";
        include $this->footer;
    }

    /**
     * This sets the title and page strings that will be used in the template.
     * @param string $title
     */
    public function set_title_page($title) {
        if (strlen($title)) {
            $this->title .= ' | ' . trim(ucwords($title));
            $this->page = substr($this->title, 11);
        }
    }

    /**
     * Assigns keys and values to be used in the data array. 
     * @param string $key The key of the Associative array.
     * @param string $value The value associated to the key in the array. 
     */
    public function assign($key, $value) {
        $this->data[$key] = $value;
    }

    /**
     * Sets the properties for the class.
     */
    private function set_props() {
        $this->header = VIEWS_DIR . DS . 'tpl.header.php';
        $this->footer = VIEWS_DIR . DS . 'tpl.footer.php';
        $this->css = 'assets' . DS . 'styles' . DS . 'main_stylesheet.css';
    }

}

?>