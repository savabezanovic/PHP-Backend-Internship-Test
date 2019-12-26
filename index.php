<?php

require $database = "core/bootstrap.php";

require Router::load("routes.php")->direct(Request::uri(), Request::method());