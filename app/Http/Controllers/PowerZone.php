<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PowerZone extends Controller
{
    public function index(){
        $act=DB::select("select * from activites");
        $ab=DB::select("select nomAct,nomAb,duree,prixActuel from tarif T inner join typeAbonnements ty on ty.idAb=T.idAb inner join activites a on T.idAct=a.idAct limit 3");
        $an=DB::select("select * from annonces where curdate() between dateDebut and dateFin");
        $emG=DB::select("select nomgroupe,jour,heurFin,heurDebut from sence s inner join groupe g on g.idgroupe=s.idgroupe");
        $emM=DB::select("select nom,prenom,jour,heurFin,heurDebut from sence s inner join moniteur m on m.codeM=s.codeM");
        $j=['lundi','mardi','mercredi','jeudi','vendredi','samedi'];

        return view("home",["activites"=>$act,"Exempleabonnements"=>$ab,"annonces"=>$an,"emploiG"=>$emG,"emploiM"=>$emM,'jeur'=>$j]);
    }
    public function indexAbonnement(){
        $ab=DB::select("select nomAct,nomAb,duree,prixActuel from tarif T inner join typeAbonnements ty on ty.idAb=T.idAb inner join activites a on T.idAct=a.idAct");
        return view("abonnements",["abonnements"=>$ab]);
    }
    public function demander(Request $request){
        $nom=$request->input("nom");
        $prenom=$request->input("prenom");
        $date_naissance=$request->input("date_naissance");
        $tel=$request->input("tel");
        $r=DB::select("select * from demande");
        foreach($r as $i){
            if($i->nom == $nom && $i->prenom == $prenom && $i->date_naissance == $date_naissance){
                return redirect("/formulaire")->with('danger','la demande est déjà exécutée! Attendez notre appel.');
            }   
        }
        DB::insert("insert into demande (nom,prenom,tel,date_naissance) value(?,?,?,?)",[$nom,$prenom,$tel,$date_naissance]);
        return redirect("/formulaire")->with('success','Merci pour le demande ! Attendez notre appel.');

    }





    public function verify(Request $request){
        $email=$request->input("email");
        $password=$request->input("password");
        $users=DB::select("select * from users");
        session_start();

        foreach($users as $user){
            if($user->email==$email && $user->password==$password){
                $_SESSION["id"] = $user->id;
                if($user->role=="admin"){
                    $_SESSION["idTest"] = 'admin';
                    return redirect("/admin");
                }if($user->role=="gestionnaire"){
                    $_SESSION["idTest"] = 'gestionnaire';
                    return redirect("/gestionnaire");
                }if($user->role=="directeur"){
                    $_SESSION["idTest"] = 'directeur';
                    return redirect("/directeur");
                }
                
            }
            
        }
        if(url("/verify")){
            return view("login",["login"=>"error! Enter email et mot de passe correct"]);
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        return redirect("/login");
    }
}
