<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',
                TextType::class, $this->getConfiguration("Name", "name ...")
            )
            ->add('lastName',
                TextType::class, $this->getConfiguration("Last name", "Last name ...")
            )
            ->add('email',
                EmailType::class, $this->getConfiguration("Email", "Your email")
            )
            ->add('picture',
                UrlType::class, $this->getConfiguration("Avatar", "avatar Link ...")
            )
            ->add('hash',
                PasswordType::class, $this->getConfiguration("Password", "password")
            )
            ->add('passwordConfirm',
                    PasswordType::class, $this->getConfiguration("Confirm Password", "confirm password")
            )
            ->add('introduction',
                TextType::class, $this->getConfiguration("Introduction", "Describe yourself ...")
            )
            ->add('description',
                TextareaType::class, $this->getConfiguration("Detailed Introduction", "Present yourselft as a host")
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
