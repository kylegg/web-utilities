<?php

namespace Kylegg\WebUtilities\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
	/**
     * Get the environment settings.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
	protected function getEnvironmentSetup($app): void
	{
		$app['config']->set('app.url', 'https://www.example.com');
	}
}