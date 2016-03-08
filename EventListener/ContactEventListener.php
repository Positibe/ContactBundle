<?php
/**
 * This file is part of the PositibeLabs Projects.
 *
 * (c) Pedro Carlos Abreu <pcabreus@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Positibe\Bundle\ContactBundle\EventListener;

use Positibe\Bundle\ContactBundle\Entity\Contact;
use Positibe\Bundle\ContactBundle\Model\ContactInformationManager;
use Sylius\Component\Mailer\Sender\Sender;
use Sylius\Component\Resource\Event\ResourceEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Class ContactEventListener
 * @package Positibe\Bundle\ContactBundle\EventListener
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class ContactEventListener implements EventSubscriberInterface
{
    private $contactInformationManager;
    private $emailSender;

    public function __construct(Sender $emailSender, ContactInformationManager $contactInformationManager)
    {
        $this->contactInformationManager = $contactInformationManager;
        $this->emailSender = $emailSender;
    }

    /**
     * @return array|void
     */
    public static function getSubscribedEvents()
    {
        return array(
            'positibe.contact.post_create' => 'onPostCreate'
        );
    }

    public function onPostCreate(ResourceEvent $event)
    {
        /** @var Contact $contact */
        $contact = $event->getSubject();
        $this->emailSender->send(
            'contact',
            array($this->getContactEmail()),
            array(
                'subject' => sprintf(
                    'Mensaje de contacto de %s <%s>. Code: %s',
                    $contact->getName(),
                    $contact->getEmail(),
                    $contact->getContactCode()
                ),
                'contact' => $contact,
            )
        );
    }

    public function getContactEmail()
    {
        return $this->contactInformationManager->getContactEmail();
    }
} 