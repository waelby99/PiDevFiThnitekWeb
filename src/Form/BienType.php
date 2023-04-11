<?php

namespace App\Form;

use App\Entity\Bien;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lieud')
            ->add('lieua')
            ->add('dated')
            ->add('num')
            ->add('iduser',EntityType::class,
                ['class'=>User::class,
                    'choice_label'=>'nom',
                    'label'=>'User'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
