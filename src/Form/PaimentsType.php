<?php

namespace App\Form;

use App\Entity\Paiments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PaimentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Carte' => 'carte',
                    'Cache' => 'cache',
                    'Chek' => 'chek',
                    'autre'=> 'autre',
                ],
                'placeholder' => 'Select Payment Type',
            ])
            ->add('montant')
            ->add('date');
    }

    // ... (existing code)
}

