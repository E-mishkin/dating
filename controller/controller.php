<?php

class Controller
{
    private $_f3;

    /**
     * Controller constructor.
     * @param $f3
     */
    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    public function info($_f3)
    {
        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from form
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $memCheck = $_POST['premium'];


            //Add data to hive
            $_f3->set('firstname', $firstname);
            $_f3->set('lastname', $lastname);
            $_f3->set('age', $age);
            $_f3->set('phone', $phone);
            $_f3->set('gender', $gender);


            //If data is valid
            if (validInfo()) {

                //check if checkbox set up
                if ($memCheck == 'premium')
                {
                    $premMember = new PremiumMember($firstname, $lastname, $age, $gender, $phone);
                    $_SESSION['member'] = $premMember;
                    $_SESSION['prem'] = $_POST['premium'];;
                }
                else {
                    $member = new Member($firstname, $lastname, $age, $gender, $phone);
                    $_SESSION['member'] = $member;
                    $_SESSION['prem'] = $member;
                }

                //Write data to Session
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['age'] = $age;
                $_SESSION['phone'] = $phone;
                $_SESSION['gender'] = $gender;

                //Redirect to profile page
                $_f3->reroute('/profile');
            }

        }

        $view = new Template();
        echo $view->render('views/info.html');
    }

    public function profile($_f3)
    {
        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from form
            $email = $_POST['email'];
            $state = $_POST['state'];
            $seeking = $_POST['seeking'];
            $biography = $_POST['biography'];

            //Add data to hive
            $_f3->set('email', $email);
            $_f3->set('state', $state);
            $_f3->set('seeking', $seeking);
            $_f3->set('biography', $biography);

            //If data is valid
            if (validProfile()) {

                //Write data to Session
                $_SESSION['email'] = $email;
                $_SESSION['state'] = $state;
                $_SESSION['biography'] = $biography;
                $_SESSION['seeking'] = $seeking;

                //Redirect to the next page
                if($_SESSION['prem'] == 'premium')
                {
                    $_f3->reroute('/interests');
                }
                else
                {
                    $_f3->reroute('/summary');
                }

            }
        }

        $view = new Template();
        echo $view->render('views/profile.html');
    }

    public function interests($_f3)
    {
        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from form
            //$selectedInterests = !empty($_POST['interests']) ? $_POST['interests'] : array();
            $selectedInterests = $_POST['interests'];

            //Add data to hive
            $_f3->set('selectedInterests', $selectedInterests);

            //If data is valid
            if (validInterests()) {

                //Write data to Session
                $_SESSION['interests'] = $selectedInterests;

                //Redirect to profile page
                $_f3->reroute('/summary');
            }
        }

        $view = new Template();
        echo $view->render('views/interests.html');
    }

    public function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}


