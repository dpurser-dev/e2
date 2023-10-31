<?php

session_start(); 

# Clear the session
session_unset();
session_destroy();
session_start();

# Load the view
header('Location: index.php');