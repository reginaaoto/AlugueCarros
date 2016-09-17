<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cidades")
 */
class Cidades 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /**
     * @ORM\Column(type="string", length=80)
     */
    private $nome;
    
     /**
     * @ORM\Column(type="string", length=40)
     */
    private $estado;
    
    public function __toString() {
        return $this->nome . '-' . $this->estado;
    }

        public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }

    
}
