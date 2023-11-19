<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class  PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
    public function forget(Request $request){
        $this->validate($request,[
            'email'=>['required','email']
        ]);
        $success = 2;
        $user = User::query()->where('email', $request->email)->first();
        if(empty($user)){
            return redirect()->back()->with('error', 'Email không tồn tại');
        }else{
            $passwordNew = generateRandomString();
            $user->update([
                'password'=> Hash::make($passwordNew),
            ]);
            $mail = new ForgetPassword($user, $passwordNew);
            Mail::to($user->email)->send($mail);
            return view('user.account.success', compact('success'));
        }
    }
    public function updatePass(Request $request){
        $this->validate($request, [
            'password_old'=>['required'],
            'password'=>['required','confirmed'],
        ]);
        $success = 1;

        $user = User::query()->where('email', $request->email)->first();
        if (password_verify($request->password_old, $user->password)) {
            $user->update([
                'password'=> Hash::make($request->password),
            ]);
            return view('user.account.success', compact('success'));
        }else{
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
        }
    }
}
