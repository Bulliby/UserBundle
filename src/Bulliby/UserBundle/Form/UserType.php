<?php

namespace Bulliby\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('surname')
			->add('birthday', BirthdayType::class)
			->add('email')
			->add('familly')
			->add('login')
			->add('password', PasswordType::class)
			->add('password2', PasswordType::class, array('mapped' => false, 'label' => false))
            ->add('Register', SubmitType::class)
        ;
    }
}
