<?php
require('fpdf/fpdf.php');
include('connect.php');

//SÃ©lection de la police
$pdf= new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetCreator('PHP');
$pdf->SetAuthor('William pour A.B.Vins\'Amour');
$pdf->SetSubject('Facture');
$str = utf8_decode($type.' numÃ©ro '.$shuffled);
$pdf->SetTitle($str);
$pdf->SetFont('Arial','','12');
//sigle de la sociÃ©tÃ©
$pdf->Image('images/sigle.jpg','24','20','43','40','jpg');

//SociÃ©tÃ© et ses coordonnÃ©es
$pdf->Text(70,'30',$varnom);
$pdf->Text('70','36',$varadresse1);
$pdf->Text('70','42',$varadresse2);
$pdf->Text('70','48',$vartelephone);
$pdf->Text('70','54',$vartva);

//coordonnÃ©es du client
$pdf->Text(140,'30',utf8_decode($client['0']));
$pdf->Text(140,'36',utf8_decode($client['1']));
$pdf->Text(140,'42',utf8_decode($client['2']));
$pdf->Text(140,'48',utf8_decode($client['3']));
$pdf->Text(140,'54',utf8_decode($client['4']));
$pdf->Text(140,'60',utf8_decode($client['5']));

//type de document
$str = utf8_decode($type.' '.$shuffled);
$pdf->Text(24,'70',$str);

//date
// On calcule le timestamp correspondant Ã  la date entrÃ©e
    $timestamp = time();
    // On rÃ©cupÃ¨re le numÃ©ro du jour correspondant au timestamp (0, 1, 2, 3...)
    $numero_jour = date('w', $timestamp);
    $numero_mois = date('F', $timestamp);
    
    // On crÃ©e un array pour numÃ©roter les jours (0 => Dimanche, 1 => Lundi...) et les mois en fonctionde leur nom anglais
    $jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $mois = array('January' => "Janvier", 'February' => 'FÃ©vrier', 'March' => 'Mars', 'April' => 'Avril', 'May' => 'Mai', 'June' => "Juin", 'July' => "Juillet", 'August' => "AoÃ»t", 'September' => 'Septembre', 'October' => 'Octobre', 'November' => "Novembre", 'December' => "DÃ©cembre");
    // On rÃ©cupÃ¨re le nom du jour et du mois en franÃ§ais grÃ¢ce aux array(s) qu'on vient de crÃ©er
    $jour = $jours[$numero_jour];
    $moiss = $mois[$numero_mois];

    
    // Puis on affiche le rÃ©sultat
$date = 'Le '.$jour.' '.date('d').' '.$moiss.' '.date('Y');

$str = utf8_decode($date);
$pdf->Text(140,'70',$str);

$pdf->SetXY(24,75);
$str = utf8_decode('DÃ©nomination');
$pdf->SetFont('Arial','B','12');
$pdf->Cell(54,10,$str,1,0,'C');
$pdf->Cell(27,10,"Prix Unitaire",1,0,'C');
$pdf->Cell(27,10,utf8_decode("QuantitÃ©"),1,0,'C');
$pdf->Cell(27,10,utf8_decode("Taux TVA"),1,0,'C');
$pdf->Cell(27,10,utf8_decode("Prix HTVA"),1,2,'C');
$pdf->SetFont('Arial','','12');

define('EURO', chr(128));
$retour = mysql_query('SELECT COUNT(*) AS nb FROM fromage');
$donnees2 = mysql_fetch_array($retour);

$i2 = $donnees2['nb'];
$i = 1;
$i3 = 1;
$tot = 0;

while($i <= $i2)
{
$oui = $_POST['oui'.$i];
if($oui == $i)
{
$pdf->SetXY(24,78+$i3*7);
$retour = 'SELECT * FROM fromage WHERE ID = '.$i;
$donnees1 = mysql_query($retour);
$donnees = mysql_fetch_array($donnees1);

$pdf->Cell(54,7,utf8_decode($donnees['nom']),1,0);
$pdf->Cell(27,7,utf8_decode($donnees['prix']),1,0);
$prix = $donnees['prix'] * $_POST['quantite'.$i];
$pdf->Cell(27,7,utf8_decode($_POST['quantite'.$i]),1,0);
$pdf->Cell(27,7,utf8_decode($donnees['TVA'] . '%'),1,0);
$pdf->Cell(27,7,utf8_decode(round($prix, 2)),1,2);
$i3++;
$tot = $tot + $prix;
}
$i++;

}
if($i3 > 17)
{
$pdf->AddPage();
$i3 = 0;
}

/*
for($i = $i3 ; $i <21 ; $i++)
{
$pdf->SetXY(24,78+$i*7);
$pdf->Cell(54,7,'',1,0,'C');
$pdf->Cell(27,7,"",1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,2,'C');
}
*/


$pdf->SetFont('Arial','B','14');

$pdf->Text(140,240,utf8_decode('TOTAL HTVA: '.round($tot,3). EURO));
$pdf->SetXY(24,247);
$pdf->Cell(29,7,utf8_decode(""),0,0,'C');
$pdf->Cell(29,7,utf8_decode("TVA $vartauxtva1%"),1,0,'C');
$pdf->Cell(29,7,utf8_decode("TVA $vartauxtva2%"),1,0,'C');
$pdf->Cell(29,7,utf8_decode("TOTAL"),1,2,'C');
$pdf->SetXY(24,254);
$pdf->Cell(29,7,utf8_decode("Total HTVA"),1,2,'C');
$pdf->Cell(29,7,utf8_decode("TVA"),1,2,'C');
$pdf->Cell(29,7,utf8_decode("Total"),1,2,'C');
$pdf->SetXY(53,254);
$pdf->SetFont('Arial','','14');
$pdf->Cell(29,7,round(utf8_decode($tot6),2),1,0,'C');
$pdf->Cell(29,7,round(utf8_decode($tot21),2),1,0,'C');
$pdf->Cell(29,7,round(utf8_decode($tot),2),1,2,'C');
$pdf->SetXY(53,261);
$pdf->Cell(29,7,round(utf8_decode($TVA6),2),1,0,'C');
$pdf->Cell(29,7,round(utf8_decode($TVA21),2),1,0,'C');
$pdf->Cell(29,7,round(utf8_decode($TVA),2),1,2,'C');
$pdf->SetXY(53,268);
$pdf->Cell(29,7,round(utf8_decode($total6),2),1,0,'C');
$pdf->Cell(29,7,round(utf8_decode($total21),2),1,0,'C');
$pdf->SetFont('Arial','UBI','14');
$pdf->Cell(29,7,round(utf8_decode($total),3),1,2,'C');
$pdf->Text(140,268,utf8_decode('TOTAL TVAC: '.round($total,3). EURO));
$pdf->SetFont('Arial','','14');
$str = utf8_decode("$varbanque Communication:");
$pdf->Text(24,285,$str);
$pdf->SetFont('Arial','I','14');
$str = utf8_decode($client['0'] .' '. $type .' '. $shuffled);
$pdf->Text(120,285,$str);
$pdf->Output("pdf/".$shuffled.".pdf","F");
echo "<a href=\"pdf/".$shuffled.".pdf\">Pdf de la facture</a>";
?>
