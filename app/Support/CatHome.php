<?php

namespace App\Support;

class CatHome implements AnimalInterface
{
    public function sayHello()
    {
        return 'Cat say hello';
    }
}
