<?php

namespace composers\Composer;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserComposer
{
    function compose(View $view)
    {
        $view->with([
            'username'   => Auth::user()->username,
            'email'      => Auth::user()->email,
            'id'         => Auth::user()->id,
            'admin'      => Auth::user()->admin,
            'su'         => Auth::user()->superuser
        ]);
    }
}