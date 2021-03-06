<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salarie
 *
 * @ORM\Table(name="SALARIE")
 * @ORM\Entity
 */
class Salarie extends User
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="POSTE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $poste;

    

    


    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(?string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    
    

}
