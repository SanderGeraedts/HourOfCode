<?php
/**
 * Created by PhpStorm.
 * User: sander
 * Date: 1-1-17
 * Time: 16:26
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function postSignUp(Request $request) {
        $email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        $user->save();

        return redirect()->back();
    }

    public function postSignIn(Request $request) {

    }
}