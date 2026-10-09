<?php

function logoutAction()
{
    session_start();
    session_destroy();
    header('Location: ' . URL . '/?action=login');
    exit();
}
