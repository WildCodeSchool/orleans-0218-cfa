<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class FormationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Nom de la formation'
            ))
            ->add('shortPresentation', CKEditorType::class, array(
                'config' => array(
                    'language' => 'fr'
                ),
                'label' => 'Présentation',
            ))
            ->add('jobDescription', CKEditorType::class, array(
                'config' => array(
                    'language' => 'fr'
                ),
                'label' => 'Description'
            ))
            ->add('referentielFile', VichFileType::class, array(
                'label' => 'Référentiel de la formation'
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Formation'));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_formation';
    }
}
