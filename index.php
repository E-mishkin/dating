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

    $controller = new Controller($f3);

    //Define a default route
    $f3->route('GET /', function (){
        $GLOBALS['controller']->home();
    });

    //Define an info route
    $f3->route('GET|POST /info', function ($f3){

        $GLOBALS['controller']->info($f3);

        /*
        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from form
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];

            //check if checkbox set up
            if (!empty($_POST['premium']))
            {
                $premMember = new PremiumMember();
            }
            else {
                $member = new Member();
            }

            //Add data to hive
            $f3->set('firstname', $firstname);
            $f3->set('lastname', $lastname);
            $f3->set('age', $age);
            $f3->set('phone', $phone);
            $f3->set('gender', $gender);

            //If data is valid
            if (validInfo()) {

                //Write data to Session
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['age'] = $age;
                $_SESSION['phone'] = $phone;
                $_SESSION['gender'] = $gender;

                //Redirect to profile page
                $f3->reroute('/profile');
            }

        }

        $view = new Template();
        echo $view->render('views/info.html');
        */
    });

    //Define a profile route
    $f3->route('GET|POST /profile', function ($f3){

        $GLOBALS['controller']->profile($f3);
        /*
        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from form
            $email = $_POST['email'];
            $state = $_POST['state'];
            $seeking = $_POST['seeking'];
            $biography = $_POST['biography'];

            //Add data to hive
            $f3->set('email', $email);
            $f3->set('state', $state);
            $f3->set('seeking', $seeking);
            $f3->set('biography', $biography);

            //If data is valid
            if (validProfile()) {

                //Write data to Session
                $_SESSION['email'] = $email;
                $_SESSION['state'] = $state;
                $_SESSION['biography'] = $biography;
                $_SESSION['seeking'] = $seeking;

                //Redirect to profile page
                $f3->reroute('/interests');
            }
        }

        $view = new Template();
        echo $view->render('views/profile.html');
        */
    });

    //Define an interests route
    $f3->route('GET|POST /interests', function ($f3){

        $GLOBALS['controller']->interests($f3);
        /*
        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from form
            //$selectedInterests = !empty($_POST['interests']) ? $_POST['interests'] : array();
            $selectedInterests = $_POST['interests'];

            //Add data to hive
            $f3->set('selectedInterests', $selectedInterests);

            //If data is valid
            if (validInterests()) {

                //Write data to Session
                $_SESSION['interests'] = $selectedInterests;

                //Redirect to profile page
                $f3->reroute('/summary');
            }
        }

        $view = new Template();
        echo $view->render('views/interests.html');
        */
    });

    //Define an summary route
    $f3->route('GET|POST /summary', function (){
        $GLOBALS['controller']->summary();
    });

    //Run fat free
    $f3->run();