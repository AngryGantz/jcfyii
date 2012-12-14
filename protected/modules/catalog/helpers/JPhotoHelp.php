<?php

/*
 * Класс для помощи вывода фотографий, создания тумбнэйлов
 * и папок для них.
 */

/**
 * @author AngryGantz Email: AngryGantz@gmail.com
 * @copyright 2012
 * @version 1.0
 * 
 */
class JPhotoHelp {
    
    public $tumbBase = 'assets';
    
    /**
    * Создает дерево вложенных папок 
    */
    public function rmkdir($path, $mode = 0777) {
        $path = rtrim(preg_replace(array("/\\\\/", "/\/{2,}/"), "/", $path), "/");
        $e = explode("/", ltrim($path, "/"));
        if(substr($path, 0, 1) == "/") {
            $e[0] = "/".$e[0];
        }
        $c = count($e);
        $cp = $e[0];
        for($i = 1; $i < $c; $i++) {
            if(!is_dir($cp) && !@mkdir($cp, $mode)) {
                return false;
            }
            $cp .= "/".$e[$i];
        }
        return @mkdir($path, $mode);
    }

    
}

?>
