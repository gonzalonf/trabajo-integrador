<?php

require_once("../php/soporte.php");
require_once("../php/clases/auth.php");

$auth->logout();

header("Location:index.php");exit;


