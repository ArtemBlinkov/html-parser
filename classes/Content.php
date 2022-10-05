<?php


class Content
{
    /**
     * @var false|string
     */
    protected $content = "";

    /**
     * Content constructor.
     * @param $url
     * @throws Exception
     */
    public function __construct($url)
    {
        $url = $this->validate($url);

        if ($url)
            $this->content = $this->getContent($url);
        else
            throw new Exception("Url is not correct!");
    }

    /**
     * Get content
     * @return false|string
     */
    public function get()
    {
        return $this->content;
    }

    /**
     * Validate url
     * @param $url
     * @return mixed
     */
    protected function validate($url)
    {
        //todo: тут можно добавить валидацию с кирилицей

        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * @param $url
     * @return false|string
     */
    protected function getContent($url)
    {
        return file_get_contents($url);
    }
}