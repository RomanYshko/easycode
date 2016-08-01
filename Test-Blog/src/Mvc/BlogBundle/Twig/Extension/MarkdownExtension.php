<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 28/03/2015
 * Time: 00:45
 */

namespace Mvc\BlogBundle\Twig\Extension;

use Mvc\BlogBundle\Util\Markdown;

class MarkdownExtension extends \Twig_Extension{

    private $parser;

    public function __construct(Markdown $parser)
    {
        $this->parser = $parser;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'md2html',
                array($this, 'markdownToHtml'),
                array('is_safe' => array('html'))
            ),
        );
    }

    public function markdownToHtml($content)
    {
        return $this->parser->toHtml($content);
    }


    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return "markdown_extension";
    }
}
