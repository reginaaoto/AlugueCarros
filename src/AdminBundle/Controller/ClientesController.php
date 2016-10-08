<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\Clientes;
use AdminBundle\Form\ClientesType;

/**
 * Clientes controller.
 *
 * @Route("/clientes")
 */
class ClientesController extends Controller
{
    /**
     * Lists all Clientes entities.
     *
     * @Route("/", name="clientes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clientes = $em->getRepository('AdminBundle:Clientes')->findAll();

        return $this->render('AdminBundle:Clientes:index.html.twig', array(
            'clientes' => $clientes,
        ));
    }

    /**
     * Creates a new Clientes entity.
     *
     * @Route("/new", name="clientes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cliente = new Clientes();
        $form = $this->createForm('AdminBundle\Form\ClientesType', $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            return $this->redirectToRoute('clientes_show', array('id' => $cliente->getId()));
        }

        return $this->render('AdminBundle:Clientes:new.html.twig', array(
            'cliente' => $cliente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Clientes entity.
     *
     * @Route("/{cpf}", name="clientes_show")
     * @Method("GET")
     */
    public function showAction($cpf)
    {
        $em = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository('AdminBundle:Clientes')->find($cpf);

        return $this->render('AdminBundle:Clientes:show.html.twig', array(
            'cliente' => $cliente,

        ));
    }

    /**
     * Displays a form to edit an existing Clientes entity.
     *
     * @Route("/{id}/edit", name="clientes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Clientes $cliente)
    {
       
        $editForm = $this->createForm('AdminBundle\Form\ClientesType', $cliente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            return $this->redirectToRoute('clientes_edit', array('id' => $cliente->getId()));
        }

        return $this->render('AdminBundle:Clientes:edit.html.twig', array(
            'cliente' => $cliente,
            'edit_form' => $editForm->createView(),
            
        ));
    }

    /**
     * Deletes a Clientes entity.
     *
     * @Route("/{id}", name="clientes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Clientes $cliente)
    {
        $form = $this->createDeleteForm($cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cliente);
            $em->flush();
        }

        return $this->redirectToRoute('clientes_index');
    }

    /**
     * Creates a form to delete a Clientes entity.
     *
     * @param Clientes $cliente The Clientes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Clientes $cliente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientes_delete', array('id' => $cliente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
