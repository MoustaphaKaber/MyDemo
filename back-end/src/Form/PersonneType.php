<?php

namespace App\Form;

use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissence',DateType::Class, array(
                'widget' => 'single_text',
                'years' => range(date('Y')-60, date('Y')-18),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),
              ))
            ->add('image',fileType::class, ['label' => 'Image'] )
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Femme' => 'F',
                    'Homme' => 'H',      
                ]])
                ->add('groupe_sanguin', ChoiceType::class, [
                      
                'choices' => [
                    'O+' => 'O',
                    'B+' => 'B',
                    'A+' => 'A',
                    'O-' => 'O',
                    'B-' => 'B',
                    'A-' => 'A',
                  
                    ]])
                
            
            ->add('poid')
            ->add('taille')
            ->add('observation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
