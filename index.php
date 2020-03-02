<?php

    /**
     * Author: Evgenii Mishkin
     * Date: 02/09/2020
     * URL: http://emishkin.greenriverdev.com/328/dating/index.php
     * Description: Registration system for a brand new online dating website.
     */

    // Turn on error reporting - this is critical!
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Require the autoload file
    require_once('vendor/autoload.php');
    require_once('model/validate.php');

    //Start session
    session_start();

    //Create an instance of the base class
    $f3 = Base::instance();

    //Turn on Fat-Free error reporting
    $f3->set('DEBUG', 3);

    //Define arrays
    $f3->set('states', array('AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA',
                                'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH',
                                'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX',
                                'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY'));
    $f3->set('interests', array('tv', 'puzzles', 'movies', 'reading', 'cooking', 'playing cards', 'board games',
                                 'video games'));
    $f3->set('interestsOut', array('hiking', 'walking', 'biking', 'climbing', 'swimming', 'collecting'));

    $db = new Database();
    $controller = new Controller($f3);

    //Define a default route
    $f3->route('GET /', function (){
        $GLOBALS['controller']->home();
    });

    //Define an info route
    $f3->route('GET|POST /info', function ($f3){
        $GLOBALS['controller']->info($f3);
    });

    //Define a profile route
    $f3->route('GET|POST /profile', function ($f3){
        $GLOBALS['controller']->profile($f3);
    });

    //Define an interests route
    $f3->route('GET|POST /interests', function ($f3){
        $GLOBALS['controller']->interests($f3);
    });

    //Define an summary route
    $f3->route('GET|POST /summary', function (){
        $GLOBALS['controller']->summary();
    });

    //Define an admin route
    $f3->route('GET /admin', function (){
        $GLOBALS['controller']->admin();
    });

    //Run fat free
    $f3->run();