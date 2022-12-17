<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'post-login', 'login', 'logout', 'post-signup', 'signup', 'products/view',
        'products', 'products/add', 'products/edit', 'products/delete', 'users/index', 'users/add', 'users', 'users/delete'
    ];
}
