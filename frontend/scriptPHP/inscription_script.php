<?php

include __DIR__ . '/../Database/controller/register_controller.php';

if (isset($_POST['create']) && $_POST['create'] == 'S\'INSCRIRE') {
    $inscription = new register_controller($_POST['birthday'], $_POST['password'], $_POST['pseudo'], $_POST['email']);
    if ($inscription->checkEmail($_POST['email']) == true) {
        if ($inscription->checkPseudo($_POST['pseudo'])) {
            $inscription->insert();
            $inscription->valide(' Votre inscription à bien été validé !');
        } else {
            $inscription->error('Ce pseudo est déja utiliser..');
        }
    } else {
        $inscription->error(' Ce mail est déja utilisé');
    }
}
?>