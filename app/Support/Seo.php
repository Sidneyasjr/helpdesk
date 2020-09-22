<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 2019-02-28
 * Time: 11:15
 */

namespace App\Support;


use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    private $optimizer;

    public function __construct()
    {
        $this->optimizer = new Optimizer();
        $this->optimizer->openGraph(
            env('APP_NAME'),
            'pt_BR',
            'article'
        );
    }

    public function render(string $title, string $description, string $url, string $image, bool $follow = true)
    {
        return $this->optimizer->optimize($title, $description, $url, $image, $follow)->render();
    }
}
