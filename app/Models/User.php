<?php

namespace App\Models;

use Hautelook\Phpass\PasswordHash;

class User extends BaseModel
{
    /**
     * Get the quotes for the user.
     */
    public function quotes()
    {
        return $this->hasMany('App\Models\Quote');
    }

    public static function addNew($data)
    {
        $user = new self();

        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];

        $passwordHasher = new PasswordHash(8,false);
        $user->password = $passwordHasher->HashPassword($data['password']);

        $user->save();

        return $user->id;
    }
}
