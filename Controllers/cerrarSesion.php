<?php

session_start();
session_destroy();
echo "<script> document.location.href='../Views/navegacion/index.php';</script>";