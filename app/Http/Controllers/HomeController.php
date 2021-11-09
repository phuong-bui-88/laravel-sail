<?php

namespace App\Http\Controllers;
use App\Support\AnimalInterface;

class HomeController extends Controller
{
    public $animal = null;

    public function __construct(AnimalInterface $animal)
    {
        $this->animal = $animal;
    }

    public function index() {
        $pageTitle = 'Homepage';

        return view('welcome', compact('pageTitle'));
    }

    public function hello()
    {
        return $this->animal->sayHello();
    }
}
