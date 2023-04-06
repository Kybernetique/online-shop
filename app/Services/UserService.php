<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use App\Repositories\CartRepository;
use App\Repositories\ItemRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
