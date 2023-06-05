<?php

namespace App\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;
use Jenssegers\Mongodb\Eloquent\Model;


class Membership extends JetstreamMembership
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
