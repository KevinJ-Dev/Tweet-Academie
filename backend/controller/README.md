# Tweeter



Backend

Controller / SQL
---------------
1 controller = 1 classe PHP

l'appel de la classe se fait en bas de page

EXEMPLE -- class

class foulek {

private $name;
private $Y;
private $X;


public function __contstruct() {

$this->name = $_POST["name];
 (Variable) = Requete HTTP POST (variable Globale ->> Method Post HTML)
-------------------
etc
}

$requette = INSERT INTO users(colonne1, colonne2) VALUES('value 1','value 2')
 public function insert() {
        $login = new DB();       
        $login->insert("$requette");
    }
}

// requete SQL INSERT USER
<!-- INSERT INTO users(pseudo,email,password,birthdate,userpp,banner,description,theme,user_date) VALUES('dsfsdfsdf','sqldka@gmail.com','asdqsdq','2018-09-24','dfssdf','erzzz','sdjklkj','8','2018-09-24') -->








$login->insert("INSERT INTO users(pseudo,email,password,birthdate,userpp,banner,description,theme,user_date) VALUES('dsfsdfsdf','sqldka@gmail.com','asdqsdq','2018-09-24','dfssdf','erzzz','sdjklkj','8','2018-09-24')");








