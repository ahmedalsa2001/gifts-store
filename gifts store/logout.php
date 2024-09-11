<?php

require_once 'web.php';

if (isset($_POST['logout'])) {
    logout();
}
redirect('index.php');
