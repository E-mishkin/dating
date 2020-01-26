<?php

    /**
     * Author: Evgenii Mishkin
     * Date: 01/24/2020
     * URL: http://emishkin.greenriverdev.com/328/dating/index.php
     * Description: Registration system for a brand new online dating website.
     */

    //Start session
    session_start();

    // Turn on error reporting - this is critical!
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Require the autoload file
    require_once('vendor/autoload.php');

    //Create an instance of the base class
    $f3 = Base::instance();

    //Define a default route
    $f3->route('GET /', function (){
        $view = new Template();
        echo $view->render('views/home.html');
    });

    //Define an info route
    $f3->route('POST /info', function (){
        $view = new Template();
        echo $view->render('views/info.html');
    });

    //Define an info route
    $f3->route('POST /profile', function (){
        $view = new Template();
        echo $view->render('views/profile.html');
    });

    //Run fat free
    $f3->run();