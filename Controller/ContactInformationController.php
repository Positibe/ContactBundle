<?php
/**
 * This file is part of the PositibeLabs Projects.
 *
 * (c) Pedro Carlos Abreu <pcabreus@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Positibe\Bundle\ContactBundle\Controller;

use Positibe\Bundle\ContactBundle\Entity\ContactInformation;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class Controller
 * @package Positibe\Bundle\ContactBundle
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class ContactInformationController extends ResourceController
{
    public function findOr404(Request $request, array $criteria = array())
    {
        $resources = $this->resourceResolver->getResource(
            $this->getRepository(),
            'findAll'
        );
        if (count($resources) > 0) {
            $resource = $resources[0];
        } else {
            $resource = new ContactInformation();
        }

        return $resource;
    }
} 