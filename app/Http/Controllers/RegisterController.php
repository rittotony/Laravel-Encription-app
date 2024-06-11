<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'gender' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $input = $request->all();
        $input['email'] = $this->encodeData($input['email']);
        $input['gender'] = $this->encodeData($input['gender']);
        $input['password'] = $this->encodeData($input['password'], "password");
        Register::create($input);
        return redirect()->back()->with('flash_message', 'Registered Successfully!');

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $input = $request->all();
        $providedEmail = $input['email'];

        // Fetch all users and decrypt emails for comparison
        $user = null;
        $users = Register::all();

        foreach ($users as $record) {
            if (Crypt::decryptString($record->email) === $providedEmail) {
                $user = $record;
                break;
            }
        }

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'The provided email does not match our records.'])->withInput();
        }

        if (!Hash::check($input['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.'])->withInput();
        }

        return redirect()->route('welcome')->with('flash_message', 'Login Successful!');

        //return view('welcome');
    }
    
    public function encodeData($data, $type = null)
    {
        return $type === "password" ? Hash::make($data) : Crypt::encryptString($data);
    }
    
    

   
}