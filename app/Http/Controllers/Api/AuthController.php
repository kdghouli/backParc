<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class AuthController extends Controller
{
    public function register(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|max:255|unique:users',
            'password'  => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        Mail::to($user->email)->send(new \App\Mail\LoginCreateMail());
        return response()->json([
            'data'          => $user,
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    public function login(Request $request, User $user)
    {

        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|email|max:255',
            'password'  => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User not found'
            ], 401);
        }


        $user   = User::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer',
            'user' => $user
        ]);
    }








    public function logout()
    {

        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        try {
            // Revoke all tokens for the authenticated user
            $user->currentAccessToken()->delete();
        } catch (\Exception $e) {
            // Log the exception for investigation
            \Illuminate\Support\Facades\Log::error('Token revocation failed: ' . $e->getMessage());

            return response()->json(['error' => 'Unable to revoke tokens'], 500);
        }

        return response()->json(['message' => 'Tokens revoked successfully']);
    }



    public function getUsers()
    {

        $users   = User::all();

        return $users;
    }
    // Mettre à jour le profil de l'utilisateur
    public function updateProfile(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', // 10MB max
        ]);

        // Récupérer l'utilisateur actuel
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Mettre à jour les informations de l'utilisateur
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        // Gérer l'image de profil
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            // Stocker la nouvelle image
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
        }

        // Sauvegarder les modifications
        $user->save();

        // Retourner l'URL complète de l'image
        $user->image_url = $user->image ? asset("storage/{$user->image}") : null;

        return response()->json([
            'message' => 'Profil mis à jour avec succès',
            'user' => $user,
        ], 200);
    }
}


// <?php

// namespace App\Http\Controllers\API;

// use Illuminate\Http\Request;
// use App\Http\Controllers\API\BaseController as BaseController;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;
// use Validator;
// use Illuminate\Http\JsonResponse;

// class RegisterController extends BaseController
// {
//     /**
//      * Register api
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function register(Request $request): JsonResponse
//     {
//         $validator = Validator::make($request->all(), [
//             'name' => 'required',
//             'email' => 'required|email',
//             'password' => 'required',
//             'c_password' => 'required|same:password',
//         ]);

//         if($validator->fails()){
//             return $this->sendError('Validation Error.', $validator->errors());
//         }

//         $input = $request->all();
//         $input['password'] = bcrypt($input['password']);
//         $user = User::create($input);
//         $success['token'] =  $user->createToken('MyApp')->plainTextToken;
//         $success['name'] =  $user->name;

//         return $this->sendResponse($success, 'User register successfully.');
//     }

//     /**
//      * Login api
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function login(Request $request): JsonResponse
//     {
//         if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
//             $user = Auth::user();
//             $success['token'] =  $user->createToken('MyApp')->plainTextToken;
//             $success['name'] =  $user->name;

//             return $this->sendResponse($success, 'User login successfully.');
//         }
//         else{
//             return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
//         }
//     }
// }
