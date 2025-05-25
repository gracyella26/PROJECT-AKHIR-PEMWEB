<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RewardController extends Controller
{
    public function store(Request $request)
    {
        $reward = Reward::create([
            'user_id' => $request->user()->id,
            'code' => Str::random(10),
            'discount_percentage' => 10,
        ]);

        return response()->json($reward, 201);
    }
}