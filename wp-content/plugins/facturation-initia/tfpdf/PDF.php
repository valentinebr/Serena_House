<?php

require_once('tfpdf.php');

class PDF extends tFPDF
{

    //En-tête
    function enTete($societe, $nomFact)
    {
        $position = 0;
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->AddFont('DejaVu','B','DejaVuSansCondensed-Bold.ttf',true);

        //Adresse
        $this->SetXY(10,15);
        $this->SetFont('DejaVu','', 12);
        $this->MultiCell(70,5,$societe[0]->nom_ste."\n".$societe[0]->adresse_ste."\n".$societe[0]->code_postal_ste.' '. $societe[0]->ville_ste."\n".$societe[0]->telephone_ste,0,'L', false);

        //Adresse de facturation
        $this->SetXY(100,40);
        $this->SetFont('DejaVu', 'B', 12);
        $this->Cell(90,6,"Adresse de facturation",1,2,'C', false);
        $this->SetFont('DejaVu', '',12);
        $this->MultiCell(90,5,"Initia SAS\nLe lénard\n31370 FORGUES\nhttps://initia.io", 'LRB', 'L', false);

        //Informations facture
        $this->SetFont('DejaVu','', 12);
        $this->SetXY(10,75);
        $this->MultiCell(130,5,"Facture : ". $nomFact);
        $this->SetTitle($nomFact);

        $position= $this->getY();

    }

    //Préparation de la génération de la table
    function tableArticles($post, $nth, $services, $cartesVoyage) {
        $position = 0;
        $prixTotalTaxe=0;
        $prixTotalHorsTaxes=0;
        $totalCommission = 0;

        $this->SetY(95);

        //Création des données qui seront contenues dans la table
        $datas = array();

        foreach($nth as $n) {
            if ($post['nb-nuitees-'.$n->id_nuitee]) {
                $totalHT = $n->tarif_nuitee * floatval($post['nb-nuitees-' . $n->id_nuitee]);
                $datas[] = array($n->nom_nuitee, $n->reference_nuitee, number_format($n->tarif_nuitee,2,","," ").'€', $post['nb-nuitees-' . $n->id_nuitee], number_format($totalHT,2,","," ").'€', number_format($totalHT,2,","," ").'€');
                $prixTotalHorsTaxes += $totalHT;
                $prixTotalTaxe += $totalHT*$n->taux_taxe/100;
                $totalCommission += $totalHT;
            }
        }

        foreach ($services as $s) {
            if ($post['nb-service-'.$s->id_tsrv]) {
                $totalHT = $s->prix_ht_tsrv * floatval($post['nb-service-' . $s->id_tsrv]);
                $commission = $totalHT * 0.91;
                $datas[] = array($s->nom_tsrv, $s->reference_tsrv, number_format($s->prix_ht_tsrv,2,","," ").'€', $post['nb-service-' . $s->id_tsrv], number_format($totalHT,2,","," ").'€', number_format($commission,2,","," ").'€');
                $prixTotalHorsTaxes += $totalHT;
                $prixTotalTaxe+=$totalHT*$s->taux_taxe/100;
                $totalCommission += $commission;
            }
        }

        foreach($cartesVoyage as $cv) {
            $totalHT = $cv->tarif_tcv;
            $commission = $totalHT*0.09;
            $datas[]=array($cv->nom_tcv, $cv->code, number_format($cv->tarif_tcv,2,","," ").'€', 1, number_format($totalHT,2,","," ").'€', number_format($commission,2,","," ").'€');
            $prixTotalHorsTaxes+=$totalHT;
            $prixTotalTaxe+=$totalHT*$cv->taux_taxe/100;
            $totalCommission += $commission;
        }

        //Tableau contenant les titres des colonnes
        $header = array('Service', 'Réf.', 'Prix unitaire HT', 'Qté', 'Prix total HT', 'Commission');
        //Tableau contenant la largeur des colonnes
        $w = array(65,30,30,20,23,23);
        //Tableau contenant le centrage des colonnes
        $al = array('C', 'L', 'C', 'C', 'C', 'C');

        //Génération de la table
        $this->table($header, $w, $al, $datas);

        //On se positionne en dessous de la table pour écrire le total
        $this->setY($this->GetY()+5);

        $this->SetX(138);
        $this->Cell(44,6,"Total Hors Taxes", 1,0,'L');
        $this->Cell(19,6,number_format($prixTotalHorsTaxes,2,","," ").'€',1,2,'C');

        $this->SetX(138);
        $this->Cell(44,6,"TVA",1,0,'L');
        $this->Cell(19,6,number_format($prixTotalTaxe,2,","," ").'€',1,2,'C');
        $totalTTC = $prixTotalHorsTaxes + $prixTotalTaxe;
        $this->SetX(138);
        $this->Cell(44,6,"Total TTC", 1,0,'L');
        $this->Cell(19,6,number_format($totalTTC,2,","," ").'€',1,2,'C');
        $this->SetX(138);
        $this->Cell(44,6,"Total commission", 1,0,'L');
        $this->Cell(19,6,number_format($totalCommission,2,","," ").'€',1,2,'C');
    }


    //Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-18);
        // Police Arial italique 8
        $this->SetFont('DejaVu','',8);
        // Numéro de page
        $this->Cell(0,4,'Page '.$this->PageNo().'/{nb}',0,2,'C');
        $this->MultiCell(0,2,"initia SAS :: Le lénard, 31370 Forgues, France :: passeig Arenal, 38, 08552 Tona, Catalunya, España\n
        initia@initia.io :: https://www.initia.io :: TVA EU : FR26 884352238", 0, 'C', false);
    }

    //Impression de l'en-tête du tableau
    function printTableHeader($header, $w) {
        //Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(200,200,200);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetFont('DejaVu', 'B', 9);
        for($i=0;$i<count($header);$i++) {
            $this->Cell($w[$i], 7, $header[$i], 1,0,'C', 1);
        }
        $this->Ln();

        //Restauration des couleurs et de la police pour les données du tableau
        $this->SetTextColor(0);
        $this->SetFont('DejaVu');
    }

    //Génération du tableau
    //table(données de l'en-tête tableau, largeur des colonnes, alignement des colonnes, données)
function table($header, $w, $al, $datas) {
        //Impression de l'en-tête tableau
    $this->SetLineWidth(.3);
    $this->printTableHeader($header, $w);

    $posStartX = $this->getX();
    $posBeforeX = $posStartX;

    $posBeforeY = $this->getY();
    $posAfterY = $posBeforeY;
    $posStartY = $posBeforeY;

    //On parcoure le tableau des données
    foreach($datas as $row) {
        $posBeforeX = $posStartX;
        $posBeforeY = $posAfterY;

        //on vérifie qu'il n'y a pas de débordement de page
        $nb=0;
        for($i=0; $i<count($header); $i++) {
            $nb=max($nb, $this->NbLines($w[$i], $row[$i]));
        }
        $h = 6*$nb;

        //On effectue un saut de page s'il y a débordement
        $resultat= $this->CheckPageBreak($h, $w, $header, $posStartX, $posStartY, $posAfterY);
        if($resultat>0) {
            $posAfterY=$resultat;
            $posBeforeY = $resultat;
            $posStartY = $resultat;
        }

        //Impression de la ligne
        for ($i=0; $i<count($header); $i++) {
            $this->MultiCell($w[$i], 6, strip_tags($row[$i]), '', $al[$i], false);
            //On enregistre la plus grande hauteur de cellule
            if ($posAfterY<$this->getY()) {
                $posAfterY=$this->getY();
            }
            $posBeforeX+=$w[$i];
            $this->setXY($posBeforeX, $posBeforeY);
        }

        //Tracé de la ligne du dessous
        $this->Line($posStartX, $posAfterY, $posBeforeX, $posAfterY);
        $this->SetXY($posStartX, $posAfterY);
    }

    //Tracé des colonnes
    $this->PrintCols($w, $posStartX, $posStartY, $posAfterY);
}

//Tracé des colonnes
function PrintCols($w, $posStartX, $posStartY, $posAfterY) {
        $this->Line($posStartX, $posStartY, $posStartX, $posAfterY);
        $colX = $posStartX;
        //On trace la ligne pour chaque colonne
        foreach ($w as $row) {
            $colX+=$row;
            $this->Line($colX, $posStartY, $colX, $posAfterY);
        }
}

//Vérification du débordement de page
function CheckPageBreak ($h, $w, $header, $posStartX, $posStartY, $posAfterY) {
        //Si la hauteur h provoque un débordement, saut de page manuel
    if ($this->GetY()+$h>$this->PageBreakTrigger) {
        //On imprime les colonnes de la page actuelle
        $this->PrintCols($w, $posStartX, $posStartY, $posAfterY);
        //On ajoute une page
        $this->AddPage();
        //On réimprime l'en-tête du tableau
        $this->printTableHeader($header, $w);
        //On renvoie la position courante sur la nouvelle page
        return $this->GetY();
    }
    //On a pas effectué de saut on renvoie 0
    return 0;
}

//Calcule le nombre de lignes qu'occupe un MultiCell de largeur w
function NbLines($w ,$txt) {
        $cw =& $this->CurrentFont['cw'];
        if($w==0) {
            $w = $this->w-$this->rMargin-$this->x;
        }
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r","",$txt);
        $nb=strlen($s);
        if($nb>0 && $s[$nb-1] == "\n") {
            $nb--;
        }
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;

        while ($i<$nb) {
            $c=$s[$i];
            if($c=="\n") {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if ($c==' ') {
                $sep=$i;
            }
//            $l+= $cw[$c];
            $l +=1;
            if($l>$wmax) {
                if ($sep==-1) {
                    if($i == $j) {
                        $i++;
                    }
                } else {
                    $i = $sep+1;
                }
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            } else {
                $i++;
            }
            return $nl;
        }
}
}