<?php

    /*
     * Validate the info page form.
     * @return boolean
     */
    function validInfo()
    {
        global $f3;
        $isValid = true;

        if (!validName($f3->get('firstname'))) {

            $isValid = false;
            $f3->set("errors['firstname']", "Please enter first name");
        }

        if (!validLastName($f3->get('lastname'))) {

            $isValid = false;
            $f3->set("errors['lastname']", "Please enter last name");
        }

        if (!validAge($f3->get('age'))) {

            $isValid = false;
            $f3->set("errors['age']", "Please enter a valid age");
        }

        if (!validPhone($f3->get('phone'))) {

            $isValid = false;
            $f3->set("errors['phone']", "Please enter a valid phone number");
        }

        /*
        if (!validEmail($f3->get('email'))) {

            $isValid = false;
            $f3->set("errors['email']", "Please enter a valid email");
        }
        */

        return $isValid;
    }

    /*
     * Validate first name.
     * First Name must not be empty and may only consist
     * of alphabetic characters.
     * @return boolean
     */
    function validName($firstname)
    {
        return !empty($firstname) && ctype_alpha($firstname);
    }

    /*
    * Validate last name.
    * Last Name must not be empty and may only consist
    * of alphabetic characters.
    * @return boolean
    */
    function validLastName($lastname)
    {
        return !empty($lastname) && ctype_alpha($lastname);
    }

    /*
    * Validate age
    * Age must not be empty and must be a number
    * between 18 and 118.
    * @param String age
    * @return boolean
    */
    function validAge($age)
    {
        return !empty($age)
            && ctype_digit($age)
            && $age > 18
            && $age < 118;
    }

    /*
     * Validate phone.
     * @param String phone
     * @return boolean
     */
    function validPhone($phone)
    {
        return !empty($phone) && ctype_digit($phone);
    }

    /*
     * Validate profile page form.
     * @return boolean
     */
    function validProfile()
    {
        global $f3;
        $isValid = true;

        if (!validEmail($f3->get('email'))) {

            $isValid = false;
            $f3->set("errors['email']", "Please enter a valid email");
        }

        return $isValid;
    }

    /*
     * Validate email.
     * @param String email
     * @return boolean
     */
    function validEmail($email)
    {
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

