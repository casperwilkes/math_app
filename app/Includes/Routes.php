<?php

/**
 * This is where all of the applications routes live.
 * All routes should be placed within this file.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */

// 404 path //
$app->notFound(function() use($app) {
    // Log incoming request //
    $app->log->error(' 404 ' . $_SERVER['REQUEST_URI']);
    
    // Display 404 page //
    $app->render('404.twig', array('title' => 'Oops Content Not Found'));
});

// Home //
$app->get('/:route', function() use($app) {
    $programs = array();
    $programs_list = APP_ROOT . DS . 'programs.xml';

    // Get all of the programs //
    $list = simplexml_load_file($programs_list);

    // Set all of the programs into an array //
    foreach ($list->program as $key) {
        $programs[(string) $key->name] = (string) $key->description;
    }

    // Sort the programs by name //
    ksort($programs, SORT_STRING);

    $data = array(
        'title' => 'Home',
        'programs' => $programs
    );

    // Output the programs //
    $app->render('home.twig', $data);
})->conditions(array('route' => '(|home)'))->name('home');

// programs //
$app->map('/program/:name', function($name = null) use($app) {
    // Make sure program name has been added to the url and make sure tha the program exists in the program directory //
    if (!is_null($name) and file_exists(PROGRAMS_DIR . DS . $name . '.php')) {
        $data = array();

        // Instantiate the called program 
        $program = new \MathApp\Classes\ProgramRouter($name);

        // Setup all of the template information //
        $data['title'] = $program->getViewableName();
        $data['example'] = $program->getExample();
        $data['form_action'] = $app->request->getUrl() . $app->request->getPath();
        $data['fields'] = $program->getFields();

        // When the form has been submitted //
        if ($app->request->isPost()) {
            // Pass the form inputs //
            $inc = $app->request()->post();
            $program->getCalculation($inc);

            // Pass the answer to the template //
            $data['answer'] = $program->getAnswer();
        }

        // Output the data //
        $app->render('main.twig', $data);
    } else {
        // Either name wasn't passed, or file wasn't found //
        $app->notFound();
    }
})->via('GET', 'POST');
