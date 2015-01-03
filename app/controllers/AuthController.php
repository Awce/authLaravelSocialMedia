<?php
class AuthController extends BaseController {

  public function showLogin()
  {
    if (Auth::check())
    {
      //return Redirect::to('/');
      return Redirect::to('dash');
    }
    return View::make('login');
  }

  public function postLogin()
  {
    $data = [
      'username' => Input::get('username'),
      'password' => Input::get('password')
    ];

    if (Auth::attempt($data, Input::get('remember')))
    {
      var_dump('entro');
      return View::make('auth/dash');
    }
    return Redirect::back()->with('error_message', 'Invalid data')->withInput();
  }

  public function logout()
  {
    Auth::logout();
    return Redirect::to('login')->with('error_message', 'Logged out correctly');
  }

  public function showWelcome()
  {
    return View::make('auth/dash');
  }

  public function registerUser()
  {
    return View::make('register');
  }
}
