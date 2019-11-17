<?php

require('modele/model.php');

function modifyUser($type,$id)
{
  $modify = getModifyUser($type,$id);

  header('Location: index.php');

}

function deleteUser($id){

  $delete = getDeleteUser($id);

  header('Location: index.php');
}

function dataUser()
{
  $user = getUser();
  $dataconnexion = getDataConnexion();

  require('vue/admin_user.php');
}
