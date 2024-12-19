<?php


namespace Learning\Http\Middlewares;



use WPWCore\Routing\Middleware\VerifyCsrfToken as BaseVerifyCsrfToken;
class VerifyCsrfToken extends BaseVerifyCsrfToken
{

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [];


}