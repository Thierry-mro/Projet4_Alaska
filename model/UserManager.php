<?php
require_once 'model/Manager.php';

class UserManager extends Manager
{
    public function selectuser($mail)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, password, username FROM users WHERE mail = ? ');
        $req->execute(array($mail));

        $resultat = $req->fetch();
        return $resultat;
    }
}
