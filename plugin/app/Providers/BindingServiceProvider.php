<?php

namespace Learning\Providers;


use Learning\Models\User;
use WPWhales\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app["bindingResolver"]->bind("user",User::class);


    }


}
