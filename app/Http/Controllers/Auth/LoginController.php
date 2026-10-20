<?php 
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function show()
    {
       return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }

   public function commitNewPassword(Request $request)
    {   
    $fields = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = \App\Models\User::where('email', $fields['email'])->first();

    if (! $user) {
        return back()
            ->withErrors(['email' => 'No account found with that email address.'])
            ->onlyInput('email');
    }

    $user->update([
        'password' => \Illuminate\Support\Facades\Hash::make($fields['password']),
    ]);

    return redirect()->route('login')
        ->with('status', 'Password changed successfully! Please log in.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}