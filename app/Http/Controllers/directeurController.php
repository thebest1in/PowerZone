<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class directeurController extends Controller
{
    
    public function statistique(){
        $data=DB::select("select nomAct,count(*) as nb from activites a inner join tarif t on t.idAct=a.idAct inner join typeAbonnements ta on ta.idAb=t.idAb inner join abonnements ab on ab.idAb=ta.idAb group by nomAct");
        
        return view('directeur.statistique.statistique',['data'=>$data]);
    }

    
    public function revenu(Request $request){
        $dateD=$request->input("dateMin");
        $dateF=$request->input("dateMax");
        if($dateF < $dateD){
            $rs=DB::select("select sum(montant) as prixTotal from paiement where dateP between ? and ? ",[$dateF,$dateD]);
            return view("directeur.revenu.revenu",["revenu"=>$rs,'dateD'=>$dateD,'dateF'=>$dateF]);
        }else{
            $rs=DB::select("select sum(montant) as prixTotal from paiement where dateP between ? and ? ",[$dateD,$dateF]);
            return view("directeur.revenu.revenu",["revenu"=>$rs,'dateD'=>$dateD,'dateF'=>$dateF]);
        }
        
    }


    public function compteDirecteur(){
        session_start();
        $rs=DB::select("select * from users where id=? ",[$_SESSION['id']]);
        return view("directeur.compte.compte",["directeur"=>$rs]);
    }
    public function updateDirecteur(Request $request){
        session_start();
        $nom=$request->input("nom");
        $prenom=$request->input("prenom");
        $email=$request->input("email");
        $password=$request->input("password");
        $c=$request->input("confirmer");
        if($password == $c){
            $data=DB::select("select * from users");
            foreach($data as $i){
                if($i->email==$email){
                    return redirect("/directeur/compte")->with('danger',"Email est dégà utilisée ");
                }   
            }
            DB::update("update users set  nom=? , prenom=? , email=? , password=? where id=? ",[$nom,$prenom,$email,$password,$_SESSION['id']]);
            return redirect("/directeur");
        }else{
            $rs=DB::select("select * from users where role='admin' ");
            return view("directeur.compte.compte",["directeur"=>$rs,"error"=>"la confirmation est inccorect"]);
        }
    }
}
