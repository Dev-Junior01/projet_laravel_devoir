<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventes extends Model
{
    use HasFactory;
    protected $fillable =['client_id','immobilier_id'];
    
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
    public function ImmeubleVendre()
    {
        return $this->belongsTo(Immobilier::class,'immobilier_id');
    }
}
