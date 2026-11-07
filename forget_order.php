<?php
session_start();

// Clear the order variables before destroying the session.
unset($_SESSION['dessert'], $_SESSION['drink'], $_SESSION['drinkSize']);
$_SESSION = [];

// Remove the session cookie from the browser as well.
if (ini_get('session.use_cookies')) {
   $p = session_get_cookie_params();
   setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
}

session_destroy();

// Back to a clean dining room.
header('Location: index.php');
exit;
