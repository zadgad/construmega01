<?php

namespace App\Http\Controllers;
use App\Models\Usr;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Usr_Rol;
use App\Models\Rol;
use DB;
use Carbon\Carbon;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\FormRequest;

class contrumega extends Controller
{

public function formureg(){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){


    return view('construm.formuemp');

        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');
}
public function listaempre(){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){

            $selec=DB::table('empresa')->where('activo_em','=',1)->select('id_emp','nomb_emp','nit','direccion','telefon','ciudad','imagen')->get();
            return view('construm.tabla_empre',compact('selec'));
        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');
}
public function emplempresa(){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){

            $selec=DB::table('empresa')->join('usr','id_usr','usr_id')->join('persona','ci','ci_per')->where('activo_em','=',1)->select('id_emp','empresa.nomb_emp','empresa.nit','empresa.direccion','empresa.telefon','empresa.ciudad','empresa.imagen','persona.ci','persona.nombre')->get();
            return view('construm.list_emplemp',compact('selec'));
        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');

}
public function editempre(Request $request,$id){

    if(session()->get('id')??''){

        $this->validate(
            $request,
            [   'foto'=>'image',

                'name' =>'required|string|max:255',
                'lastN'=>'required|digits_between:6,12',
                'lastM'=>'required|digits_between:6,12',
                'login'=>'required|string|max:255',
                'provin'=>'required|string|max:255',
                'cordenada'=>'required|string|max:600'
            ] );
            $aux=$id;
            $empr=$request->input('name');
            $nit=$request->input('lastN');
            $tele=$request->input('lastM');
            $dire=$request->input('login');
            $provi=$request->input('provin');
            $cord=$request->input('cordenada');
            $tel=$request->input('telefono');
            $ina=request()->except('_token');

            if(!empty($ina['Foto'])){

                 $loca=$ina['Foto']->store('uploads','public');

                 $update=DB::table('empresa')->where('id_emp','=',$aux)->update(['nomb_emp'=>$empr,'nit'=>$nit,'direccion'=>$dire,'telefon'=>$tele,'ciudad'=>$provi,'imagen'=>$loca,'cordenada'=>$cord]);
                 return redirect()->route('verempre',$aux) ->with('info');

                }else{
                $update=DB::table('empresa')->where('id_emp','=',$aux)->update(['nomb_emp'=>$empr,'nit'=>$nit,'direccion'=>$dire,'telefon'=>$tele,'ciudad'=>$provi,'cordenada'=>$cord]);
                return redirect()->route('verempre',$aux) ->with('info');


             }


    }else {
        return redirect()->route('login') ->with('info');
     }
}
public function vistaremp(){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){

            $idus=session()->get('id')->first();
            $counts=DB::table('empresa')->join('agendar_visita','empre_id','id_emp')->where('usr_id','=',$idus)->where('visit','=',1)->count();
            $bol=DB::table('agendar_visita')->join('empresa','id_emp','empre_id')->where('usr_id','=',$idus)->pluck('visit');
            $selec=DB::table('empresa')->join('agendar_visita','empre_id','id_emp')->join('usr','id_usr','usr_id')->join('persona','ci','ci_per')->where('visit','=',1)->where('usrid','=',$idus)->select('id_emp','empresa.nomb_emp','empresa.nit','empresa.direccion','empresa.telefon','empresa.ciudad','empresa.imagen','persona.ci','persona.nombre')->get();
            return view('construm.visitas',compact('selec','counts'));

        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');

}
public function editarempre(){

}
public function designar(){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){

                $selec=DB::table('empresa')->select('nit','empresa.nomb_emp')->get();
                $empl=DB::table('persona')->join('usr','ci_per','ci')->join('usr_rol','usr_id','id_usr')->join('rol','id_rol','rol_id')->where('id_rol','=',3)->select('ci_per','nombre','apepa')->get();

                return view('construm.designar',compact('selec','empl'));

        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');
}
public function insertd(Request $request){
    $this->validate(
        $request,
            [
                'subp'=>'required|digits_between:6,10',
                'codigo'=>'required|digits_between:6,10',

                ] );

                $empr=$request->input('subp');
                $usr=$request->input('codigo');

                $selec=DB::table('empresa')->where('nit','=',$empr)->select('id_emp','nomb_emp')->get();
                $val=$selec[0]->id_emp;
                $val1=$selec[0]->nomb_emp;
                $date = Carbon::now();
                $datf = $date->format('Y-m-d');
                $empl=DB::table('usr')->where('ci_per','=',$usr)->pluck('id_usr')->first();
                $count=DB::table('agendar_visita')->where('empre_id','=',$val)->where('visit','=',1)->count();
                if($count==1){
                    $udp=DB::table('agendar_visita')->update(['usrid'=>$empl]);
                }else{
                    $insert=DB::table('agendar_visita')->insert(['nomb_emp'=>$val1,'visit'=>1,'fecha_v'=>$datf,'usrid'=>$empl,'empre_id'=>$val]);
                }
                return redirect()->route('designarV')
                ->with('info');

}
public function registrarempre(Request $request){
    $this->validate(
        $request,
            [
                'proyect'=>'required|string|max:255',
                'provin'=>'required|string|max:255',
                'nit'=>'required|integer',
                'direc' =>'required|string|max:255',
                'telef'=>'required|integer',
                'corde'=>'required|string|max:600',
                'Foto'=>'image'

                ] );
                $numbemp=$request->input('proyect');
                $provi=$request->input('provin');
                $nit=$request->input('nit');
                $direc=$request->input('direc');
                $telefo=$request->input('telef');
                $cord=$request->input('corde');
                $foto=$request->input('Foto');
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        // return view('superU.users');
                        $consul=DB::table('empresa')->where('nit','=',$nit)->count();
                        $ina=request()->except('_token');
                        $id_us=session()->get('id')->first();
                        if($consul==0){

                        if(!empty($ina['Foto'])){
                                $inser=DB::table('empresa')->insert(['nomb_emp'=>$numbemp,'ciudad'=>$provi,'nit'=>$nit,'direccion'=>$direc,'imagen'=>$foto,'telefon'=>$telefo,'usr_id'=>$id_us,'activo_em'=>1,'cordenada'=>$cord]);

                            } else{
                            $inser=DB::table('empresa')->insert(['nomb_emp'=>$numbemp,'ciudad'=>$provi,'nit'=>$nit,'direccion'=>$direc,'telefon'=>$telefo,'usr_id'=>$id_us,'activo_em'=>1,'cordenada'=>$cord]);

                        }
                      }else{
                        return back()->with('Mensaje', 'La Empresa ya esta registrado o el NIT coinside');

                      }
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');


}
public function solitempre(Request $request){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){

            $idus=session()->get('id')->first();
            $counts=DB::table('empresa')->join('agendar_visita','empre_id','id_emp')->where('usr_id','=',$idus)->where('visit','=',1)->count();

            $bol=DB::table('agendar_visita')->join('empresa','id_emp','empre_id')->where('usr_id','=',$idus)->pluck('visit');

            $selec=DB::table('empresa')->join('usr','id_usr','usr_id')->join('persona','ci','ci_per')->where('activo_em','=',1)->where('usr_id','=',$idus)->select('id_emp','empresa.nomb_emp','empresa.nit','empresa.direccion','empresa.telefon','empresa.ciudad','empresa.imagen','persona.ci','persona.nombre')->get();

            return view('construm.solicitar',compact('selec','counts'));

        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');
}
public function formulgen(){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){
            $idus=session()->get('user_rol');
            if($idus[0] == 1){
                $rol=4;
                $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                return view('construm.formugen',compact('rol'));
            }
             else{
                $rol=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                return view('users.create',compact('rol'));
            }
        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');
}
public function intgeneral(Request $request){

    $this->validate(
        $request,
            [
                'proyect'=>'required|string|max:255',
                'provin'=>'required|string|max:255',
                'nit'=>'required|digits_between:6,25',
                'direc' =>'required|string|max:255',
                'telef'=>'required|digits_between:6,10',
                'corde'=>'required|string|max:600',
                'Foto'=>'image',
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'CI'=>'required|digits_between:6,12',
                'email' => 'required|string|email|max:255|unique:usr,email',
                'telefono' =>'required|digits_between:6,12',
                'password' => 'required|string:password_confirmation|min:6|confirmed',
                ] );
                $numbemp=$request->input('proyect');
                $provi=$request->input('provin');
                $nit=$request->input('nit');
                $direc=$request->input('direc');
                $telefo=$request->input('telef');
                $cord=$request->input('corde');
                $foto=$request->input('Foto');
               //--------------------
               $name=$request->input('name');
               $last_name=$request->input('apelliP');
               $last_ape=$request->input('apelliM');
               $ci = $request->input('CI');
               $email=$request->input('email');
               $tel=$request->input('telefono');
               $pas=$request->input('password');
               $password=sha1($pas);
               $pass=$request->input('password_confirmation');
               $passwordR=sha1($pass);
               $ids=4;
               $prueba=DB::table('usr')->where('usr.ci_per','=',$ci)->count();
               $prueba1=DB::table('usr')->where('usr.email','=',$email)->count();
               $ina=request()->except('_token');
                   //dd($request->file('Foto'));
               if(!empty($ina['Foto'])){

                   //dd($request->file('Foto'));
                   $loca=$ina['Foto']->store('uploads','public');
                 if($prueba < 1 || $prueba1<1){
                   if ($prueba<1) {
                       if ($prueba1<1) {
                        if($password==$passwordR){
                            $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                            $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'foto'=>$loca ,'ci_per'=>$ci,'telefono'=>$tel]);

                            //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                            //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                            $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                            //return $insertpersona." user".$insertuser."get ".$getuser;
                            $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                            foreach ($getuser as $key => $value) {
                                DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$ids]);
                               //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                                 DB::table('password_resets')->insert(['email'=>$email,'token'=>$password,'id_us'=>$id[0]]);
                                 $inser=DB::table('empresa')->insert(['nomb_emp'=>$numbemp,'ciudad'=>$provi,'nit'=>$nit,'direccion'=>$direc,'foto'=>$loca ,'telefon'=>$telefo,'usr_id'=>$id[0],'activo_em'=>1,'cordenada'=>$cord]);

                                break;
                            }
                         }else
                         {
                           return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                         }
                       }else{
                           return back()->with('Mensaje', 'El CI ya esta registrado');

                       }
                       return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                     }else{
                       return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                     }
                     return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                   }
           }else{
               if($prueba < 1 || $prueba1<1){
                   if ($prueba<1) {
                       if ($prueba1<1) {
                        if($password==$passwordR){
                            $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                            $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'ci_per'=>$ci,'telefono'=>$tel]);

                            //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                            //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                            $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                            //return $insertpersona." user".$insertuser."get ".$getuser;
                            $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                            foreach ($getuser as $key => $value) {
                                DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$ids]);
                               //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                                 DB::table('password_resets')->insert(['email'=>$email,'token'=>$password,'id_us'=>$id[0]]);
                                 $inser=DB::table('empresa')->insert(['nomb_emp'=>$numbemp,'ciudad'=>$provi,'nit'=>$nit,'direccion'=>$direc,'telefon'=>$telefo,'usr_id'=>$id[0],'activo_em'=>1,'cordenada'=>$cord]);

                                break;
                            }
                         }else
                         {
                           return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                         }
                       }else{
                           return back()->with('Mensaje', 'El CI ya esta registrado');

                       }
                       return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                     }else{
                       return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                     }
                     return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                   }

           }
}
 public function registvis($id){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){
            $idus=session()->get('id');
            $selec=DB::table('empresa')->join('usr','id_usr','usr_id')->join('persona','ci','ci_per')->where('activo_em','=',1)->where('usr_id','=',$idus)->select('id_emp','empresa.nomb_emp','empresa.nit','empresa.direccion','empresa.telefon','empresa.ciudad','empresa.imagen','persona.ci','persona.nombre')->get();

            $val=$selec[0]->id_emp;
            $val1=$selec[0]->nomb_emp;
            $date = Carbon::now();
            $datf = $date->format('Y-m-d');
            $empl=DB::table('usr_rol')->where('rol_id','=',3)->select('usr_id')->get();
            $count=count($empl);
            $ind_al=mt_rand(0,$count-1);
            $empleado=$empl[$ind_al]->usr_id;
            $insert=DB::table('agendar_visita')->insert(['nomb_emp'=>$val1,'visit'=>1,'fecha_v'=>$datf,'usrid'=>$empleado,'empre_id'=>$val]);
            return redirect()->route('solitvisita')
            ->with('info');
        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');
 }
 public function prueba(){
            $ids=session()->get('id');
            $datos=DB::table('empresa')->where('usr_id','=',$ids)->select('id_emp','nomb_emp','nit','direccion','telefon','ciudad','imagen', 'cordenada')->first();
            return view('construm.prueba',compact('ids','datos'));
 }
 public function registrarV($id){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){
            $ids=$id;
            $datos=DB::table('empresa')->where('id_emp','=',$ids)->select('id_emp','nomb_emp','nit','direccion','telefon','ciudad','imagen', 'cordenada')->first();
            return view('construm.prueba',compact('ids','datos'));

        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');
 }
 public function registvisitas($id){
    if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){
                $ides=$id;
            $update=DB::table('agendar_visita')->where('empre_id','=',$ides)->update(['visit'=>0]);
            return redirect()->route('visitas')->with('info');

        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');

 }

}
