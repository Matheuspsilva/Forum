<?php

namespace App\Http\Views\Composers;

use App\Channel;
use App\User;
use Illuminate\View\View;


class ChannelComposer
{
    protected $channels;

    public function __construct(User $channels)
    {
        // Dependencies automatically resolved by service container...
        $this->channels = $channels;
    }

    public function compose(View $view)
    {
        $view->with('channels', $this->channels->all());
    }
}
