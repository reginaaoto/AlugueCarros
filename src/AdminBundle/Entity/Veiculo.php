<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="veiculos")
 * @ORM\Entity(repositoryClass="AdminBundle\Entity\VeiculoRepository")
 * 
 */
class Veiculo 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=40)
     */
    private $marca;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *  min=3,
     *  minMessage = "o modelo é muito pequeno")
     * 
     * @ORM\Column(type="string", length=40)
     */
    private $modelo;
    
    /**
     * @ORM\Column(type="date")
     */
    private $ano;
    
    /**
     * @ORM\Column(type="string", length=40)
     */
    private $cor;
    
    /**
     * @ORM\Column(type="string", length=40)
     */
    private $categoria;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cidades")
     * @ORM\JoinColumn(name="cidade_id", referencedColumnName="id")
     */
    private $cidade;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Veiculo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Veiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set ano
     *
     * @param \DateTime $ano
     *
     * @return Veiculo
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return \DateTime
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set cor
     *
     * @param string $cor
     *
     * @return Veiculo
     */
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get cor
     *
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Veiculo
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set cidade
     *
     * @param \AdminBundle\Entity\Cidades $cidade
     *
     * @return Veiculo
     */
    public function setCidade(\AdminBundle\Entity\Cidades $cidade = null)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return \AdminBundle\Entity\Cidades
     */
    public function getCidade()
    {
        return $this->cidade;
    }
}
