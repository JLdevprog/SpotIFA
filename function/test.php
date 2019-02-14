<?php

require "object.php";

$johann = new category("Body");

$johann = new body("Johann L", "Male", "Hazelnut", "1.76cm", "75kg");

?><pre><?php
var_dump($johann);
?><pre><?php

echo $johann;



?>