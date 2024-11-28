<?php

$cipher = 'aes-256-cbc';

$key = hash('sha256', $_ENV['key'], true);