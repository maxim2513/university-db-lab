<?php

namespace DB\FactoryBundle\Form;

use DB\FactoryBundle\Entity\Factory;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\EntityRepositoryGenerator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrdersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('factory', 'entity', array(
                'class' => 'DB\FactoryBundle\Entity\Factory',
            'query_builder' =>function(EntityRepository $er){
                return $er->createQueryBuilder('f')
                    ->innerJoin('f.type','t')
                    ->where('t.id = f.type')
                    ->where('t.name = :factory')
                    ->setParameter('factory','Factory')
                    ;

//                    ->where('f.type.name = :factory');
            }
            ))
            ->add('supplier', 'entity', array(
                'class' => 'DB\FactoryBundle\Entity\Factory',
                'query_builder' =>function(EntityRepository $er){
                    return $er->createQueryBuilder('f')
                        ->innerJoin('f.type','t')
                        ->where('t.id = f.type')
                        ->where('t.name <> :factory')
                        ->setParameter('factory','Factory')
                        ;

//                    ->where('f.type.name = :factory');
                }
                ))
            ->add('dateCreate', 'datetime')
            ->add('payment', 'entity', array(
                'class' => 'DB\FactoryBundle\Entity\Payment',
                'choice_label' => function ($payment) {
                    return $payment->getName() . ' (' . $payment->getCommission() . '%)';
                }
            ))
            ->add('shipping', 'entity', array(
                'class' => 'DB\FactoryBundle\Entity\Shipping',
                'choice_label' => function ($shipping) {
                    return $shipping->getName() . ' (' . $shipping->getPrice() . '$)';
                }
            ))
            ->add('status', 'entity', array(
                'class' => 'DB\FactoryBundle\Entity\Status',
                'choice_label' => 'name'
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DB\FactoryBundle\Entity\Orders'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'db_factorybundle_orders';
    }
}
