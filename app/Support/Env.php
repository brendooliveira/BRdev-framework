<?php

namespace App\Support;

class Env
{
    private static bool $loaded = false;

    public static function load(string $filePath): void
    {
        if (self::$loaded) {
            return;
        }

        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException("Arquivo .env não encontrado em: " . $filePath);
        }

        $envFileContent = file_get_contents($filePath);
        $envLines = preg_split('/\n|\r\n?/', $envFileContent);
        $lineNumber = 0;

        foreach ($envLines as $line) {
            $lineNumber++;

            if (empty(trim($line)) || $line[0] === '#') {
                continue;
            }

            if (!strpos($line, '=')) {
                throw new \InvalidArgumentException("Erro de sintaxe na linha {$lineNumber}: {$line}");
            }

            list($name, $value) = explode('=', $line, 2);
            $constantName = strtoupper(trim($name));
            $constantValue = trim($value);

            //ENV 
            if($constantValue == "true"){
                $_ENV[$constantName] = true;
            }

            if($constantValue == "false"){
                $_ENV[$constantName] = false;
            }

            $_ENV[$constantName] = $constantValue;
        }

        self::$loaded = true;
    }

}
