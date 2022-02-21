<?php

namespace App\Support;


class DogHome implements AnimalInterface
{

    public function sayHello()
    {
        return 'Dog say hello';
    }
}
