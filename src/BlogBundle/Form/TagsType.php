<?php

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                "label"    => "Nombre",
                "required" => false,
                "attr"     => array(
                    "class"     => "form-name form-control"
                )
            ))
            ->add('description',TextareaType::class, array(
                "label"    => "Descripción",
                "required" => false,
                "attr"     => array(
                    "class"     => "form-name form-control"
                )
            ))
            ->add('save', SubmitType::class, array(
                "label"    => "Guardar",
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
            'data_class' => 'BlogBundle\Entity\Tags'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blogbundle_tags';
    }


}
