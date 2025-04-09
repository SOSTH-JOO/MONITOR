<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\PasswordHistory;
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
        // Gérer la soumission du formulaire de connexion


        // Handle the login logic



        public function showLogin(Request $request)
        {
            $credentials = $request->only('email', 'password');
            $user = User::where('email', $credentials['email'])->first();

            if (!$user) {
                return back()->with('message', 'Aucun utilisateur trouvé avec cet email.')->withInput();
            }

            if (!Hash::check($credentials['password'], $user->password)) {
                // Incrémenter la colonne failed_login
                $user->increment('failed_login');
                return back()->with('message', 'Mot de passe incorrect.')->withInput();
            }

            if ($user->statut != 1) {
                return back()->with('message', 'Votre compte est inactif ou dormant. Veuillez contacter l’administrateur.')->withInput();
            }

            // Vérifier si une session est déjà ouverte pour cet utilisateur dans la table sessions
            $sessionExists = \DB::table('sessions')
                                ->where('user_id', $user->id)
                                ->exists();

            if ($sessionExists) {
                return back()->with('message', 'Une session est déjà ouverte pour cet utilisateur.')->withInput();
            }

            // Vérification de la date du dernier changement de mot de passe
            if (is_null($user->password_change_at) || Carbon::parse($user->password_change_at)->diffInDays(now()) > 30) {
                // Générer un slug basé sur l'ID utilisateur
                $slug = base64_encode($user->id); // Encode l'ID utilisateur en base64 pour créer le slug
                session(['slug_user_' . $slug => $user->id]); // Associer l'ID à ce slug dans la session
                return redirect()->route('new.password', ['slug' => $slug]);
            }

            // Authentification réussie
            $user->update([
                'last_login' => now(),
                'failed_login' => '0'
            ]);
            Auth::login($user, $request->remember);

            return redirect()->intended('/dashboard/accueil');
        }









        public function new_password($slug)
        {
            // Décoder le slug
            $decodedSlug = base64_decode($slug);

            // Vérifier si la session contient bien le slug
            if (session()->has('slug_user_' . $slug)) {
                $userId = session('slug_user_' . $slug);
                $user = User::find($userId);

                if ($user) {
                    return view('auth.new_password', [
                        'user' => $user,
                        'slug' => $slug
                    ]);
                }
            }

            return redirect()->route('login')->with('error', 'Utilisateur introuvable ou lien expiré.');
        }









        public function updatePassword(Request $request, $slug)
        {
            // Validation du formulaire
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:8|confirmed', // Assurez-vous que le mot de passe est confirmé et d'une longueur minimum
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Récupérer l'utilisateur
            $user = User::find($request->user_id);

            if (!$user) {
                return redirect()->route('login')->with('error', 'Utilisateur introuvable.');
            }

            // Vérifier si le nouveau mot de passe existe dans les 10 derniers mots de passe
            $lastPasswords = PasswordHistory::where('user_id', $user->id)
                                             ->orderBy('created_at', 'desc')
                                             ->take(10)
                                             ->pluck('password')
                                             ->toArray();

            // Si le nouveau mot de passe existe dans les 10 derniers, empêcher la mise à jour
            if (in_array($request->password, $lastPasswords)) {
                return redirect()->back()->with('message', 'Ce mot de passe a déjà été utilisé récemment. Veuillez en choisir un autre.');
            }

            // Hachage du nouveau mot de passe
            $newHashedPassword = $request->password;

            // Mise à jour du mot de passe
            $user->password = $newHashedPassword;
            $user->password_change_at = Carbon::now();
            $user->failed_login = 0; // Réinitialiser le compteur d'échecs
            $user->save();

            // Enregistrement du mot de passe dans l'historique
            PasswordHistory::create([
                'user_id' => $user->id,
                'password' => $newHashedPassword
            ]);

            return redirect()->route('login')->with('success', 'Mot de passe mis à jour avec succès.');
        }


}
