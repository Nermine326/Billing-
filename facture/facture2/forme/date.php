<?php
  
    // On calcule le timestamp correspondant Ã  la date entrÃ©e
    $timestamp_naissance = time();
    // On rÃ©cupÃ¨re le numÃ©ro du jour correspondant au timestamp (0, 1, 2, 3...)
    $numero_jour = date('w', $timestamp_naissance);
    
    // On crÃ©e un array pour numÃ©roter les jours (0 => Dimanche, 1 => Lundi...)
    $jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    // On rÃ©cupÃ¨re le nom du jour en franÃ§ais grÃ¢ce Ã  l'array qu'on vient de crÃ©er
    $jour_naissance = $jours[$numero_jour];
    
    // Puis on affiche le rÃ©sultat
    //echo '<p>Le '.$jour_naissance.' '.date('d/m/Y').'</p>';
$date = date('d/m/Y');
echo $date;
?>
