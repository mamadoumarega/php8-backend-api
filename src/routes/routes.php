<?php

$resource = $_GET['resource'] ?? null;

switch ($resource) {
    case 'user':
        return require_once 'user.route.php';

    default:
        // 404
}