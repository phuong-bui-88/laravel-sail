<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Support\AnimalInterface;
use function MongoDB\BSON\toJSON;

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

    public function orders()
    {
        return 'my orders';
    }

    public function loadUser(User $user)
    {
        return $user->createToken('phuong token')->accessToken;
    }

    public function loadUserScope(User $user)
    {
        return $user->createToken('phuong token scope', ['place-orders'])->accessToken;
    }
}
