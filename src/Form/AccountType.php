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


class AccountType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',
                TextType::class, $this->getConfiguration("Name", "your name ...")
            )
            ->add('lastName',
                TextType::class, $this->getConfiguration("Last Name", "last name ...")
            )
            ->add('email',
                EmailType::class, $this->getConfiguration("Email", "email adresse")
            )
            ->add('picture',
                UrlType::class, $this->getConfiguration("Profile Pic", "your avatar...")
            )
            ->add('introduction',
                TextType::class, $this->getConfiguration("Introduction", "Présent yourself ...")
            )
            ->add('description',
                TextareaType::class, $this->getConfiguration("Detailed Introduction", "present yourself !")
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
