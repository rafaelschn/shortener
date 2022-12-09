<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class RedirectToUrlController extends Controller
{
    public function __invoke(Link $link)
    {
        abort_unless($link->is_enabled, 403);

        $link->increment('redirects');

        return redirect()->to($link->url);
    }
}
