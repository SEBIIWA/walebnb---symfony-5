<?php

namespace App\Form;

use App\Entity\Ad;
use App\Form\ApplicationType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends ApplicationType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',
                TextType::class, $this->getConfiguration("Title", "Title")
            )
            ->add('slug',
                TextType::class, $this->getConfiguration("Adresse","Adresse",[
                    'required' => false
                ])
            )
            ->add('coverImage',
                UrlType::class,
                $this->getConfiguration("Your Thmbnails", "Thumbnails")
            )
            ->add(
                'introduction',
                TextType::class,
                $this->getConfiguration("Introduction", "Introduction")
            )
            ->add(
                'content',
                TextareaType::class,
                $this->getConfiguration("Description", "description")
            )
            ->add('rooms',
                IntegerType::class,
                $this->getConfiguration("Rooms", "rooms")
            )
            ->add(
                'price',
                MoneyType::class,
                $this->getConfiguration("Night Price", "price")
            )
            ->add(
                'images',
                CollectionType::class,
                [
                    'entry_type' => ImageType::class,
                    'allow_add' => true,
                    'allow_delete' => true
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
