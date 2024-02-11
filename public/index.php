<?php

use Routes\Router;

require_once "../autoload.php";
require_once "../config.php";

$uri = $_SERVER['REQUEST_URI'];
$request = new Router();
$pageData = $request->requester($uri);
$pageClass = $pageData['class'];
$pageMethod = $pageData['method'];
$getPage = new $pageClass($pageMethod);

return;