<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gestionnaireController extends Controller
{

    public function Moniteur(){
        $m=DB::select("select codeM,nom,prenom,tel from moniteur");
        $m_act=DB::select("select codeM,nomAct from activites_moniteur am inner join activites a on am.idAct=a.idAct");
        return view("gestionnaire.moniteur.moniteur",["moniteur"=>$m,"m_act"=>$m_act]);
    }
    public function ajouterMoniteur(Request $request){
        $nom=$request->input("nom");
        $prenom=$request->input("prenom");
        $tel=$request->input("tel");
        $r=DB::select("select * from moniteur");
        foreach($r as $i){
            if($i->nom == $nom && $i->prenom == $prenom && $i->tel == $tel){
                return redirect("/ajouterMoniteur")->with('danger','le moniteur est dégà crée ');
            }   
        }
        DB::insert("insert into moniteur (nom,prenom,tel) value(?,?,?)",[$nom,$prenom,$tel]);
        return redirect("/gestionnaire/moniteur");
    }
    public function getMoniteur($n){
        $rs=DB::select("select codeM,nom,prenom,tel from moniteur where codeM=?",[$n]);
        return view("gestionnaire.moniteur.updateM",["moniteur"=>$rs]);
    }
    public function updateMoniteur(Request $request){
        $code=$request->input("code");
        $nom=$request->input("nom");
        $prenom=$request->input("prenom");
        $tel=$request->input("tel");
        DB::update("update moniteur set  nom=? , prenom=? , tel=? where codeM=? ",[$nom,$prenom,$tel,$code]);
        return redirect("/gestionnaire/moniteur");
    }
    public function deleteMoniteur($n){
        DB::delete("delete from moniteur where codeM = ?",[$n]);
        return redirect("/gestionnaire/moniteur");
    }

    
    public function Activites(){
            $act=DB::select("select idAct,nomAct from activites");
            return view("gestionnaire.activites.activites",["activites"=>$act]);
    }
    public function ajouterActivites(Request $request){
        $nom=$request->input("nom");
        $rs=DB::select('select * from activites');
        foreach($rs as $i){
            if($i->nomAct == $nom){
                return redirect("/ajouterActivites")->with('danger',"l'activité est dégà existe");
            }
        }
        DB::insert("insert into activites (nomAct) value(?)",[$nom]);
        return redirect("/gestionnaire/activites");
    }
    public function getActivite($n){
        $act=DB::select("select idAct,nomAct from activites where idAct=?",[$n]);
        return view("gestionnaire.activites.updateA",["activites"=>$act]);
    }
    public function updateActivite(Request $request){
        $code=$request->input("id");
        $nom=$request->input("nom");
        $rs=DB::select('select * from activites');
        foreach($rs as $i){
            if($i->nomAct == $nom){
                return redirect("/ajouterActivites")->with('danger',"l'activite est dégà existe");
            }
        }
        DB::update("update activites set  nomAct=? where idAct=? ",[$nom,$code]);
        return redirect("/gestionnaire/activites");
    }
    public function deleteActivite($n){
        DB::delete("delete from activites where idAct = ?",[$n]);
        return redirect("/gestionnaire/activites");
    }


    public function Abonnements(){
        $act=DB::select("select ta.idAb,nomAb,duree,prixActuel,nomAct from typeAbonnements ta inner join tarif t on ta.idAb=t.idAb inner join activites a on t.idAct=a.idAct");
        return view("gestionnaire.abonnements.abonnements",["abonnements"=>$act]);
    }
    public function viewAjouter(){
        $c=DB::select("select idAct,nomAct from activites");
        return view('gestionnaire.abonnements.ajouterA',["rs"=>$c]);
    }
    public function ajouterAbonnements(Request $request){
        $idAct=intval($request->input("idAct"));
        $nomAb=$request->input("nomAb");
        $duree=$request->input("duree");
        $prix=$request->input("prix");
        if(!empty($idAct)){
            DB::insert("insert into typeAbonnements (nomAb,duree) value(?,?)",[$nomAb,$duree]);
            $code=DB::select("SELECT LAST_INSERT_ID() as t;");
            DB::insert("insert into tarif value(?,?,?)",[$idAct,$code[0]->t,$prix]);
            return redirect("/gestionnaire/abonnements");
        }else{
            return redirect("/gestionnaire/abonnements")->with('danger',"l'ajout est impossible");;
        }
        
    }
    public function getAbonnements($n){
        $act=DB::select("select ta.idAb,nomAb,duree,prixActuel,a.idAct from typeAbonnements ta inner join tarif t on ta.idAb=t.idAb inner join activites a on t.idAct=a.idAct where ta.idAb=?",[$n]);
        $c=DB::select("select idAct,nomAct from activites");
        return view("gestionnaire.abonnements.updateA",["abonnements"=>$act,"rs"=>$c]);
    }
    public function updateAbonnements(Request $request){
        $idAct=$request->input("idAct");
        $idAb=$request->input("id");
        $nomAb=$request->input("nomAb");
        $duree=$request->input("duree");
        $prix=$request->input("prix");

        DB::update("update typeAbonnements set nomAb=?,duree=? where idAb=?",[$nomAb,$duree,$idAb]);
        DB::update("update tarif set idAct=?,prixActuel=? where idAb=?",[$idAct,$prix,$idAb]);
        return redirect("/gestionnaire/abonnements");
    }
    public function deleteAbonnements($n){
        DB::delete("delete from typeAbonnements where idAb = ?",[$n]);
        return redirect("/gestionnaire/abonnements");
    }


    public function annonces(){
        $act=DB::select("select * from annonces");
        $rs=DB::select('select * from activites');
        return view("gestionnaire.annonces.annonces",["annonces"=>$act,'activites'=>$rs]);
}
    public function ajouterAnnonces(Request $request){
        $title=$request->input("title");
        $dateD=$request->input("dateD");
        $idAct=$request->input("idAct");
        $dateF=$request->input("dateF");
        $text=$request->input("text");
        DB::insert("insert into annonces (title,dateDebut,dateFin,contenue,idAct) value(?,?,?,?,?)",[$title,$dateD,$dateF,$text,$idAct]);
        return redirect("/gestionnaire/annonces");
    }
    public function getAnnonces($n){
        $act=DB::select("select * from annonces where idAn=?",[$n]);
        $rs=DB::select('select * from activites');
        return view("gestionnaire.annonces.updateA",["annonces"=>$act,'activites'=>$rs]);
    }
    public function updateAnnonces(Request $request){
        $code=$request->input("id");
        $title=$request->input("title");
        $dateD=$request->input("dateD");
        $idAct=$request->input("idAct");
        $dateF=$request->input("dateF");
        $text=$request->input("text");
        
        DB::update("update annonces set  title=? , dateFin=? , dateDebut=? , contenue=? , idAct=? where idAn=? ",[$title,$dateD,$dateF,$text,$idAct,$code]);
        return redirect("/gestionnaire/annonces");
    }
    public function deleteAnnonces($n){
        DB::delete("delete from annonces where idAn = ?",[$n]);
        return redirect("/gestionnaire/annonces");
    }




    public function demandes(){
        $act=DB::select("select id,nom,prenom,date_naissance,tel from demande");
        return view("gestionnaire.demandes.demandes",["demandes"=>$act]);
    }
    public function deleteD($n){
        DB::delete("delete from demande where id = ?",[$n]);
        return redirect("/gestionnaire/demandes");
    }

    public function compteGestionnaire(){
        session_start();
        $rs=DB::select("select * from users where id=? ",[$_SESSION['id']]);
        return view("gestionnaire.compte.compte",["gestionnaire"=>$rs]);
    }
    public function updateGestionnaire(Request $request){
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
                    return redirect("/gestionnaire/compte")->with('danger',"Email est dégà utilisée ");
                }   
            }
            DB::update("update users set  nom=? , prenom=? , email=? , password=? where id=? ",[$nom,$prenom,$email,$password,$_SESSION['id']]);
            return redirect("/gestionnaire");
        }else{
            $rs=DB::select("select * from users where id=? ",[$_SESSION['id']]);
            return view("gestionnaire.compte.compte",["gestionnaire"=>$rs,"error"=>"la confirmation est inccorect"]);
        }
    }


    public function Groupes(){
            $g=DB::select("select * from groupe");
            return view("gestionnaire.groupes.groupes",["groupes"=>$g]);
    }
    public function adherents($n){
        $g=DB::select("select * from groupe where idgroupe=?",[$n]);
        $a=DB::select("select codeA,nomAb,nom,prenom,tel,dateNaissance from adherent ad inner join abonnements ab on ad.num=ab.num inner join typeAbonnements ta on ta.idAb=ab.idAb where idgroupe=?",[$n]);
        return view("gestionnaire.groupes.adherents",["groupes"=>$g,"adherents"=>$a]);
            
    }
    public function ajouterGroupes(Request $request){
        $n=$request->input("nom");
        DB::insert("insert into groupe (nomgroupe) value(?)",[$n]);
        return redirect("/gestionnaire/groupes");
    }
    public function getGroupes($n){
        $act=DB::select("select * from groupe where idgroupe=?",[$n]);
        return view("gestionnaire.groupes.updateG",["groupe"=>$act]);
    }
    public function updateGroupes(Request $request){
        $nom=$request->input("nom");
        $id=$request->input("id");
        DB::update("update groupe set  nomgroupe=?  where idgroupe=? ",[$nom,$id]);
        return redirect("/gestionnaire/adherents/$id");
    }
    public function deleteGroupes($n){
        DB::delete("delete from groupe where idgroupe = ?",[$n]);
        return redirect("/gestionnaire/groupes");
    }
    public function ajouterAdherents(Request $request){
        $nom=$request->input("nom");
        $idgroupe=$request->input("idgroupe");
        $prenom=$request->input("prenom");
        $dateN=$request->input("date");
        $tel=$request->input("tel");
        $idAb=$request->input("idAb");
        $prix=DB::select("select prixActuel from typeAbonnements ta inner join tarif t on t.idAb=ta.idAb where t.idAb=?",[$idAb]);
        $data=DB::select("select * from adherent ");
        
        foreach($data as $i){
            if($i->nom == $nom && $i->prenom == $prenom && $i->dateNaissance = $dateN){
                return redirect("/ajouterAdherents/$idgroupe")->with('danger',"l'adherent est dégà existe");
            }
        }
    
        DB::insert("insert into abonnements (dateAbonnement,idAb,idgroupe) value(curdate(),?,?)",[$idAb,$idgroupe]);
        $code=DB::select("SELECT LAST_INSERT_ID() as t;");
        DB::insert("insert into paiement (dateP,montant,num) value(curdate(),?,?)",[$prix[0]->prixActuel,$code[0]->t]);
        DB::insert("insert into adherent (nom,prenom,dateNaissance,tel,num) value(?,?,?,?,?)",[$nom,$prenom,$dateN,$tel,$code[0]->t]);
        return redirect("/gestionnaire/adherents/$idgroupe");
    

        
    }
    public function getAdherents($n){
        $act=DB::select("select * from adherent where codeA=?",[$n]);
        $rs=DB::select("select * from typeAbonnements");
        $ab=DB::select("select * from typeAbonnements ta inner join abonnements a on a.idAb=ta.idAb where num=?",[$act[0]->num]);
        return view("gestionnaire.groupes.updateAd",["adherent"=>$act,"rs"=>$rs,"ab"=>$ab]);
    }
    public function updateAdherents(Request $request){
        $nom=$request->input("nom");
        $codeA=$request->input("codeA");
        $prenom=$request->input("prenom");
        $dateN=$request->input("date");
        $tel=$request->input("tel");
        $idAb=$request->input("idAb");
        $num=$request->input("num");
        $ab=DB::select("select * from abonnements where num=?",[$num]);
        if($ab[0]->idAb != $idAb){
            DB::update("update abonnements set  dateAbonnement=curdate() , idAb=?  where num=? ",[$idAb,$num]);
            DB::update("update adherent set  nom=? , prenom=? , dateNaissance=? , tel=? where codeA=? ",[$nom,$prenom,$dateN,$tel,$codeA]);

        }else{
            DB::update("update adherent set  nom=? , prenom=? , dateNaissance=? , tel=? where codeA=? ",[$nom,$prenom,$dateN,$tel,$codeA]);
        }
        return redirect("/gestionnaire/adherents/".$ab[0]->idgroupe);
    }
    public function deleteAdherents($n){
        $r=DB::select("select a.num,idgroupe from adherent a inner join abonnements ab on a.num=ab.num where codeA=?",[$n]);
        DB::delete("delete from abonnements where num = ?",[$r[0]->num]);
        return redirect("/gestionnaire/adherents/".$r[0]->idgroupe);
    }
    public function paiement(){
        $rs=DB::select("select nom,prenom,tel,prixActuel,ab.num from adherent a inner join abonnements ab on ab.num=a.num
         inner join typeAbonnements ta on ta.idAb=ab.idAb inner join tarif t on t.idAb=ta.idAb
         inner join paiement p on p.num=ab.num where dateP < DATE_SUB(curdate(),interval duree month) ");
        return view('gestionnaire.paiement.paiement',['suivie'=>$rs]);
    }
    public function effectue($n){
        DB::update("update paiement set  dateP=curdate() where num=? ",[$n]);
        return redirect("/pdf/".$n);
    }


    public function Emploi(){
        $rs=DB::select('select * from sence');
        $n=DB::select('select * from groupe');
        $m=DB::select('select * from moniteur');
        $k=DB::select('select * from activites');
        $j=['lundi','mardi','mercredi','jeudi','vendredi','samedi'];
        return view("gestionnaire.sence.sence",['sences'=>$rs,'groupes'=>$n,'moniteur'=>$m,'activites'=>$k,'jeur'=>$j]);
    }
    public function viewAjouterSence(){
        $c=DB::select("select * from activites");
        $m=DB::select('select * from moniteur');
        $g=DB::select('select * from groupe');
        $j=['lundi','mardi','mercredi','jeudi','vendredi','samedi'];
        return view('gestionnaire.sence.ajouterS',["groupes"=>$g,"moniteur"=>$m,"activites"=>$c,'jeur'=>$j]);
    }
    public function ajouterSence(Request $request){
        $request->validate([
            'HD'=>'numeric|min:00.00|max:23.59',
            'HF'=>'numeric|min:00.00|max:23.59',
        ],[
            'HD.max'=>'heur est incorrect, la valeur maximal est 23.59',
            'HD.min'=>'heur est incorrect, la valeur minimal est 00.00',
            'HD.numeric'=>'heur est incorrect , heur est numeric',

            'HF.max'=>'heur est incorrect, la valeur maximal est 23.59',
            'HF.min'=>'heur est incorrect, la valeur minimal est 00.00',
            'HF.numeric'=>'heur est incorrect , heur est numeric',
        ]);

        $idAct=$request->input("idA");
        $idM=$request->input("idM");
        $idG=$request->input("idG");
        $jour=$request->input("jour");
        $HD=$request->input("HD");
        $HF=$request->input("HF");

            DB::insert("insert into sence (jour,heurFin,heurDebut,idgroupe,codeM,idAct) value(?,?,?,?,?,?)",[$jour,$HF,$HD,$idG,$idM,$idAct]);
            return redirect("/gestionnaire/emploi");
        
        
    }
    public function getSence($n){
        $rs=DB::select("select * from sence where idS=?",[$n]);
        $c=DB::select("select * from activites");
        $m=DB::select('select * from moniteur');
        $g=DB::select('select * from groupe');
        $j=['lundi','mardi','mercredi','jeudi','vendredi','samedi'];
        return view("gestionnaire.sence.updateS",["rs"=>$rs,"groupes"=>$g,'moniteur'=>$m,'activites'=>$c,'jeur'=>$j]);
    }
    public function updateSence(Request $request){
        $request->validate([
            'HD'=>'numeric|min:00.00|max:23.59',
            'HF'=>'numeric|min:00.00|max:23.59',
        ],[
            'HD.max'=>'heur est incorrect, la valeur maximal est 23.59',
            'HD.min'=>'heur est incorrect, la valeur minimal est 00.00',
            'HD.numeric'=>'heur est incorrect , heur est numeric',

            'HF.max'=>'heur est incorrect, la valeur maximal est 23.59',
            'HF.min'=>'heur est incorrect, la valeur minimal est 00.00',
            'HF.numeric'=>'heur est incorrect , heur est numeric',
        ]);

        $idAct=$request->input("idA");
        $idM=$request->input("idM");
        $idG=$request->input("idG");
        $jour=$request->input("jour");
        $HD=$request->input("HD");
        $HF=$request->input("HF");

        $idS=$request->input("idS");

        DB::update("update sence set jour=?,heurDebut=?,heurFin=?,idgroupe=?,codeM=?,idAct=? where idS=?",[$jour,$HD,$HF,$idG,$idM,$idAct,$idS]);
        return redirect("/gestionnaire/emploi");
    }
    public function deleteSence($n){
        DB::delete("delete from sence where idS = ?",[$n]);
        return redirect("/gestionnaire/emploi");
    }


}
