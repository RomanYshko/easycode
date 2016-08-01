<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 28/03/2015
 * Time: 00:36
 */

namespace Mvc\BlogBundle\Util;


class Markdown {

    private $parser;

    public function __construct()
    {
        $this->parser = new \Parsedown();
    }

    public function toHtml($text)
    {
        $html = $this->parser->text($text);

        return $html;
    }
}