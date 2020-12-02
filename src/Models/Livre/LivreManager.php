<?php

namespace App\Models;


Use Core\Request;
Use App\Models\Livre;
use PDO;
use Exception;


class LivreManager extends Request
{
    private $livres; //tableau de livre

    // ajoute au tableau un nouveau livre
    public function ajoutLivre($livre)
    {
        $this->livres[] = $livre;
    }

    public function getLivres()
    {
        return $this->livres;
    }

    // public function getLivreById($id)
    // {
    //     // for ($i = 0; count($this->livres); $i++) {
    //     //     if ($this->livres[$i]->getId() === $id) {
    //     //         return $this->livres[$i];
    //     //     }
    //     // }
    //     var_dump($this->livres);
    //     foreach($this->livres as $livre){
    //         if($livre['id'] === $id){
    //             return $this->livres;
    //         }
    //     }
    //     throw new Exception("Le livre n'existe pas");
    // }

    public function ajoutLivrebdd($titre, $nbPages, $image)
    {
        $req = "INSERT INTO livres(titre, nbPages, image) VALUES (:titre,:nbPages,:image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if ($result > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(), $titre, $nbPages, $image);
            $this->ajoutLivre($livre);
        }
    }

    public function suppressionLivreBdd($id)
    {
        $req = "DELETE FROM livres WHERE id = :idLivre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if ($result > 0) {
            $livre = $this->findById("livres",$id);
            unset($livre);
        }
    }

    public function updateLivreBdd($id, $titre, $nbPages, $image)
    {
        $req = "UPDATE livres SET titre=:titre, nbPages=:nbPages,image=:image WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if ($result > 0) {
            $this->getLivreById($id)->setTitre($titre);
            $this->getLivreById($id)->setNbPages($nbPages);
            $this->getLivreById($id)->setImage($image);
        }
    }
}
