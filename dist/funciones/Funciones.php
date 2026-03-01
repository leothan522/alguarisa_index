<?php
use Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createImmutable(dirname(__FILE__, 3));
    $dotenv->load();
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit();
}

function env($env, $default = null): mixed
{
    if (isset($_ENV[mb_strtoupper($env)]) && !empty($_ENV[mb_strtoupper($env)])) {
        if ($_ENV[mb_strtoupper($env)] == "false") {
            $_ENV[mb_strtoupper($env)] = false;
        }
        $response = trim($_ENV[mb_strtoupper($env)], '/');
    } else {
        $response = $default;
    }
    return $response;
}

function getURLActual(): string
{
    // Obtener el protocolo (http o https)
    $protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    // Obtener el nombre del host
    $host = $_SERVER['HTTP_HOST'];
    // Obtener la URI de la solicitud
    $uri = $_SERVER['REQUEST_URI'];
    // Combinar todo para obtener la URL completa
    return $protocolo . $host . $uri;
}

function asset($uri = null, $noCache = false): string
{
    $uri = trim($uri, '/');
    $version = null;
    if ($noCache) {
        $version = "?v=" . rand();
    }
    $url = trim(APP_URL, '/');
    return $url . '/' . $uri . $version;
}

define('APP_URL', env('APP_URL', getURLActual()));
