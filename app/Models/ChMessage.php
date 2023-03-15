<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Chatify\Traits\UUID;
use Illuminate\Support\Facades\Auth;

class ChMessage extends Model
{
    use UUID;

    public static function chMessageCount()
    {
        $user = Auth::user();       
        return ChMessage::where('to_id','=', $user->id)
                        ->where('seen', '!=', '1')
                        ->count();                     
    }
}


