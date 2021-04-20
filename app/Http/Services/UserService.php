<?php 

namespace App\Http\Services;

use App\Models\User;

class UserService {
    
    public function index()
    {
        return User::with('institution', 'role')->get();
    }

    public function update($id, $userData)
    {
        $user = User::findOrFail($id);
        if(isset($userData["password"])) {
            $userData["password"] = bcrypt($userData["password"]);
        }
        $user->update($userData);
        return $user;
    }

}