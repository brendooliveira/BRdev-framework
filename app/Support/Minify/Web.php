<?php
if (strpos(url(), "localhost")) {
    /**
     * CSS
     */
    $minCSS = new MatthiasMullie\Minify\CSS();


    if (!is_dir(__DIR__ . "/../../../themes/assets/css")) {
        mkdir(__DIR__ . "/../../../themes/assets/css");
    }

    //theme CSS
    $cssDir = scandir(__DIR__ . "/../../../themes/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCSS->add($cssFile);
        }
    }


    if (!is_dir(__DIR__ . "/../../../public/assets/css")) {
        mkdir(__DIR__ . "/../../../public/assets/css");
    }

    //Minify CSS
    $minCSS->minify(__DIR__ . "/../../../public/assets/css/styles.css");

    /**
     * JS
     */
    $minJS = new MatthiasMullie\Minify\JS();

    if (!is_dir(__DIR__ . "/../../../themes/assets/js")) {
        mkdir(__DIR__ . "/../../../themes/assets/js");
    }

    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../../themes/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJS->add($jsFile);
        }
    }

    if (!is_dir(__DIR__ . "/../../../public/assets/js")) {
        mkdir(__DIR__ . "/../../../public/assets/js");
    }

    //Minify JS
    $minJS->minify(__DIR__ . "/../../../public/assets/js/scripts.js");
}