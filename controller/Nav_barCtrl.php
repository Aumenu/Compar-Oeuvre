<?php

require_once 'model/Db.php';
require_once 'model/Director.php';

$director = new Director;

$filmList = $director->directorList();