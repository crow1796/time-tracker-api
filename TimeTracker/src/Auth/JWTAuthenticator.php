<?php 
namespace TimeTracker\Auth;
use JWTAuth;
use Validator;
use App\Models\V1\User;
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
			return response()->json(['status' =>false, 'error' => $validation->errors()->all()], 200);
		}
		if(!$credentials) return response()->json(['status' =>false, 'error' => 'Invalid E-mail Address or Password.', 200]);
		$token = false;

		try {
			$token = JWTAuth::attempt($credentials);
		    if (!$token) return response()->json(['status' =>false, 'error' => 'Invalid E-mail Address or Password.'], 200);
		} catch (\JWTException $e) {
		    return response()->json(['status' =>false, 'error' => 'Could not create token.'], 500);
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