<?php

namespace Positibe\Bundle\ContactBundle\Form\Type;

use Positibe\Bundle\ContactBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ContactType
 * @package Positibe\Bundle\ContactBundle\Form\Type
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                null,
                array(
                    'required' => true,
                    'label' => 'contact.form.name',
                )
            )
            ->add(
                'email',
                'email',
                array(
                    'required' => true,
                    'label' => 'contact.form.email',
                )
            )
            ->add(
                'message',
                'textarea',
                array(
                    'required' => true,
                    'label' => 'contact.form.message',
                )
            )
            ->add(
                'state',
                'choice',
                array(
                    'label' => 'contact.form.state',
                    'choices' => array(
                        Contact::CONTACT_STATE_REQUESTED => 'contact.form.state_' . Contact::CONTACT_STATE_REQUESTED,
                        Contact::CONTACT_STATE_PROCESSING => 'contact.form.state_' . Contact::CONTACT_STATE_PROCESSING,
                        Contact::CONTACT_STATE_ANSWERED => 'contact.form.state_' . Contact::CONTACT_STATE_ANSWERED,
                        Contact::CONTACT_STATE_PENDING => 'contact.form.state_' . Contact::CONTACT_STATE_PENDING,
                    )
                )
            )
            ->add(
                'contactMethod',
                'choice',
                array(
                    'label' => 'contact.form.contactMethod',
                    'choices' => array(
                        Contact::CONTACT_METHOD_EMAIL => 'contact.form.method_' . Contact::CONTACT_METHOD_EMAIL,
                        Contact::CONTACT_METHOD_PHONE => 'contact.form.method_' . Contact::CONTACT_METHOD_PHONE,
                        Contact::CONTACT_METHOD_BOTH => 'contact.form.method_' . Contact::CONTACT_METHOD_BOTH,
                    )
                )
            );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Positibe\Bundle\ContactBundle\Entity\Contact',
                'translation_domain' => 'PositibeContactBundle'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'positibe_contact';
    }
}
