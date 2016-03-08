<?php

namespace Positibe\Bundle\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ContactInformationType
 * @package Positibe\Bundle\ContactBundle\Form
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class ContactInformationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'enterpriseName',
                null,
                array(
                    'required' => false,
                    'label' => 'contact_information.form.enterprise_name'
                )
            )
            ->add(
                'streetAddress',
                null,
                array(
                    'required' => false,
                    'label' => 'contact_information.form.street_address'
                )
            )
            ->add(
                'regionAddress',
                null,
                array(
                    'required' => false,
                    'label' => 'contact_information.form.region_address'
                )
            )
            ->add(
                'phone',
                null,
                array(
                    'required' => false,
                    'label' => 'contact_information.form.phone'
                )
            )
            ->add(
                'email',
                null,
                array(
                    'required' => false,
                    'label' => 'contact_information.form.email'
                )
            )
//            ->add('altPhones')
//            ->add('extras')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Positibe\Bundle\ContactBundle\Entity\ContactInformation',
                'translation_domain' => 'PositibeContactBundle'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'positibe_contact_information';
    }
}
