<?php
class ContactManager {

    private $cnx;

        public function __construct () {
            try {
                $this->cnx = new PDO('mysql:host=localhost; dbname=contact; charset=utf8','root','root');
            } catch (PDOException $e) {
                echo 'Erreur de connexion à la base de donnée !';
            }
        }


//Ajouter un contact
        public function CreatContact (Contact $contact ) {
            $req = $this->cnx-> prepare ('INSERT INTO contact (prenom, nom, email) VALUE (:prenom , :nom, :email)');
            
            $req -> bindValue (':nom',$contact->getNom (), PDO::PARAM_STR);
            $req -> bindValue (':prenom',$contact->getPrenom(), PDO::PARAM_STR); 
            $req -> bindValue (':email',$contact->getEmail(), PDO::PARAM_STR); 

            $req-> execute ();
            return 'le contact a été inséré ! <br/>' ;
        }


//lire un contact
        public function ReadContact ($id) {
            $req = $this ->cnx->prepare ('SELECT * FROM contact WHERE contactID= :id');
            $req-> bindValue (':id',$id, PDO::PARAM_INT);
            $req-> execute ();

            $donnees = $req -> fetch (PDO::FETCH_ASSOC);

            $contact = new Contact ();
            $contact -> setNom ($donnees['nom']);
            $contact -> setPrenom ($donnees['prenom']);
            $contact -> setEmail ($donnees['email']);
            $contact -> setContactID ($donnees['contactID']);
            
            return $contact;
        }

//lire tous 
        public function ReadAllContact () {
            $req = $this-> cnx->prepare ('SELECT * FROM contact');
            $req -> execute ();

                while ($donnees = $req-> fetch (PDO::FETCH_ASSOC)) {
                    $contact = new Contact ();
                    $contact -> setNom ($donnees['nom']);
                    $contact -> setPrenom ($donnees['prenom']);
                    $contact -> setEmail ($donnees['email']);
                    $contact -> setContactID ($donnees['contactID']);
                    $contacts [] = $contact;
                } 
                if (empty($contact)){
                    echo 'Il n\'y a actuellement aucun contact.';
                } 
                else {
                    return $contacts;
                }

         
    }


// modifier contact 
        public function UpdateContact (Contact $contact) {
            $req = $this->cnx-> prepare ('UPDATE contact SET prenom = :prenom, nom= :nom, email= :email WHERE contactID= :id');
            
            $req -> bindValue (':id',$contact->getContactID (), PDO::PARAM_INT);
            $req -> bindValue (':nom',$contact->getNom (), PDO::PARAM_STR);
            $req -> bindValue (':prenom',$contact->getPrenom(), PDO::PARAM_STR); 
            $req -> bindValue (':email',$contact->getEmail(), PDO::PARAM_STR); 

            $req-> execute ();
            return 'le contact a été modifié ! <br/>' ;
        }

// supprimer un contact
        public function DeleteContact ($id) {

            $req = $this ->cnx->prepare ('DELETE FROM contact WHERE contactID= :id');
            $req-> bindValue (':id',$id, PDO::PARAM_INT);

                        
           // if (!empty($id)){
           //     echo 'gggggggggg';
          //  }
            $req-> execute ();
            echo 'le contact a été supprimé ! <br/>';
        }
}


