<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Ile;
use App\Entity\Image;
use App\Entity\Pays;
use App\Entity\User;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre_voyage', TextType::class, [
                'attr' => ['class' => 'block w-full mb-4 mt-2  rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6']
            ])
            ->add('Description_voyage', TextareaType::class, [
                'attr' => ['rows' => '10', 'class' => 'block w-full row-20 mb-4 mt-2 rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'],

            ])

            ->add('duree_voyage', NumberType::class, [
                'attr' => ['class' => 'block w-full mb-4 mt-2 rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6']
            ])

            ->add('prix_voyage', NumberType::class, [
                'attr' => ['class' => 'block w-full mb-4 mt-2 rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6']
            ])

            ->add('Image', EntityType::class, [
                'class' => Image::class,
                'choice_label' => 'nom_image',
                'multiple' => true,
                'attr' => ['class' => 'block w-full mb-4 mt-2 rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6'],

            ])
            ->add('Categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom_categorie',
                'multiple' => true,
                'attr' => ['class' => 'block w-full mb-4 mt-2 rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6'],

            ])
            ->add('Pays', EntityType::class, [
                'class' => Pays::class,
                'choice_label' => 'nom_pays',
                'multiple' => true,
                'attr' => ['class' => 'block w-full mb-4 mt-2 rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6'],

            ])
            ->add('ile', EntityType::class, [
                'class' => Ile::class,
                'choice_label' => 'nom_ile',
                'multiple' => true,
                'attr' => ['class' => 'block w-full mb-4 mt-2 rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
