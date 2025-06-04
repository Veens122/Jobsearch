<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    //
    // first step

    protected function forgotPassword()
    {
        return view('auth.passwords.forgot-password');
    }

    // second step
    function sendEmail($email, $code)
    {
        $data = array(
            'body' => $code,
        );

        $view = 'emails.password_reset';

        try {
            // Mail::to($email)->send(new PasswordResetMail ($code));

            Mail::send($view, $data, function ($message) use ($email) {
                $message->to($email, 'Jobsearch')->subject('Jogsearch Reset Password');
                $message->from('vdvprlorqtqoojrt');
            });
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }




    // third step
    protected function forgetPassword(Request $request)
    {
        $activation_code = random_int(100000, 999999);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            try {

                $user->activation_code = $activation_code;
                $user->save();
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
            $this->sendEmail($user->email, $activation_code);
            return redirect()->route('confirmCode.email', ["user_email" => $user->email]);
        }
    }

    // fourth step

    protected function confirmCode()
    {
        return view('auth.passwords.confirm_code', ['email' => request()->user_email]);
    }

    // fifth step
    protected function submitPasswordResetCode(Request $request)
    {
        $code = $request->code;
        $email = $request->user_email;

        $account = User::where('email', $email)->first() ?? false;
        if ($account) {
            if ($code == $account->activation_code) {
                $account->activation_code = null;
                return redirect()->route('password-reset', ['user_email' => $email]);
            } else {
                return redirect()->route('confirmCode.email', ["user_email" => $email])->with('error', 'invalid code');
            }
        }
    }

    // sixth step
    protected function passwordReset()
    {
        return view('auth.passwords.reset', ['email' => request()->user_email]);
    }

    // seventh step


    protected function createNewPassword(Request $request)
    {
        // $request->validate([

        // ]);

        if ($request->password !== $request->confirm_password) {
            return redirect()->back()->with('error', 'passwords do not match');
        } else {

            $password = Hash::make($request->password);
            // dd($password);
            $user = User::where('email', $request->user_email)->first();
            // dd($user);


            try {

                $user->password = $password;
                $user->save();
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

            return redirect()->route('login')->with('message', 'Password successfully rest, please login');
        }
    }

    // eighth step
    // resend code
    protected function resendCode($email)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->activation_code = rand(100000, 999999);
            $user->save();

            Mail::to($user->email)->send(new OtpMail($user->activation_code));
            return redirect()->back()->with('message', 'A new OTP has been sent');
        }
    }
}
