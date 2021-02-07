<?php

if (empty($_SESSION)) {
    header('Location: ' . Config::SITE_URL . '/login.php');
}