<?php

namespace App\Services;

# Model
use App\Channel;

# Facades
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Yish\Generators\Foundation\Service\Service;

class ChannelService
{
    protected $repository;

    public function store($request, $user_id)
    {
        if ($request->password == NULL) {
            $request->request->add(['uuid' => Str::uuid(), 'user_id' => $user_id, 'password' => NULL]);
        }
        else {
            $request->validate([
                'password' => 'required|string|min:4|confirmed',
            ]);
            $request->request->add(['uuid' => Str::uuid(), 'user_id' => $user_id, 'password' => Hash::make($request->password)]);
        }     
        Channel::create($request->except('_token', '_method'));
    }

    public function update($request, $id)
    {
        $channel = Channel::findOrFail($id);
        $channel->name = $request->name;

        if ($request->has('is_password')) {
            $request->validate([
                'password' => 'required|string|min:4|confirmed',
            ]);
            $channel->password = Hash::make($request->password);
            
        }
        else {
            $channel->password = NULL;
        }
        $channel->save();
    }
}
