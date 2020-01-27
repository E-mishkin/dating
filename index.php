<?php

    /**
     * Author: Evgenii Mishkin
     * Date: 01/26/2020
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

    //Define an profile route
    $f3->route('POST /profile', function (){
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phone'] = $_POST['phone'];
        $view = new Template();
        echo $view->render('views/profile.html');
    });

    //Define an interests route
    $f3->route('POST /interests', function (){
        $_SESSION['biography'] = $_POST['biography'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $view = new Template();
        echo $view->render('views/interests.html');
    });

    //Define an summary route
    $f3->route('POST /summary', function (){
        $interests = $_POST['interests'];
        $string = implode(" ",$interests);
        $_SESSION['interests'] = $string;
        $view = new Template();
        echo $view->render('views/summary.html');
    });

    //Run fat free
    $f3->run();