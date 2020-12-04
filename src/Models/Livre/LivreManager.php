<?php

namespace App\Models;



Use App\Models\Livre;
use PDO;
use Exception;


class LivreManager
{
    private $livres; //tableau de livre

    // ajoute au tableau un nouveau livre

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

    public function add($titre, $nbPages, $image, $format, $editeur, $authors)
    {
        $req = "INSERT INTO livres(titre, nbPages, image, id_Format, id_Editeurs, id_Authors) VALUES (:titre,:nbPages,:image, :id_Format, :id_Editeurs, :id_Authors)";
        $livre = new Livre();
        $stmt = $livre->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":id_Format", $format, PDO::PARAM_INT);
        $stmt->bindValue(":id_Editeurs", $editeur, PDO::PARAM_INT);
        $stmt->bindValue(":id_Authors", $authors, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if ($result > 0) {
            $livre->setTitre($titre)
                ->setNbPages($nbPages)
                ->setImage($image)
                ->setId_Format($format)
                ->setId_Editeurs($editeur)
                ->setId_Authors($authors);
        }

    }

    

    public function updateLivreBdd($id, $titre, $nbPages, $image)
    {
        $req = "UPDATE livres SET titre=:titre, nbPages=:nbPages,image=:image WHERE id = :id";
        $stmt = $this->table->getBdd()->prepare($req);
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
