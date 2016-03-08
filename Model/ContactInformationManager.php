<?php
/**
 * This file is part of the PositibeLabs Projects.
 *
 * (c) Pedro Carlos Abreu <pcabreus@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Positibe\Bundle\ContactBundle\Model;

use Doctrine\ORM\EntityManager;


/**
 * Class ContactInformationManager
 * @package Positibe\Bundle\ContactBundle\Model
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class ContactInformationManager
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getContactEmail()
    {
        $contactInformation = $this->getContactInformation();

        return $contactInformation->getEmail();
    }

    /**
     * @param array $criteria
     * @return null|\Positibe\Bundle\ContactBundle\Entity\ContactInformation
     */
    public function getContactInformation(array $criteria = array())
    {
        if (isset($criteria['name'])) {
            return $this->em->getRepository('PositibeContactBundle:ContactInformation')->findOneBy(
                array('name' => $criteria['name'])
            );
        } else {
            $contactInformations = $this->em->getRepository('PositibeContactBundle:ContactInformation')->findAll();

            //@todo Crear una forma de saber que información se está pidiendo
            if (count($contactInformations) === 0) {
                return null;
            }

            return $contactInformations[0];
        }
    }
} 