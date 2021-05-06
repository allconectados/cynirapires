<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();

    }

    public function redirectProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $emailAdministration = DB::table('administrations')->where('email', '=', $providerUser->getEmail())->first();
        $emailProatec = DB::table('proatecs')->where('email', '=', $providerUser->getEmail())->first();
        $emailCoordination = DB::table('coordinations')->where('email', '=', $providerUser->getEmail())->first();
        $emailSecretary = DB::table('secretaries')->where('email', '=', $providerUser->getEmail())->first();
        $emailTeacher = DB::table('teachers')->where('email', '=', $providerUser->getEmail())->first();
        $emailStudent = DB::table('students')->where('email', '=', $providerUser->getEmail())->first();

        if ($emailProatec) {
            $user = User::firstOrCreate(['email' => $providerUser->getEmail()], [
                'code' => uniqid(),
                'name' => $providerUser->getName() ?? $providerUser->getNickname(),
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'avatar' => $providerUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('modules.proatecs.dashboard');
        } elseif ($emailAdministration) {
            $user = User::firstOrCreate(['email' => $providerUser->getEmail()], [
                'code' => uniqid(),
                'name' => $providerUser->getName() ?? $providerUser->getNickname(),
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'avatar' => $providerUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('modules.administrations.dashboard');
        } elseif ($emailCoordination) {
            $user = User::firstOrCreate(['email' => $providerUser->getEmail()], [
                'code' => uniqid(),
                'name' => $providerUser->getName() ?? $providerUser->getNickname(),
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'avatar' => $providerUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('modules.coordinations.dashboard');
        } elseif ($emailSecretary) {
            $user = User::firstOrCreate(['email' => $providerUser->getEmail()], [
                'code' => uniqid(),
                'name' => $providerUser->getName() ?? $providerUser->getNickname(),
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'avatar' => $providerUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('modules.secretaries.dashboard');
        } elseif ($emailTeacher) {
            $user = User::firstOrCreate(['email' => $providerUser->getEmail()], [
                'code' => uniqid(),
                'name' => $providerUser->getName() ?? $providerUser->getNickname(),
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'avatar' => $providerUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('modules.teachers.dashboard');
        } elseif ($emailStudent) {
            $user = User::firstOrCreate(['email' => $providerUser->getEmail()], [
                'code' => uniqid(),
                'name' => $providerUser->getName() ?? $providerUser->getNickname(),
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'avatar' => $providerUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('modules.students.dashboard');
        } else {
            $user = User::firstOrCreate(['email' => $providerUser->getEmail()], [
                'code' => uniqid(),
                'name' => $providerUser->getName() ?? $providerUser->getNickname(),
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'avatar' => $providerUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('modules.visitants.dashboard');
        }


//        if ($providerUser->getEmail() === 'jccarneiros@gmail.com') {
//            return redirect()->route('dashboard.admins');
//        } else {
//            if ($providerUser->getEmail() == $emailUser){
//                $emailDomain = explode('@', $providerUser->getEmail());
//                switch ($emailDomain[1]) {
//                    case "servidor.educacao.sp.gov.br":
//                        return redirect()->route('dashboard.administrations');
//                        break;
//                    case "prof.educacao.sp.gov.br":
//                        return redirect()->route('dashboard.teachers');
//                        break;
//                    case "al.educacao.sp.gov.br":
//                        return redirect()->route('dashboard.students');
//                        break;
//                    case "gmail.com":
//                        return redirect()->route('dashboard.visitants');
//                        break;
//                }
//            }else{
//                return redirect()->back();
//            }
//        }
    }
}
