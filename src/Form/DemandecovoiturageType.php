<?php

namespace App\Form;

use App\Entity\Demandecovoiturage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandecovoiturageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datereservation')
            ->add('nbplace')
            #->add('idOffre')
           # ->add('idUser')
            ->add('iduser',EntityType::class,
            ['class'=>User::class,
            'choice_label'=>'nom',
            'label'=>'User'])
            ->add('idOffre',EntityType::class,
            ['class'=>Offrecovoiturage::class,
            'choice_label'=>'lieua',
            'label'=>'offrecovoiturage'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demandecovoiturage::class,
        ]);
    }
}
