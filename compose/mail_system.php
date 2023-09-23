<?php

switch ($path_act) {
	case "add":
         include "compose_action.php";
		break;
	default:
		include "message.php";
		break;
}

?>