<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Shortcode
 *
 * @author Martin
 */
class Shortcode {

    private static $shortcodes = array();
    public $tag = "";
    public $module = "";
    public $descr = "";
    public $enabled = TRUE;
    public $function;

    public static function add_shortcode($tag, $func) {
        if (is_callable($func)) {
            $tmp = new Shortcode();
            $tmp->tag = $tag;
            $tmp->function = $func;
            self::$shortcodes[$tag] = $tmp;
            return TRUE;
        }
        return FALSE;
    }

    public static function remove_shortcode($tag) {
        unset(self::$shortcodes[$tag]);
    }

    public static function remove_all_shortcodes() {
        self::$shortcodes = array();
    }
    
    public static function getShortcodes(){
        return self::$shortcodes;
    }
}

?>
