<?php

namespace App\Services;

# Model
use App\Channel;

# Facades
use Illuminate\Support\Facades\Hash;

use Yish\Generators\Foundation\Service\Service;

class ChannelService
{
    protected $repository;

    public function update($request, $id)
    {
        $channel = Channel::findOrFail($id);
        $channel->name = $request->name;
        $channel->password = Hash::make($request->password);
        $channel->save();
    }
}
