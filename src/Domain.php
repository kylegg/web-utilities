<?php

namespace Kylegg\WebUtilities;

class Domain
{
	/**
	 * Gets the current top level domain based on the application config.
	 *
	 * @example echo Domain::TLD(); // returns example.com
	 * @return string $baseUrl
	 */
	public static function TLD(): string
	{
		$baseUrl = config('app.url');
		$baseUrl = preg_match('/(https?:[\\/\\\]{2})?([a-z0-9\-]+\\.[a-z0-9\-\/]+$)/i', $baseUrl, $matches);
		$baseUrl = trim($matches[2], '/\\');
		
		return $baseUrl;
	}
	
	/**
	 * Gets the current top level domain with a leading dot based on the application config.
	 *
	 * @example echo Domain::DotLedTLD(); // returns .example.com
	 * @return string $baseUrl
	 */
	public static function DotLedTLD(): string
	{
		return '.'.self::TLD();
	}
	
	/**
	 * Generates a subdomain string for the top level domain.
	 *
	 * @param string    $subdomain    The subdomain to be appended to the top level domain
	 *
	 * @example echo Domain::Subdomain("bizozzle"); // returns bizozzle.example.com
	 * @return string $baseUrl
	 */
	public static function Subdomain(string $subdomain): string
	{
		if (empty($subdomain))
			return self::TLD();
		
		return $subdomain.self::DotLedTLD();
	}
}