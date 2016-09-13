<?php

namespace DB\FactoryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WarehouseStatusType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('warehouse','entity',array(
                'class' => 'DB\FactoryBundle\Entity\Warehouse',
                'choice_label' => 'name'
            ))
            ->add('factory','entity',array(
                'class' =>'DB\FactoryBundle\Entity\Factory',
                'choice_label' => function( $factory){
                    return $factory->getName().' ('.$factory->getDateCreate()->format('d-m-Y').')';
                }
            ))
            ->add('product','entity',array(
                'class'=>'DB\FactoryBundle\Entity\Product',
                'choice_label'=> 'name'
            ))
            ->add('qty')
            ->add('price')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DB\FactoryBundle\Entity\WarehouseStatus'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'db_factorybundle_warehousestatus';
    }
}
