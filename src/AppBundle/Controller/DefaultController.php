<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager(); //Servico conexao banco de dados
        
        $cidades = $em->getRepository('AdminBundle:Cidades')->findAll();
          
        return $this->render('default/index.html.twig', [
            'listaCidades' => $cidades
        ]);
    }
    
    /**
     * @Route("/pesquisa")
     */
    public function pesquisaAction(Request $request)
    {
        //var_dump($request);
        //var_dump($request->get('range'));
        $em = $this->getDoctrine()->getManager(); //Servico conexao banco de dados
        
        $cidade = $request->get('cidade');
        $range = $request->get('range');
        
        $dias = explode("-", $range);
        
        $dataInicio = \DateTime::createFromFormat("d/m/Y",trim($dias[0]));
        $dataFim = \DateTime::createFromFormat("d/m/Y",trim($dias[1]));
        
        $carros =  $em->getRepository('AdminBundle:Veiculo')
                ->findBy(array(
                    'cidade' => $cidade
                ));
        
        
        /*$carros =  $em->getRepository('AdminBundle:Veiculo')
                ->pesquisaVeiculos($cidade,$dataInicio,$dataFim);*/
        
        
        $cidadeSel = $em->getRepository('AdminBundle:Cidades')->find($cidade);
        
        return $this->render('default/pesquisa.html.twig',array(
            "cidade" => $cidadeSel,
            "listaCarros" => $carros
       ));
    }
}
