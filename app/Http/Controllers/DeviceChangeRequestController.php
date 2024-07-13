<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use App\Models\DeviceChangeRequest;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DeviceChangeRequestController extends Controller {
    public function store(Request $request) {
        $user = User::where('username', $request->input('username'))->first();
        
        if ($user && Hash::check($request->input('password'), $user->password)) {
            DeviceChangeRequest::create([
                'user_id' => $user->id,
                'full_name' => $request->input('full_name'),
                'username' => $request->input('username'),
                'password' => $user->password
            ]);
            return response()->json(['message' => 'Request submitted successfully'], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    public function approve($request_id) {
        $deviceChangeRequest = DeviceChangeRequest::find($request_id);

        if ($deviceChangeRequest) {
            Device::where('user_id', $deviceChangeRequest->user_id)->delete();
            $deviceChangeRequest->delete();
            
            return response()->json(['message' => 'Device change approved'], 200);
        }

        return response()->json(['error' => 'Request not found'], 404);
    }
}
