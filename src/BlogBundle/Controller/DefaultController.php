<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Entries;
use BlogBundle\Entity\Users;
use BlogBundle\Form\UsersType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class DefaultController extends Controller
{

    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entries = $em->getRepository(Entries::class)->findAll();

        foreach ($entries as $entry){
            $tags = $entry->getEntryTag();
            foreach ($tags as $tag){
                $nameTags[] = $tag->getTag()->getName();
            }
        }

        return $this->render('BlogBundle:Default:index.html.twig',
            array('entries' => $entries, 'nameTags' => $nameTags));
    }

    public function loginAction(Request $request, AuthenticationUtils $authUtils, UserPasswordEncoderInterface $passwordEncoder)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();


        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()) {
                $password = $passwordEncoder->encodePassword($user, $user->getPassword());
                $user->setPassword($password);

                $user->setRole('ROLE_USER');

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $status = "Usuario registrado correctamente";
            } else {
                $status = "No te has registrado correctamente";
            }
            $this->session->getFlashBag()->add('status', $status);
        }


        return $this->render('BlogBundle:Default:login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'form'          => $form->createView()
        ));
    }
}
