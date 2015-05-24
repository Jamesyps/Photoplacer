<?php

class ImageControllerRoutesTest extends TestCase {

    public function testIndex()
    {
        $this->call('GET', '/');
        $this->assertViewHas('categories');
        $this->assertResponseOk();
    }

    public function testValidSizeResponse()
    {
        $this->call('GET', '/100x100');
        $this->assertResponseOk();
    }

    public function testInvalidWidthTypeResponse()
    {
        $this->call('GET', '/foox100');
        $this->assertResponseStatus(404);
    }

    public function testInvalidHeightTypeResponse()
    {
        $this->call('GET', '/100xbar');
        $this->assertResponseStatus(404);
    }

    public function testInvalidWidthIntegerResponse()
    {
        $this->call('GET', '/000x100');
        $this->assertResponseOk();
    }

    public function testInvalidHeightIntegerResponse()
    {
        $this->call('GET', '/100x000');
        $this->assertResponseOk();
    }

    public function testInvalidCategoryResponse()
    {
        $this->call('GET', '/100x100/will-never-exist');
        $this->assertResponseStatus(404);
    }

    public function testInvalidFilterName()
    {
        $this->call('GET', '/100x100/filter:foobar');
        $this->assertResponseOk();
    }
}
