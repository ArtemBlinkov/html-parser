<?php

require_once "classes/Content.php";

class Parser extends Content
{
    /**
     * @var array
     */
    protected $parsed_content = [];

    /**
     * @param $separator
     */
    public function parseContent($separator)
    {
        // разбиваем страницу по открывающему тегу
        $string = explode($separator, $this->content);

        // убираем первый эелемент, он всегда пустой
        unset($string[0]);

        // записываем результат
        $this->parsed_content = $string;
    }

}