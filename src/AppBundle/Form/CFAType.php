<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CFAType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('textPresident', CKEditorType::class, array(
                'config' => array(
                    'language' => 'fr'
                ),
                'label' => 'Le mot de la présidence',
            ))
            ->add('imagePresidentFile', VichFileType::class, array(
                'label' => 'image de la Présidence',
                'required' =>false,
                'download_link' => false,
                'allow_delete' => false
            ))
            ->add('apprenticeNumber', IntegerType::class, array(
                'label' => 'Nombre d\'apprentis'
            ))

            ->add('successRate', PercentType::class, array(
                'label' => 'Pourcentage de reussite',
                'type' => 'integer'
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cfa'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cfa';
    }
}
