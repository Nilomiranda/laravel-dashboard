<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;


class UserController extends BaseController {
    public function getEntityDescription(): array
    {
        $user = new User;

        return $user->getDescription();
    }
}
