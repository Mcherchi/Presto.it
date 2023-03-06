<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Announcement extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'body', 'price'];

    /**
     * Get the indexable data array for the model
     * 
     * @return array
     */

    public function toSearchableArray()
    {
        $category=$this->category;
        $array = [
            'id'=> $this->id,
            'title'=> $this->title,
            'body' => $this->body,
            'category' => $category,
        ];
        return $array;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

      public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    public function setRejectionReason($reason)
    {
        $this->rejection_reason = $reason;
    }

    public static function toBeRevisionedCount(){
        $revisor = Auth::user();
        return Announcement::where('is_accepted', null)
                            ->where('user_id', '!=', $revisor->id)
                            ->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
