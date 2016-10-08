<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="locacao")
 */
class Locacao 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Veiculo")
     * @ORM\JoinColumn(name="veiculo_id", referencedColumnName="id")
     */
    private $veiculo;
    
    /**
     * @ORM\Column(type="date")
     */
    private $dataInicial;
    
    /**
     * @ORM\Column(type="date")
     */
    private $dataFinal;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clientes")
     * @ORM\JoinColumn(name="clientes_cpf", referencedColumnName="cpf")
     */
    private $cliente;
    
    public function getId() {
        return $this->id;
    }

    public function getVeiculo() {
        return $this->veiculo;
    }

    public function getDataInicial() {
        return $this->dataInicial;
    }

    public function getDataFinal() {
        return $this->dataFinal;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setVeiculo($veiculo) {
        $this->veiculo = $veiculo;
        return $this;
    }

    public function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
        return $this;
    }

    public function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
        return $this;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
        return $this;
    }


}
