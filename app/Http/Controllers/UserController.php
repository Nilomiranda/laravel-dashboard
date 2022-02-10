<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends BaseController {
    public function getEntityDescription(): array
    {
        $user = new User;

        return $user->getDescription();
    }

    public function create(Request $request)
    {
        $data = $request->toArray();
        $data["password"] = bcrypt($data["password"]);

        return User::create($data);
    }
}
