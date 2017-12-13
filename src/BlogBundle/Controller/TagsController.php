<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Entries;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Tags;
use BlogBundle\Form\TagsType;
use Symfony\Component\HttpFoundation\Session\Session;


class TagsController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tags = $em->getRepository(Tags::class)->findAll();

        return $this->render('BlogBundle:Tags:index.html.twig',
            array('tags' => $tags));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tag = $em->getRepository(Tags::class)->find($id);

        if (count($tag->getEntryTag()) == 0 ) {
            $em->remove($tag);
            $em->flush();
        }

        return $this->redirectToRoute("tags_index");
    }

    public function addAction(Request $request)
    {

        $tag = new Tags();
        $form = $this->createForm(TagsType::class, $tag);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($tag);
                $em->flush();

                $status = "Etiqueta registrada correctamente";

                $this->session->getFlashBag()->add('status', $status);

                return $this->redirectToRoute("tags_index");

            } else {

                $status = "No se ha podido registrar la etiqueta";
            }

            $this->session->getFlashBag()->add('status', $status);
        }


        return $this->render('BlogBundle:Tags:add.html.twig', array(
            'tags'          => $tag,
            'form'          => $form->createView()
        ));
    }
}
