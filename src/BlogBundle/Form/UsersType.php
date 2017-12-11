<?php

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                "required" => true,
                "attr"     => array(
                    "class"     => "form-name form-control"
                )
            ))
            ->add('surname', TextType::class, array(
                "label"    => "Apellido",
                "required" => false,
                "attr"     => array(
                    "class"     => "form-name form-control"
                )
            ))
            ->add('email', EmailType::class, array(
                "required" => true,
                "label"    => "Email",
                "attr"     => array(
                    "class"     => "form-name form-control"
                )
            ))
            ->add('password', PasswordType::class, array(
                "required" => true,
                "label"    => "Contraseña",
                "attr"     => array(
                    "class"     => "form-name form-control"
                )
            ))
            ->add('Registrar', SubmitType::class, array(
                "attr"     => array(
                    "class"     => "btn btn-success"
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlogBundle\Entity\Users'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blogbundle_users';
    }


}
