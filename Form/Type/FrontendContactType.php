<?php

namespace Positibe\Bundle\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class FrontendContactType
 * @package Positibe\Bundle\ContactBundle\Form\Type
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class FrontendContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('state')
            ->remove('contactMethod')
        ;
    }

    public function getParent()
    {
        return 'positibe_contact';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'positibe_contact_frontend';
    }
}
