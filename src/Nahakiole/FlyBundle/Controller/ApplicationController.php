<?php

namespace Nahakiole\FlyBundle\Controller;

use Nahakiole\FlyBundle\Entity\Packet;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nahakiole\FlyBundle\Entity\Application;
use Nahakiole\FlyBundle\Form\ApplicationType;

/**
 * Application controller.
 *
 */
class ApplicationController extends Controller
{

    /**
     * Lists all Application entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FlyBundle:Application')->findAll();

        return $this->render('FlyBundle:Application:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Application entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Application();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('application_show', array('id' => $entity->getId())));
        }

        return $this->render('FlyBundle:Application:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Application entity.
     *
     * @param Application $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Application $entity)
    {
        $form = $this->createForm(new ApplicationType($this->getDoctrine()->getManager()), $entity, array(
            'action' => $this->generateUrl('application_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Application entity.
     *
     */
    public function newAction()
    {


        $entity = new Application();

        $packet = new Packet();
        $packet->setName('');

        $entity->getPackets()->add($packet);
        $form   = $this->createCreateForm($entity);

        return $this->render('FlyBundle:Application:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Application entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FlyBundle:Application')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FlyBundle:Application:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Application entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FlyBundle:Application')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FlyBundle:Application:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Application entity.
    *
    * @param Application $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Application $entity)
    {
        $form = $this->createForm(new ApplicationType($this->getDoctrine()->getManager()), $entity, array(
            'action' => $this->generateUrl('application_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Application entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FlyBundle:Application')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('application_edit', array('id' => $id)));
        }

        return $this->render('FlyBundle:Application:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Application entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FlyBundle:Application')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Application entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('application'));
    }

    /**
     * Creates a form to delete a Application entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('application_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
