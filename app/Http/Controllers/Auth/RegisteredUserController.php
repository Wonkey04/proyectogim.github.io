<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Group;
use App\Models\UserGroups;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{


    
    /**
     * Display the registration view.
     */
     public function create(): View
    {
        
// Obtén la lista de roles desde el modelo Rol
    $groups = Group::with('group')->get();
  
    $sql = 'SELECT * FROM sucursal';
   
    $sucursal = DB::select($sql);
    
    
    //return $products;
    //$sucursal = Sucursal::with('sucursal')->get();
    return view('auth.register', compact('groups','sucursal'));
    
    
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
        public function store(Request $request) 
        {
            $request->validate([
                'name' => ['required', 'string', 'max:30'],
                'surname' => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'id_groups' => ['required', 'int', 'max:30'],
                'id_sucursal' => ['required', 'int', 'max:30']
            ]);
            
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'groups_id' => $request->id_groups,
                'id_sucursal' => $request->id_sucursal
            ]);
        
            // Asegúrate de que las columnas sean las correctas
            $user->userGroups()->create([
                'groups_id' => $user->groups_id,
                'id_usuario' => $user->id
            ]);
        
            $user->save();
            Auth::login($user);
        
            return view('dashboard');
        }
     
    /*
     public function store(Request $request) 
    {
        $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'surname'=>['required','string','max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'groups_id'=>['required','int','max:30'],
            'id_sucursal'=>['required','int','max:30']
            
             
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'surname'=>$request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'groups_id' =>$request->groups_id,
            'id_sucursal'=>$request->id_sucursal

        
        ]);
        $user->userGroups()->create([
            'groups_id' => $request->groups_id,
            'id_usuario' => $user->id
        ]);
        */
    /*   $user->groups_id()->create([
            'groups_id' => $request->groups_id, // Ajusta según tus necesidades
            'id_sucursal'=>$request->id_sucursal
        ]);
      
        $user_groups = new UserGroups();
        $user_groups->groups_id = $request->id_groups;
        $user_groups->id_sucursal=$request->id_sucursal;
        $user_groups->save();
        event(new Registered($user));
        
        $user->save();
        Auth::login($user);

       return view('dashboard');

    }
*/
    public function registro(Request $request) {

        $datos = new Request();


    }
}
