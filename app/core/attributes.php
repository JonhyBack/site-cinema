<?php

#[Attribute(Attribute::TARGET_METHOD)]
class HttpPost
{
    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Route::error_page_404();
        }
    }
}

#[Attribute(Attribute::TARGET_METHOD)]
class HttpGet
{
    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            Route::error_page_404();
        }
    }
}

#[Attribute(Attribute::TARGET_METHOD)]
class HttpDelete
{
    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
            Route::error_page_404();
        }
    }
}