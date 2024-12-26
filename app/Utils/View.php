<?php

namespace App\Utils;

class View
{
    /* metodo responsavel por retorna o conteudo de uma view */
    private static function getContentView($view)
    {
        $file = __DIR__ . '/../../resources/view/' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }
    /* metodo responsavel por retornar o conteudo renderizado de uma view */
    public static function render($view, $vars = [])
    {
        $contentView = self::getContentView($view);
        $keys = array_keys($vars);

        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);

        return str_replace($keys, array_values($vars), $contentView);
    }
}
