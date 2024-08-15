<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = ['nombre', 'calorias', 'apto_celiacos'];

    public function churros()
    {
        return $this->hasMany(Churro::class, 'id_tipo');
    }
}
