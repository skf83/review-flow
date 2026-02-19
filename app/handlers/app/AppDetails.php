<?php

namespace app\handlers\app;

class AppDetails {

    public function getName() {

        $content = file_get_contents('composer.json');
        $composer = json_decode($content, true);

        return $composer['version'];
    }

    public function getVersion() {

        $content = file_get_contents('composer.json');
        $composer = json_decode($content, true);

        return $composer['version'];
    }

    public function getPHPVersion() {

        return phpversion();
    }


}