<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;
use App\Entity\Offrecovoiturage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('commenraire')
            ->add('iduser',EntityType::class,
            ['class'=>User::class,
            'choice_label'=>'nom',
            'label'=>'User'])
            ->add('id_offrecov',EntityType::class,
            ['class'=>Offrecovoiturage::class,
            'choice_label'=>'marque',
            'label'=>'offrecovoiturage'])
            ->add('image',FileType::class,[
                'label' => 'image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2Mi',
                        'mimeTypesMessage' => 'Télécharger une image valide',
                    ])
                ],
          
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
