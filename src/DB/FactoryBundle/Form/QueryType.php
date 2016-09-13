<?php

namespace DB\FactoryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QueryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add(
                'comment',
                'textarea',
                array(
                    'label' => 'Description',
                )
            )
            ->add(
                'query',
                'textarea',
                array(
                    'label' => 'Set Query',
                )

            );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'DB\FactoryBundle\Entity\Query',
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'db_factorybundle_query';
    }
}
