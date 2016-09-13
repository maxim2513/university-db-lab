<?php

namespace DB\FactoryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FactoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('dateCreate')
            ->add('type', 'entity',array(
                'class'=>'DB\FactoryBundle\Entity\FactoryType',
                'choice_label'=> 'name'
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DB\FactoryBundle\Entity\Factory'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'db_factorybundle_factory';
    }
}
