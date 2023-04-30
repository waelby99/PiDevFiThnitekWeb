<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Entity\User;
use App\Entity\Offrecovoiturage;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Config\Framework\CacheConfig;

class OffrecovoiturageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('marque')
            ->add('dated')
            ->add('lieud')
            ->add('lieua')
            ->add('dispo', CheckboxType::class, [
                'label'    => 'Disponible',
                'required' => true,
            ])
            ->add('nbplace')
            ->add('numtel')
            ->add('distance')
            ->add('idUser',EntityType::class,
                ['class'=>User::class,
                    'choice_label'=>'nom',
                    'label'=>'User',
                ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offrecovoiturage::class,
        ]);
    }
}
