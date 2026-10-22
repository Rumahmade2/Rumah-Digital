<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $isSeller = $request->role === 'penjual';

        $rules = [
            'name'        => ['required', 'string', 'max:255'],
            'role'        => ['required', 'in:penjual,pembeli'],
            'avatar'      => ['image', 'mimes:jpeg,png,jpg'],
            'occupation'  => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'    => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        // Validasi rekening hanya jika penjual
        if ($isSeller) {
            $rules['bank_name']          = ['required', 'string', 'max:255'];
            $rules['bank_account']       = ['required', 'string', 'max:255'];
            $rules['bank_account_number']= ['required', 'numeric', 'min:0'];
        }

        $request->validate($rules);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        } else {
            $avatarPath = 'images/default-avatar.svg';
        }

        $userData = [
            'name'       => $request->name,
            'role'       => $request->role,
            'avatar'     => $avatarPath,
            'occupation' => $request->occupation,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ];

        // Simpan rekening hanya untuk penjual
        if ($isSeller) {
            $userData['bank_name']           = $request->bank_name;
            $userData['bank_account']        = $request->bank_account;
            $userData['bank_account_number'] = $request->bank_account_number;
        }

        $user = User::create($userData);

        event(new Registered($user));

        return redirect(route('login'))
            ->with('status', 'Akun berhasil dibuat! Silakan masuk dengan email dan password kamu.');
    }
}
