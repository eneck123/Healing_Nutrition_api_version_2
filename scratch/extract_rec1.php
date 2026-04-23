<?php
$content = file_get_contents(__DIR__ . '/../rec1.txt');
echo substr($content, -3000);
