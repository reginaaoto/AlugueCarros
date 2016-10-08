<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 */
class Clientes 
{
    /**
     * @ORM\Column(type="string", length=11)
     * @ORM\Id
     */
    private $cpf;
    
    /**
     * @ORM\Column(type="string", length=80)
     */
    private $nome;
    
    /**
     * @ORM\Column(type="string", length=12)
     */
    private $telefone;

    /**
     * Set cpf
     *
     * @param string $cpf
     *
     * @return Clientes
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Clientes
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Clientes
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }
}
