<?php

use Qoutes\Qoute;

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    private $instance;
    private $options;

    private function checkoutOutput($output)
    {
        $this->assertArrayHasKey('qoute', $output);
        $this->assertArrayHasKey('tags', $output);
        $this->assertArrayHasKey('link', $output);
        $this->assertArrayNotHasKey('source', $output);
    }

    private function newInstance($options = [])
    {
        $this->instance = new Qoute($options);
    }

    private function newOptions()
    {
        $this->options = [
            'max_lines'      => 2,
            'max_characters' => 200
        ];
    }


    public function testConstructOptionsEmpty()
    {
        $this->newInstance();
        $this->assertTrue($this->instance instanceof Qoute);
        $this->assertCount(0, $this->instance->getOptions());
    }

    public function testGetQouteWithoutOptions()
    {
        $this->newInstance();

        $output = $this->instance->get();

        $this->assertTrue(is_array($output));
        $this->assertArrayHasKey('format', $this->instance->getOptions());
        $this->checkoutOutput($output);
    }

    public function testConstructOptionsNonEmpty()
    {
        $this->newOptions();

        $this->newInstance($this->options);
        $this->assertTrue($this->instance instanceof Qoute);
        $this->assertCount(count($this->options), $this->instance->getOptions());
        $this->assertCount(0, array_diff($this->instance->getOptions(), $this->options));
    }

    public function testGetQouteWithOptions()
    {
        $this->newOptions();
        $this->newInstance($this->options);

        $output = $this->instance->get();

        $this->assertTrue(is_array($output));
        $this->assertArrayHasKey('format', $this->instance->getOptions());
        $this->checkoutOutput($output);

        $this->assertLessThanOrEqual($this->options['max_characters'], strlen($output['qoute']));
    }
}
