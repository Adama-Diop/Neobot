<?php

require_once PATH_ROOT . '/controllers/adminAuth.php';

function adminAction()
{
    verifierAdmin();

    require PATH_ROOT . '/view/admin/dashboard.php';
}
