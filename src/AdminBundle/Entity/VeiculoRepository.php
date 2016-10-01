<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class VeiculoRepository extends EntityRepository {

    /**
     * @param type $cidade
     * @param \DateTime $dataIni
     * @param \DateTime $dataFim
     */
    public function pesquisaVeiculos($cidade, \DateTime $dataIni, \Datetime $dataFim) {
       return $this->getEntityManager()->createQuery(
                "SELECT * FROM AdminBundle:Veiculos 
                WHERE id not in
                (SELECT id 
                FROM AdminBundle:Locacao
                WHERE data_inicial between ".$dataIni->format('Y-m-d')."' AND '".$dataFim->format('Y-m-d')."' 
                OR data_final between ".$dataIni->format('Y-m-d')."' AND '".$dataFim->format('Y-m-d')."'")->getResult();
        }
}
