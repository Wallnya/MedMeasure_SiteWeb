 <?php
 function getNbUtilisateur(){
   $db = dbConnect();
   $requete = $db -> prepare("SELECT count(*) FROM utilisateur;");
   $nbTotal = $requete -> execute();
   return $nbTotal;
 }
 function getSexeFemme(){
   $db = dbConnect();
   $requete = $db -> prepare("SELECT count(*) FROM utilisateur WHERE Sexe = 'Femme';");
   $nbFemmes = $requete -> execute();
   return $nbFemmes;
 }
 function getSexeHomme(){
   $db = dbConnect();
   $requete = $db -> prepare("SELECT count(*) FROM utilisateur WHERE Sexe = 'Homme';");
   $nbHommes = $requete -> execute();
   return $nbHommes;
 }

 function getAge20(){
   $db = dbConnect();
   $requete = $db -> prepare("SELECT count(*) FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 20");
   $nbAge020 = $requete -> execute();
   return $nbAge020;
 }

 function getAge2030(){
   $db = dbConnect();
   $requete = $db -> prepare("SELECT count(*) FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 20 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 30");
   $nbAge2030 = $requete -> execute();
   return $nbAge2030;
 }

 function getAge3040(){
   $db = dbConnect();
   $requete = $db -> prepare("SELECT count(*) FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 30 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 40");
   $nbAge3040 = $requete -> execute();
   return $nbAge3040;
 }

function getAge4050(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 40 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 50");
  $nbAge4050 =   $requete -> execute();
  return $nbAge4050;
}

function getAge5060(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 50 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 60");
  $nbAge5060 = $requete -> execute();
  return $nbAge5060;
}

function getAge60(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 60");
  $nbAge60 = $requete -> execute();
  return $nbAge60;
}

function getNbPartiel(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testpartiel;");
  $nbPartiel = $requete -> execute();
  return $nbPartiel;
}

function getNbPartiel25(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testpartiel WHERE score < 25;");
  $nbPartiel025 = $requete -> execute();
  return $nbPartiel025;
}

function getNbPartiel2550(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testpartiel WHERE score >= 25 and score < 50;");
  $nbPartiel2550 = $requete -> execute();
  return $nbPartiel2550;
}

function getNbPartiel5075(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testpartiel WHERE score >= 50 and score < 75;");
  $nbPartiel5075 = $requete -> execute();
  return $nbPartiel5075;
}

function getNbPartiel75(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testpartiel WHERE score >= 75;");
  $nbPartiel75100 = $requete -> execute();
  return $nbPartiel75100;
}

function getNbComplet(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testcomplet;");
  $nbComplet = $requete -> execute();
  return $nbComplet;
}

function getNbComplet25(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testcomplet WHERE score < 25;");
  $nbComplet025 = $requete -> execute();
  return $nbComplet025;
}

function getNbComplet2550(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testcomplet WHERE score >= 25 and score < 50;");
  $nbComplet2550 = $requete -> execute();
  return $nbComplet2550;
}

function getNbComplet5075(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testcomplet WHERE score >= 50 and score < 75;");
  $nbComplet5075 = $requete -> execute();
  return $nbComplet5075;
}

function getNbComplet75(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*) FROM testcomplet WHERE score >= 75;");
  $nbComplet75100 = $requete -> execute();
  return $nbComplet75100;
}
?>
