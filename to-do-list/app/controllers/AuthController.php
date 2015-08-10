<?php
	
	class AuthController extends Controller {
		public function getlogin() {
			return View::make('login');
		}
		public function postlogin() {
			$rules = array('username' => 'required', 'password' => 'required');
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails()) {
				return Redirect::route('login')->withErrors($validator);
			} 

			$auth = Auth::attempt(array(
				'name' => Input::get('username'),
				'password' => Input::get('password'),
				), false);

			if (!$auth) {
				return Redirect::route('login')->withEroors(array(
					'Invalid credentials were provided.'
					));
			}

			return Redirect::route('home');
		}
	} 