<?php

require_once 'laravel.php';

if (class_exists('Inertia\ServiceProvider')) {
    require_once 'inertia.php';
}

if (class_exists('Laravel\Nova\Nova')) {
    require_once 'nova.php';
}
