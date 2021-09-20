<?php
require_once('UserDAO.php');
require_once('User.php');
require_once('ActivityDAO.php');
require_once('Activity.php');
require_once('DataDAO.php');
require_once('Data.php');
$list = UserDAO::getInstance()->FindAll();
foreach ($list as $value) {
    UserDAO::getInstance()->delete($value);
}

$user = new User();
$user->init('test@mail.com', "Nom", "Prenom", "10:10:2020", "Homme", 200, 100, "1234CarroteS@");
UserDAO::getInstance()->insert($user);
$list = UserDAO::getInstance()->FindAll();
print('objet créé : ');
foreach ($list as $value) {
    print ( $value->__toString() . '   ' ) ;
}
print("\xA");
$usermodif = new User();
$usermodif->init('modifUser@mail.com', "Nom", "Prenom", "10:10:2020", "Homme", 200, 100, "1234CarroteS@");
UserDAO::getInstance()->update($user,$usermodif);
print('objet modif : ');
$list = UserDAO::getInstance()->FindAll();
foreach ($list as $value) {
    print( $value->__toString() . '   ');
}
print("\xA");
print("objet supprimé : ");
UserDAO::getInstance()->delete($usermodif);
$list = UserDAO::getInstance()->FindAll();
foreach ($list as $value) {
    print( $value->__toString() . '   ');
}
print("\xA");

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------

$list = ActivityDAO::getInstance()->FindAll();
foreach ($list as $value) {
    ActivityDAO::getInstance()->delete($value);
}

$activity = new Activity();
$activity->init(1, 29/03/2001, "course a pied", 1, 101, 99, 100, "09:00:00", "1:00:00" );
ActivityDAO::getInstance()->insert($activity);
$list = ActivityDAO::getInstance()->FindAll();
print('objet créé : ');
foreach ($list as $value) {
    print ( $value->__toString() . '   ' ) ;
}
print("\xA");
$activitymodif = new Activity();
$activitymodif->init(1, 29/03/2001, "velo", 1, 101, 99, 100, "09:00:00", "1:00:00" );
ActivityDAO::getInstance()->update($activity,$activitymodif);
print('objet modif : ');
$list = ActivityDAO::getInstance()->FindAll();
foreach ($list as $value) {
    print( $value->__toString() . '   ');
}
print("\xA");
print("objet supprimé : ");
ActivityDAO::getInstance()->delete($activitymodif);
$list = ActivityDAO::getInstance()->FindAll();
foreach ($list as $value) {
    print( $value->__toString() . '   ');
}
print("\xA");


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------

$list = DataDAO::getInstance()->FindAll();
foreach ($list as $value) {
    DataDAO::getInstance()->delete($value);
}

$data = new Data();
$data->init(1, "09:00:00", 100, 0, 0, 0, 1, 1);
DataDAO::getInstance()->insert($data);
$list = DataDAO::getInstance()->FindAll();
print('objet créé : ');
foreach ($list as $value) {
    print ( $value->__toString() . '   ' ) ;
}
print("\xA");
$datamodif = new Data();
$datamodif->init(1, "10:00:00", 150, 0, 0, 0, 1, 1);
DataDAO::getInstance()->update($data,$datamodif);
print('objet modif : ');
$list = DataDAO::getInstance()->FindAll();
foreach ($list as $value) {
    print( $value->__toString() . '   ');
}
print("\xA");
print("objet supprimé : ");
DataDAO::getInstance()->delete($datamodif);
$list = DataDAO::getInstance()->FindAll();
foreach ($list as $value) {
    print( $value->__toString() . '   ');
}
print("\xA");


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------



?>
