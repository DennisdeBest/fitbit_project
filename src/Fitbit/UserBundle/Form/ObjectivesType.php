<?php

namespace Fitbit\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectivesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('weight',     NumberType::class, array('required'=>false))
            //->add('bmi',        NumberType::class, array('required'=>false))
            //->add('sleeping',   IntegerType::class, array('required'=>false))
            //->add('awake',      IntegerType::class, array('required'=>false))
            //->add('awakening',  IntegerType::class, array('required'=>false))
            //->add('inBed',      IntegerType::class, array('required'=>false))
            //->add('calories',   IntegerType::class, array('required'=>false))
            ->add('steps',      IntegerType::class, array('required'=>false))
            //->add('distance',   IntegerType::class, array('required'=>false))
            ->add('floors',     IntegerType::class, array('required'=>false))
            //->add('sedentary',  IntegerType::class, array('required'=>false))
            //->add('mobile',     IntegerType::class, array('required'=>false))
            ->add('active',     IntegerType::class, array('required'=>false))
            //->add('veryActive', IntegerType::class, array('required'=>false))
            ->add('Update',     SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fitbit\UserBundle\Entity\Objectives'
        ));
    }
}
