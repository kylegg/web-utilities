<?php

namespace Kylegg\WebUtilities\Tests\Unit;

use Kylegg\WebUtilities\Domain;
use Kylegg\WebUtilities\Tests\TestCase;

final class DomainGenerationTest extends TestCase
{
	/**
	 * Test TLD generation.
	 */
	public function testTLD(): void
	{
		$this->assertSame('example.com', Domain::TLD());
	}
	
	/**
	 * Test dot led TLD generation.
	 */
	public function testDotLedTLD(): void
	{
		$this->assertSame('.example.com', Domain::DotLedTLD());
	}
	
	/**
	 * Test subdomain generation.
	 */
	public function testSubdomain(): void
	{
		$this->assertSame('example.com', Domain::Subdomain(''));
		$this->assertSame('bizozzle.example.com', Domain::Subdomain('bizozzle'));
	}
}