<?php

/**
 * @param string $path
 * @return string
 */
function url(string $path = null): string
{
    if ($_SERVER['HTTP_HOST'] == "localhost") {
        if ($path) {
            return $_ENV["CONF_URL_TEST"] . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return $_ENV["CONF_URL_TEST"];
    }

    if ($path) {
        return $_ENV["CONF_URL_BASE"] . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return $_ENV["CONF_URL_BASE"];
}

/**
 * @param string $path
 * @return string
 */
function assets(string $path = null): string
{
    return url("/public/$path");
}

function view(string $view, array $data = [])
{
    $v = new Jenssegers\Blade\Blade("themes/views", "themes/cache");
    echo $v->render($view, $data);
    return;
}

/**
 * @param string $email
 * @return bool
 */
function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $password
 * @return string
 */
function passwd(string $password): string
{
    if (!empty(password_get_info($password)['algo'])) {
        return $password;
    }

    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * @param string $password
 * @param string $hash
 * @return bool
 */
function passwd_verify(string $password, string $hash): bool
{
    return password_verify($password, $hash);
}

/**
 * @param string $hash
 * @return bool
 */
function passwd_rehash(string $hash): bool
{
    return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}


/**
 * @param string $key
 */
function envget(string $key, ?string $default = "default"): string
{
    if (!empty($_ENV[$key])) {
        return $_ENV[$key];
    }

    return $default;
}

/**
 * @param string $image
 * @param int $width
 * @param int|null $height
 * @return string
 */
function image(?string $image, int $width, int $height = null): ?string
{
    if ($image) {
        return assets() . "/" . (new \App\Support\Thumb())->make($image, $width, $height);
    }

    return null;
}

function fileS3(string $file): string
{
    return envget("CONF_AWS_PATH") . "/$file";
}

/**
 * Gera um slug amigável para URL.
 *
 * @param string $string A string a ser convertida em slug.
 * @param string $delimiter O delimitador para substituir os espaços e caracteres especiais. (Opcional, padrão: '-')
 * @return string O slug gerado.
 */
function str_slug(string $string, string $delimiter = '-'): string
{
    $slug = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
    $slug = preg_replace('/[^a-zA-Z0-9-]+/', $delimiter, $slug);
    $slug = strtolower(trim($slug, $delimiter));
    $slug = preg_replace('/-{2,}/', $delimiter, $slug);

    return $slug;
}
