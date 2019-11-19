<?php
session_start();
session_unset();
session_destroy();
header('Location:  /2019-ac32006/team2/index.php');
