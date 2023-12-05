<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyfonUser extends Model
{
    use HasFactory;

    protected $table = 'tyfon_users';

    // Impostiamo 'cf' come chiave primaria
    protected $primaryKey = 'cf';

    // Disabilitiamo l'incremento automatico poiché 'cf' è una stringa
    public $incrementing = false;

    // Specifica il tipo della chiave primaria come stringa
    protected $keyType = 'string';

    public $timestamps = false;

    public function setCfAttribute($value)
    {
        if (empty($value) && !empty($this->piva)) {
            $this->attributes['cf'] = $this->piva;
        } else {
            $this->attributes['cf'] = $value;
        }
    }

    protected $fillable = [
        'cf',
        'id_lead',
        'cognome',
        'nome',
        'ragsoc',
        'piva',
        'telefono',
        'email',
        'indirizzo',
        'civico',
        'cap',
        'comune',
        'provincia',
        'note',
        'tipo_utenza',
        'tipo_intervento',
        'tipologiaProdotto',
        'codiceVenditore',
        'codiceMetanoNord',
    ];

    public function appointments()
    {
        return $this->hasMany(TyfonAppointment::class, 'cf');
    }

    public function contracts()
    {
        return $this->hasMany(TyfonContract::class, 'cf');
    }
}
