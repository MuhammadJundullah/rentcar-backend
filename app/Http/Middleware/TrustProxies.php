<?php

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
/**
* The trusted proxies for this application.
*
* @var array|string|null
*/
protected $proxies = '*'; // Atau alamat IP spesifik dari proxy Anda

/**
* The headers that should be trusted.
*
* @var int
*/
protected $headers =
Request::HEADER_X_FORWARDED_FOR |
Request::HEADER_X_FORWARDED_HOST |
Request::HEADER_X_FORWARDED_PORT |
Request::HEADER_X_FORWARDED_PROTO |
Request::HEADER_X_FORWARDED_AWS_ELB; // Tambahkan ini jika di AWS

// ... sisanya
}