<?php

namespace Positibe\Bundle\ContactBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ContactInformation
 *
 * @ORM\Table(name="positibe_contact_information")
 * @ORM\Entity
 */
class ContactInformation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=TRUE)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="enterpriseName", type="string", length=255, nullable=TRUE)
     */
    private $enterpriseName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=TRUE)
     */
    private $streetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="regionAddress", type="string", length=255, nullable=TRUE)
     */
    private $regionAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=TRUE)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="altPhones", type="array")
     */
    private $altPhones;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=TRUE)
     */
    private $email;

    /**
     * @var array
     *
     * @ORM\Column(name="extras", type="array")
     */
    private $extras;

    public function __construct()
    {
        $this->altPhones = new ArrayCollection();
        $this->extras = new ArrayCollection();
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
    public function getAltPhones()
    {
        return $this->altPhones;
    }

    /**
     * @param string $altPhones
     */
    public function setAltPhones($altPhones)
    {
        $this->altPhones = $altPhones;
    }

    public function addAltPhone($phone)
    {
        $this->altPhones[] = $phone;

        return $this->altPhones;
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
    public function getEnterpriseName()
    {
        return $this->enterpriseName;
    }

    /**
     * @param string $enterpriseName
     */
    public function setEnterpriseName($enterpriseName)
    {
        $this->enterpriseName = $enterpriseName;
    }

    /**
     * @return array
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @param array $extras
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    public function addExtra($data, $value)
    {
        $this->extras[$data] = $value;
        return $this;
    }

    public function getExtra($data)
    {
        return $this->extras[$data];
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getRegionAddress()
    {
        return $this->regionAddress;
    }

    /**
     * @param string $regionAddress
     */
    public function setRegionAddress($regionAddress)
    {
        $this->regionAddress = $regionAddress;
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param string $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }
}
