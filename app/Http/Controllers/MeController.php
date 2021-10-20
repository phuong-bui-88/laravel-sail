<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class You {
    public $id;
    public $name;
    public function __construct($id, $name)
    {
        $this->id = $id; $this->name = $name;
    }
}


class MeController extends Controller
{
    public function index(Request $request)
    {
        $users = [new You(1, 'phuong'), new You(2, 'bui')];

        $results = array_map(fn($user) => [
            'id' => $user->id,
            'name' => $user->name
        ], $users);

        return var_dump($results);
    }
}

