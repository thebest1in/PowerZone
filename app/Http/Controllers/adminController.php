<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{

    public function utilisateur(){
        $g=DB::select("select id,nom,prenom,email,role from users where role != 'admin'");
        return view("admin.utilisateur.utilisateur",["utilisateur"=>$g]);
    }
    public function deleteUtilisateur($n){
        DB::delete("delete from users where id = ?",[$n]);
        return redirect("/admin/utilisateur");
    }
    public function ajouterUtilisateur(Request $request){
        $r=DB::select("select * from users");
        $nom=$request->input("nom");
        $prenom=$request->input("prenom");
        $role=$request->input("role");
        $email=$request->input("email");
        $password=$request->input("password");
        $c=$request->input("confirmer");
        
        if($password == $c){
            foreach($r as $i){
                if($i->email==$email){
                    return redirect("/admin/utilisateur")->with('danger',"Email est dégà utilisée ");
                }   
            }
            DB::insert("insert into users (nom,prenom,role,email,password) value(?,?,?,?,?)",[$nom,$prenom,$role,$email,$password]);
            return redirect("/admin/utilisateur");
        }else{
            return view('admin.utilisateur.ajouterU',["error"=>"la confirmation est inccorect"]);
        }
    }

    
    public function compteAdmin(){
        $rs=DB::select("select * from users where role='admin' ");
        return view("admin.compte.compte",["admin"=>$rs]);
    }
    public function updateAdmin(Request $request){
        $nom=$request->input("nom");
        $prenom=$request->input("prenom");
        $email=$request->input("email");
        $password=$request->input("password");
        $c=$request->input("confirmer");
        if($password == $c){
            $data=DB::select("select * from users");
            foreach($data as $i){
                if($i->email==$email){
                    return redirect("/admin/compte")->with('danger',"Email est dégà utilisée ");
                }   
            }
            DB::update("update users set  nom=? , prenom=? , email=? , password=? where role='admin' ",[$nom,$prenom,$email,$password]);
            return redirect("/admin");
        }else{
            $rs=DB::select("select * from users where role='admin' ");
            return view("admin.compte.compte",["admin"=>$rs,"error"=>"la confirmation est inccorect"]);
        }
        
    }
}
