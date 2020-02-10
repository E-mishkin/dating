<?php

    /**
     * Author: Evgenii Mishkin
     * Date: 02/09/2020
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
    require_once('model/validate.php');

    //Create an instance of the base class
    $f3 = Base::instance();

    //Turn on Fat-Free error reporting
    $f3->set('DEBUG', 3);

    //Define arrays
    $f3->set('states', array('AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA',
                                'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH',
                                'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX',
                                'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY'));

    //Define a default route
    $f3->route('GET /', function (){
        $view = new Template();
        echo $view->render('views/home.html');
    });

    //Define an info route
    $f3->route('GET|POST /info', function ($f3){

        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from form
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];

            //Add data to hive
            $f3->set('firstname', $firstname);
            $f3->set('lastname', $lastname);
            $f3->set('age', $age);
            $f3->set('phone', $phone);

            //If data is valid
            if (validInfo()) {

                //Write data to Session
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['age'] = $age;
                $_SESSION['phone'] = $phone;

                //Redirect to profile page
                $f3->reroute('/profile');
            }

        }

        $view = new Template();
        echo $view->render('views/info.html');
    });

    //Define an profile route
    $f3->route('GET|POST /profile', function ($f3){
        /*
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phone'] = $_POST['phone'];
        */

        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from form
            $email = $_POST['email'];
            $state = $_POST['state'];

            //Add data to hive
            $f3->set('email', $email);
            $f3->set('state', $state);

            //If data is valid
            if (validProfile()) {

                //Write data to Session
                $_SESSION['email'] = $email;
                $_SESSION['state'] = $state;

                //Redirect to profile page
                $f3->reroute('/interests');
            }
        }

        $view = new Template();
        echo $view->render('views/profile.html');
    });

    //Define an interests route
    $f3->route('GET|POST /interests', function (){
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