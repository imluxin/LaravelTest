<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * 添加不需要CSRF验证的路径
     * @var array
     */
    protected $except = [
        // 'articles/*',
    ];
}
