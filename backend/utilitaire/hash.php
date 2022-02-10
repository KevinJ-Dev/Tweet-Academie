<?php 

include __DIR__ . '/../Database/DB.php';

class hash {
    
    private  $email;
    private  $mot_de_passe;
    private $hash;
    
    
    
    public function hash($mp) {
        $retour = hash_hmac('ripemd160', $mp, 'secret');
        return $retour;
    }
    
    
    public function reverse_hash($email,$mp) {
        
        $compare = new DB();
        $data = $compare->get_all("SELECT * from users Where email like '$email'");
        
        foreach ($data as $val) {
            $compare_password = $val["password"];
        }



        echo $compare_password;
        
        
        
        if (hash_equals($mp, $compare_password) ) {
            echo "hashes match!";
        }   
        else {
            
            $message = "les mots de passes ne correspondent pas";
            echo $message;
            return $message;
        }
        
    }
    
}


$h = new hash();
$h->reverse_hash("sqldka@gmail.com", "dsfdsfsdf");

?>