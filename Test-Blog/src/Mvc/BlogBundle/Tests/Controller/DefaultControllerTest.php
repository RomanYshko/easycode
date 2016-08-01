<?php

namespace Mykees\MediaBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DefaultControllerTest extends WebTestCase
{
    protected $client;
    protected $container;
    protected $manager;
    protected $image;

    public function setUp()
    {
        //Load fixtures
        $fixtures = array(
            'Mvc\BlogBundle\DataFixtures\ORM\LoadPostsData',
        );
        $this->loadFixtures($fixtures);

        $this->client = static::createClient();
        $this->container = $this->client->getContainer();

        parent::setUp();
    }

    public function testPostsList()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertEquals(200,$this->client->getResponse()->getStatusCode());
        $this->assertEquals(4,$crawler->filter('.posts')->count());
    }
}
