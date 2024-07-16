<?php

namespace App\Core\Funnel;

use App\Core\Funnel;

class FunnelRepository
{
    public function getFunnel($user_id)
    {
        return Funnel::where('user_id', $user_id)->paginate(10);
    
    }
}