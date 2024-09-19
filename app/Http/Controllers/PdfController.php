<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index($n) 
    {
        $rs=DB::select("select nom,prenom,dateAbonnement,prixActuel,dateP,nomAct from adherent a inner join abonnements ab on ab.num=a.num
        inner join typeAbonnements ta on ta.idAb=ab.idAb inner join tarif t on t.idAb=ta.idAb inner join activites ac on t.idAct=ac.idAct
        inner join paiement p on p.num=ab.num where ab.num=?",[$n]);

        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("L", ['130', '200']);
        $this->fpdf->Image('logo.png',140,3, 50);
        $this->fpdf->Ln(40);
        $this->fpdf->Cell(0, 10, "recu de paiement" ,1,0,'C');
        $this->fpdf->Ln(15);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Cell(0, 10, "Nom et Prenom : ".$rs[0]->nom." ".$rs[0]->prenom);
        $this->fpdf->Ln(7);
        $this->fpdf->Cell(0, 10, "Prix : ".$rs[0]->prixActuel." dhs"); 
        $this->fpdf->Ln(7);
        $this->fpdf->Cell(0, 10, "Date de paiement : ".$rs[0]->dateP); 
        $this->fpdf->Ln(7);
        $this->fpdf->Cell(0, 10, "Activite : ".$rs[0]->nomAct);
        $this->fpdf->Ln(7);
        $this->fpdf->Cell(0, 10, "Date d'abonnement : ".$rs[0]->dateAbonnement);     

        $this->fpdf->Output();

        exit;
    }
}
