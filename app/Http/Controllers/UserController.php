<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function create()
    {
        return view('register');
    }
    

    public function register(Request $request)
{
    try {
      
         // Validating input with custom messages
         $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'nullable|string|in:admin,user',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 3 characters.',
            'username.required' => 'Username is required.',
            'username.unique' => 'This username is already taken.',
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Passwords do not match.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Allowed image formats: jpeg, png, jpg, gif.',
            'image.max' => 'Image size must not exceed 2MB.',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Hash password before storing
        $validatedData['password'] = Hash::make($request->password);

        // Create user
        $user = User::create($validatedData);

        // Log successful registration
        Log::info('User registered successfully', ['user_id' => $user->id]);

        // Store user session
        Session::put('user', $user);
        Session::put('user_id', $user->id);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');

    } catch (\Exception $e) {
        // Log the exact error for debugging
        Log::error('Registration failed: ' . $e->getMessage());

        return back()
            ->withInput($request->except('password', 'password_confirmation')) // Exclude password for security
            ->with('error', 'Registration failed. Please try again.');
    }
}

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        try {
            // Validate the request
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ], [
                'email.required' => 'Email address is required.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters.',
            ]);
    
            // Check if the user exists
            $user = User::where('email', $request->email)->first();
    
            if (!$user) {
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => 'No account found with this email.']);
            }

            // Attempt authentication
            if (Auth::attempt($credentials, $request->filled('remember'))) {
                // Regenerate session for security
                $request->session()->regenerate();

                $user = Auth::user();


                // Log successful login
                \Log::info('User logged in successfully', ['user_id' => Auth::id()]);

             

                
                  return redirect()->back()->with('success', 'Welcome back, ' . $user->name . '!');


            }

            
            return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'The provided credentials are incorrect.',
                'password' => 'The provided credentials are incorrect.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Login error: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors(['error' => 'An error occurred during login. Please try again.']);
        }
    }

   /* public function logout(Request $request)
    {
        try {
            // Clear user session data
            Session::flush();
            Auth::logout();

            // Invalidate the session
            $request->session()->invalidate();

            // Regenerate CSRF token
            $request->session()->regenerateToken();

            return redirect('/login')
                ->with('success', 'You have been successfully logged out.');

        } catch (\Exception $e) {
            \Log::error('Logout error: ' . $e->getMessage());
            
            return redirect()->back()
                ->withErrors(['error' => 'An error occurred during logout.']);
        }
    }*/
}
