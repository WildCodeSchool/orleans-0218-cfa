<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Formation;

class UfaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label'=>'Nom de l\'UFA'])
            ->add('urlsite', UrlType::class, ['label'=>'Lien vers le site de l\'UFA'])
            ->add('description', TextareaType::class, ['label'=>'Description'])
            ->add('address', TextType::class, ['label'=>'Adresse'])
            ->add('zipcode', IntegerType::class, ['label'=>'Code Postal'])
            ->add('cedex')
            ->add('town', TextType::class, ['label'=>'Ville'])
            ->add('formations', EntityType::class, [
                'class' => 'AppBundle\Entity\Formation',
                'choice_label'=> 'name',
                'multiple' => true,
                'expanded' => true
            ]);
    }/**
      * {@inheritdoc}
      */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
            'data_class' => 'AppBundle\Entity\Ufa'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ufa';
    }
}
