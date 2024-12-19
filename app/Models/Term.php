<?php

namespace Learning\Models;


use WPWCore\Database\Eloquent\Model as Eloquent;

class Term extends Eloquent
{


    protected $table = 'terms';
    protected $primaryKey = 'term_id';

}
