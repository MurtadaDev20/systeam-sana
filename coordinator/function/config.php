<?php
//session timeout after 1 hour of inactivity
ob_start();
ini_set('session.cookie_httponly', true);
ini_set('session.cookie_secure', true);
ini_set('session.gc_maxlifetime', 3600);

session_start();
session_regenerate_id();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


include 'db.php';
