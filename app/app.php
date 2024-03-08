<?php

use MA\PHPMVC\Kernel;
use MA\PHPMVC\Http\Request;
use MA\PHPMVC\Http\Response;

// Initialize the application with dependency injection
$app = new Kernel(
    new Request($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER),
    new Response()
);

return $app;