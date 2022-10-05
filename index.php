<?php

require_once "classes/Tags.php";
require_once "classes/Show.php";

$parser = new Tags("https://razor-cut.ru");

$result = $parser->getCountTags();

Show::arrayType($result);