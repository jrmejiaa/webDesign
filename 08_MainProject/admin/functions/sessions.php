<?php

function user_authentication()
{
    checkTimeout();
    if (!checkUser()) {
        header('Location:login.php');
        exit();
    }
}

function checkUser()
{
    return isset($_SESSION['USER']);
}

function checkTimeout()
{
    $time = time();

    /**
     * for a 30 minute timeout, specified in seconds
     */
    $TIME_MINUTES = 30;
    $timeout_duration = 60 * $TIME_MINUTES;

    /**
     * Here we look for the user's LAST_ACTIVITY timestamp. If
     * it's set and indicates our $timeout_duration has passed,
     * blow away any previous $_SESSION data and start a new one.
     */
    if (
        isset($_SESSION['LAST_ACTIVITY']) &&
        ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration
    ) {
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['EXPIRED'] = true;
    }

    /**
     * Finally, update LAST_ACTIVITY so that our timeout
     * is based on it and not the user's login time.
     */
    $_SESSION['LAST_ACTIVITY'] = $time;
}

session_start();
user_authentication();
