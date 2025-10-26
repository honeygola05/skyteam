<?php

function ensureUserIsLoggedIn()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}

function ensureUserIsLoggedOut()
{
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
        header("Location: account.php");
        exit;
    }
}