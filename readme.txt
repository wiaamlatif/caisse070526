$role= array( 0 => "", //..
              1 => "Vendeur",  //../employes/index.php              
              2 => "Admin");  //../admin/index.php
              
Pour ne pas afficher les boites de dialogues lors de l'impression des tickets:
google chrome shortcut -> proprités -> cible ->
add to the last of line a blank space and after add
--kiosk-printing

Voici le code HTML et JavaScript nécessaire pour permettre à l'utilisateur
de sélectionner une image via un formulaire et d'afficher immédiatement
cette image en aperçu sur la mêmepage (renvoyer l'image au formulaire)
avant l'envoi final au serveur.
Le code utilise l'objet FileReader de JavaScript pour lire le contenu
du fichier sélectionné localement dans le navigateur. 

Pour transférer une image lue par FileReader en JavaScript à un script PHP,
vous devez utiliser une requête AJAX.

Le code  d'une requête AJAX pour transferer une image lue par FileReader en JavaScript à un script PHP ? 

if (window.File && window.FileReader && window.FileList && window.Blob) 
    document.write("<b>API File reconnue.</b>");
else
    document.write('<i>API File non reconnue par ce navigateur.</i>');

Javacript / sessionStorage : 
=-=-=-=-=-=-=-=-=-=-=-=-=-=-
for (let i = 0; i < sessionStorage.length; i++) {
    const cle = sessionStorage.key(i);
    const valeur = sessionStorage.getItem(cle);
    console.log(`${cle}: ${valeur}`);
}  

var_dump:
=-=-=-=-=
echo "<pre>"; 
var_dump($user);
echo "</pre>"; 

<?php include'C:\htdocs\front\product\dropDownCategory.php'; ?>

<?php include'dropDownVendeur.php'; ?>

To do :
=-=-=-=
- X et Z employe .
=====================
Le 02/12/25
A faire : 
- Remplir le ticket  OK
- Imprimer le ticket NO
======================
Le 06/12/25
A faire :
- Ajouter un ticket 
- Imprimer un ticket.
=====================
Le 15/12/25
- Python:
  Download ver 3.14.2 64 bits
  video Apprendre Python
  CodeAvecJonathan
  vision 0 => 42' ...

 Using HTML Entities (Inline Spacing)
 ====================================
  <p>This has five&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;spaces.</p>

 => Le Jeudi 26/03/26 Reprise de la programmation de la caisse.
   ============================================================

   Terminer le front side  puis Terminer le BackSide .

   Front Side => Nav  => Category => Affiche les produits de chaque Category .

   => Le Vendredi 02/04/26
      ====================
       Laravel 10 Ecommerce Project In darija arabic - Jamaoui Mouad

       toolfk.com -> A general site of A.I.

    => Samedi 04/04/26 Impression Ticket 
       var_dump($_SESSION) 

    => Lundi 06/04/26 Impression Ticket

       copie console :
       script.js:384 Array(5)

      window.addEventListener("afterprint", (event) => {
        console.log("After print");
      });

    => Vendredi 10/04/26  Impression Ticket
       > Connexion (Ouvrir session user et choix du vendeur )
       > User doit etre un vendeur ou admin .

       <a class="nav-link btn disabled bg-primary text-white active" href=<?=$urlNav[1]?> >Vente</a>

    => Lundi 13/04/26
       RDV Youssef Bobinage -> Cafe -> Projet de collaboration
       connexion -> table user -> idUser
       Dans la table "Employee" , Ajouter IdUser avec  role = 2 dans table "user"
       Dans nav.php desable vente si deconnexion .
   
    => Vendredi 17/04/26
       > programme Caisse / Factoriser le prgm, Creer repertoire print .
       > Mettre de l'ordre dans le fichier script.js
       ATTENTION ! : Dans layout.php, content doit contenir le tag html body.
                     onload body active differentes fonctions :
                      - startTime(),
                      - printTicketCaisse() dans C:\print\tablePrintTicket.php

    => Samedi 18/04/26 (... Suite actions du 17/04/26)

    => Lundi 20/04/26
       Mettre de l'ordre dans le programme ... 

    => Lundi 27/04/26
       fix problem file connexion.php post => POST in FORM !

    => Mardi Clean app Caisse ...

      //Dans connexion.php => role 
      //$role= array( 0 => "", //..
      //              1 => "Admin",  //../employes/index.php              
      //              2 => "Vendeur");  //../admin/index.php

    => Samedi 02/05/26
       Prgm Caisse, Fixer probleme affichage btn category

    => Mardi 05/05/26
       im using in php layout, the layout file don't accept a variable $content ?

    Mercredi 06/05/26
      php  A variable is defined in index.php not recognized in layout.php
       

    





