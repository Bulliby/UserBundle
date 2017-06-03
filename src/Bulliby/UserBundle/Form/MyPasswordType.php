<?php

namespace Bulliby\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class MyPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('password', PasswordType::class)
			->add('password2', PasswordType::class, array('mapped' => false, 'label' => false))
        ;
    }
}
