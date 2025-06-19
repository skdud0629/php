<?php
class VerifyCsrfToken extends BaseVerifier
{
    protected $except = [
        'articles',
        'articles/*',
    ];
}