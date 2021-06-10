function Verifier_formulaire(formulaire){
   if (formulaire.nom.value == "" || formulaire.prenom.value == "" || formulaire.adresse.value == "" || formulaire.login.value == "" || formulaire.MDP.value == ""){
      alert ("Remplissez tous les champs");
   } else {
      formulaire.submit();
   }
}