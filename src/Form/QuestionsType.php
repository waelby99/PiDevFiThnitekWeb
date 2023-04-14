<?php
namespace App\Form;


use App\Entity\Sondage;
use App\Entity\Questions;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
class QuestionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
/* ->add('question')
            ->add('type')
            ->add('sondage',EntityType::class,
            ['class'=>Sondage::class,
                'choice_label'=>'sujet',
                'label'=>'sondage']);
        ;*/
         ->add('sondage')
            ->add('question', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le champ  ne doit pas être vide.'
                    ]),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 100,
                        'minMessage' => 'Le champ doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le champ ne doit pas contenir plus de {{ limit }} caractères',
                    ]),
                    new Regex([
                        'pattern' => '/\?$/',
                        'message' => 'la question doit se terminer par un point d\'interrogation',
                    ]),

                ]])

            ->add('type', ChoiceType::class,[
                'expanded' => true,
                'choices' => [
                    'Text'=>"Text",
                    'Rate' =>"Rate",
                    'YES/NO'=>"YES/NO",
                   
                
                ],
                'attr'=>[
                    'style'=>'display : flex; flex-direction: row-reverse; align-items: flex-start; justify-content : center; ',
                ]
                
                
                ]);
          

          
        
                }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Questions::class,
        ]);
    }
}
