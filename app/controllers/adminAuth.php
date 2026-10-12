<?php

function verifierAdmin()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (empty($_SESSION['client_id'])) {
        header('Location: ' . URL . '/?action=login');
        exit;
    }

    if (($_SESSION['role'] ?? '') !== 'admin') {
        http_response_code(403);
        exit("Accès refusé : réservé aux administrateurs.");
    }
}
