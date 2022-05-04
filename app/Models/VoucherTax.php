<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherTax extends Model
{
    use HasFactory;
    
    protected $fillable = ['tax_id'];

    public function tax(){
        return $this->belongsTo(Tax::class);
    }
}
