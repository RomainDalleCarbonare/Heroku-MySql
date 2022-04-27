<?php

$file = file_get_contents('./dbUrl');

// echo var_dump($file);

function Explodes(String $url)
{
    $split = explode('/', $url);

    $split1 = explode(':', $split[2]);
    
    $split2 = explode('@', $split1[1]);
    
    $user = $split1[0];
    $pwd = $split2[0];
    $host = $split2[1];
    $dbname = $split[3];
    $port = $split1[2];
    
    try {
        $con = new PDO("mysql:dbname=$dbname;host=$host;port=$port", $user, $pwd);
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
};

function ParseUrl(String $url)
{ 
    $user = parse_url($url, PHP_URL_USER);
    $pwd = parse_url($url, PHP_URL_PASS);
    $host = parse_url($url, PHP_URL_HOST);
    $dbname = substr(parse_url($url, PHP_URL_PATH), 1);
    $port = parse_url($url, PHP_URL_PORT);
    
    try {
        $con = new PDO("mysql:dbname=$dbname;host=$host;port=$port", $user, $pwd);
        // echo 'work';
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
};

echo ParseUrl($file);