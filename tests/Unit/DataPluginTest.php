<?php

namespace Hounddd\Data\Tests\Unit;

use Config;
use System\Classes\PluginBase;
use System\Tests\Bootstrap\PluginTestCase;
use Hounddd\Data\Plugin;

class DataPluginTest extends PluginTestCase
{
    protected PluginBase $plugin;

    public function setUp(): void
    {
        $this->plugin = new Plugin($this->createApplication());
    }

    public function testPluginDetails()
    {
        $details = $this->plugin->pluginDetails();

        $this->assertIsArray($details);
        $this->assertArrayHasKey('name', $details);
        $this->assertArrayHasKey('description', $details);
        $this->assertArrayHasKey('icon', $details);
        $this->assertArrayHasKey('author', $details);

        $this->assertEquals('Hounddd', $details['author']);
    }
}
