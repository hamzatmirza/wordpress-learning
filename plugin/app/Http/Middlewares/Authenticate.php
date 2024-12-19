<?php


namespace Learning\Http\Middlewares;


use WPWhales\Http\Response;

class Authenticate
{

    public function handle($request, \Closure $next, $loggedIn = true)
    {

        $loggedIn = filter_var($loggedIn, FILTER_VALIDATE_BOOLEAN);
        if (is_user_logged_in() !== $loggedIn) {

            return new Response("Not Allowed", 403);
        }
        return $next($request);
    }
}