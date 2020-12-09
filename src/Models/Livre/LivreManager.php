<?php

namespace App\Models;



use App\Models\Livre;
use PDO;
use Exception;


class LivreManager extends Livre
{

    public function add($titre, $nbPages, $image, $format, $editeur, $authors)
    {
        $req = "INSERT INTO livres(titre, nbPages, image, id_Format, id_Editeurs, id_Authors) VALUES (:titre,:nbPages,:image, :id_Format, :id_Editeurs, :id_Authors)";
        // $idFormat = $_POST['format'];
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

    public function updateLivreBdd($id, $titre, $nbPages, $image, $format, $editeur, $authors)
    {
        $req = "UPDATE livres SET titre=:titre, nbPages=:nbPages, image=:image, id_Format=:id_Format, id_Editeurs=:id_Editeurs, id_Authors=:id_Authors  WHERE id = :id";
        $livre = new Livre();
        $stmt = $livre->getBdd()->prepare($req);
        $result = $stmt->execute([':id' => $id, ':titre' => $titre, ':nbPages' => $nbPages, ':image' => $image, ':id_Format' => $format, ':id_Editeurs' => $editeur, ':id_Authors' => $authors]);
        $stmt->closeCursor();
        if ($result > 0) {
            foreach ($result as $data) {
                $this->findById($id)->setTitre($titre);
                $this->findById($id)->setNbPages($nbPages);
                $this->findById($id)->setImage($image);
                $this->findById($id)->setId_Editeurs($format);
                $this->findById($id)->setImage($editeur);
                $this->findById($id)->setImage($authors);
            }
        }
    }
}
