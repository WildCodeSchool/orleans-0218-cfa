<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 25/06/18
 * Time: 11:38
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\FormBuilderInterface ;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder , array $options)
    {
        $builder
            ->add('name');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType' ;

    }

    public function getBlockPrefix()
    {
        return 'app_user_registration' ;
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
