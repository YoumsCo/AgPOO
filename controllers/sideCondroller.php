<?php

    function current_page($link) {
        $active_page = strtolower($_SERVER['PHP_SELF']);
        if (strpos($active_page, strtolower($link))) {
            return 'active-page';
        }
        else {
            return '';
        }
    }

    function check_profile($dir, $file, $e) {
        $found = "";
        foreach($dir as $d) {
            if ($file === substr($d, strlen($e) + 15)) {
                $found = true;
                break;
            }
        }
        return $found;
    }
