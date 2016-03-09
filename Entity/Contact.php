<?php

namespace Positibe\Bundle\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Contact
 *
 * @ORM\Table(name="positibe_contact")
 * @ORM\Entity
 */
class Contact
{
    const CONTACT_METHOD_BOTH = 'both';
    const CONTACT_METHOD_EMAIL = 'email';
    const CONTACT_METHOD_PHONE = 'phone';

    const CONTACT_STATE_REQUESTED = 'requested';
    const CONTACT_STATE_PROCESSING = 'processing';
    const CONTACT_STATE_PENDING = 'pending';
    const CONTACT_STATE_ANSWERED = 'answered';

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string $body
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="state", type="string", length=255,)
     */
    private $state = self::CONTACT_STATE_REQUESTED;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contact_method", type="string", length=255)
     */
    private $contactMethod = self::CONTACT_METHOD_EMAIL;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"email"}, updatable=false, suffix="__")
     * @ORM\Column(name="contact_code", type="string", length=255)
     */
    private $contactCode;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->contactCode = uniqid('contact_');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getContactMethod()
    {
        return $this->contactMethod;
    }

    /**
     * @param \DateTime $contactMethod
     */
    public function setContactMethod($contactMethod)
    {
        $this->contactMethod = $contactMethod;
    }

    /**
     * @return \DateTime
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param \DateTime $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getContactCode()
    {
        return $this->contactCode;
    }

    /**
     * @param string $contactCode
     */
    public function setContactCode($contactCode)
    {
        $this->contactCode = $contactCode;
    }
}