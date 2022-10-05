<?php

require_once "classes/Parser.php";

class Tags extends Parser
{
    /**
     * @var array|mixed
     */
    protected $tags = [];
    /**
     * @var array
     */
    protected $count_tags = [];

    /**
     * Tags constructor.
     * @param $url
     * @throws Exception
     */
    public function __construct($url)
    {
        // исполняем родительский конструктор
        parent::__construct($url);

        // парсим контент по открывающему тегу
        $this->parseContent("<");

        // чистим теги от лишнего
        $this->tags = $this->getTags($this->parsed_content);
    }

    /**
     * Get tags count
     * @return array
     */
    public function getCountTags()
    {
        // обнулим счётчик
        $this->count_tags = [];

        // считаем количество тегов
        foreach ($this->tags as $tag) {
            $this->count_tags[$tag]++;
        }

        return $this->count_tags;
    }

    /**
     * Parse string by tags
     * @param $tags
     * @return mixed
     */
    protected function getTags($tags)
    {
        foreach ($tags as $key => &$tag)
        {
            // уберём всё до первого пробела
            $tag = stristr($tag, ' ', true);

            // уберём всё после тега, если он без параметров
            if (stripos($tag, '>')) {
                $tag = stristr($tag, '>', true);
            }

            // убираем теги комментариев и закрывающие теги, а так же пустые индексы массива
            if ($tag == '!--' || $tag[0] == '/' || $tag == '') unset($tags[$key]);
        }

        return $tags;
    }

}