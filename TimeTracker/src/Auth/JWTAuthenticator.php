<?php 
namespace TimeTracker\Auth;
use JWTAuth;
use Validator;
use App\User;
use Auth;
use Hash;

class JWTAuthenticator {

	/**
	 * API Login with JWT.
	 * @param  array
	 * @return array
	 */
	public function apiLogin($credentials){
		$validation = $this->validateCredentials($credentials);
		if($validation->fails()){
			return response()->json(['error' => $validation->errors()->all()], 401);
		}
		if(!$credentials) return response()->json(['error' => 'Invalid E-mail Address or Password.', 401]);
		$token = false;

		try {
			$token = JWTAuth::attempt($credentials);
		    if (!$token) return response()->json(['error' => 'Invalid E-mail Address or Password.'], 401);
		} catch (\JWTException $e) {
		    return response()->json(['error' => 'Could not create token.'], 500);
		}
		$user = Auth::user();
		$userdata = [
			'id' => $user->id,
			'username' => $user->username,
			'name' => $user->name,
			'email' => $user->email
		];

		return response()->json(compact('token', 'userdata'));
	}

	protected function validateCredentials($credentials){
		$rules = [
			'email' => 'required',
			'password' => 'required',
		];

		return Validator::make($credentials, $rules);
	}

}