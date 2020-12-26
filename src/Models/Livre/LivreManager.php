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
        $stmt = $this->getBdd()->prepare($req);
        $result = $stmt->execute([':titre' => $titre, ':nbPages' => $nbPages, ':image' => $image, ':id_Format' => $format, ':id_Editeurs' => $editeur, ':id_Authors' => $authors]);
        $stmt->closeCursor();
        if ($result > 0) {
            $this->setTitre($titre)
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
        $stmt = $this->getBdd()->prepare($req);
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

    public function selectLivre($id)
    {
        $req = "SELECT * FROM livres INNER JOIN editeurs ON id_Editeurs INNER JOIN authors ON id_Authors INNER JOIN format ON id_Format WHERE livres.id = $id";
        $stmt = $this->getBdd()->prepare($req);
        // dd($req);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }
}
