<?php

namespace App\Helpers;

class View extends Helper
{
    private static $path_to_views = "../resources/views/"; // this is relative to layouts folder
    private static $path_to_layouts = "/../../resources/layouts/";

    public static function make($layout, $view, $data = [])
    {
        extract($data, EXTR_PREFIX_SAME, "_");

        $layout_file = str_replace(".", "/", $layout) . ".php";
        $view_file = str_replace(".", "/", $view) . ".php";

        // render view including extracted $data variables
        ob_start();
        include (self::$path_to_views . $view_file);
        $__viewport__ = ob_get_clean();

        require self::$path_to_layouts . $layout_file;
    }

    public static function error($code)
    {
        header("HTTP/1.0 404 Not Found");

        $filename = "errors/" . $code . ".php";

        require self::$path_to_views . $filename;
    }
}
