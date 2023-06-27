<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editperfilController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('avatars', $filename, 'public');

            $user->avatar = $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'Avatar uploaded successfully.'); 
    }

    

    public function update(Request $request)
    {
        {
            $request->validate([
                'current_password' => 'required', //Valida la contraseña actual
                'new_password' => 'required|min:8|confirmed', //Requerimientos de la nueva contraseña
            ]);
    
            $user = Auth::user(); //Obtiene usuario logeado
    
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'La contraseña actual no coincide.'); //Verifica si las 2 contraseñas son iguales
            }
    
            $user->password = Hash::make($request->new_password); //Actualiza la contraseña
            $user->save(); //Guardar
    
            return redirect()->back()->with('success', 'Contraseña cambiada exitosamente.');
        }
    }
}



