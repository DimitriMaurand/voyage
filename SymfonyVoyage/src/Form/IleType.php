<?php

namespace App\Form;

use App\Entity\Ile;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'nom_ile',
                TextType::class,
                [
                    'attr' => ['class' => 'block w-full mb-4 mt-2  rounded-md border-0 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'],
                ]
            )
            //             ->add('voyages', EntityType::class, [
            //                 'class' => Voyage::class,
            // 'choice_label' => 'id',
            // 'multiple' => true,
            //             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ile::class,
        ]);
    }
}
