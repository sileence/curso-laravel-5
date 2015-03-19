<?php namespace Course;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'email', 'password', 'type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    // Queries

    /**
     * Filtrado y paginación de usuarios
     * @param $name
     * @param $type
     * @return mixed
     */
    public static function filterAndPaginate($name, $type)
    {
        return User::name($name)
            ->type($type)
            ->orderBy('id', 'DESC')
            ->paginate();
    }
    public function profile()
    {
        return $this->hasOne('Course\UserProfile');
    }

    /**
     * Seteo del password encriptado
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    /**
     * Query Scope para buscar por tipo de usuario
     * @param $query
     * @param $type
     */
    public function scopeType($query, $type)
    {
        $types = trans('options.types');

        if($type != '' && isset($types[$type]) )
        {
            $query->where('type', $type);
        }
    }

    /**
     * Query Scope para buscar por full_name
     * @param $query
     * @param $name
     */
    public function scopeName($query, $name)
    {
        if(trim($name) != '')
        {
            $query->where('full_name', 'LIKE', "%$name%");
        }
    }

    /**
     * Sobrescribimos el método save para que siempre tengamos el campo full_name
     */
    public function save()
    {
        // El valor de full_name lo generamos concatenando first_name y last_name
        $this->full_name = trim($this->first_name . ' ' . $this->last_name);

        parent::save();
    }



}
