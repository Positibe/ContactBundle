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

use Positibe\Bundle\ContactBundle\Form\Type\FrontendContactType;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Resource\Event\ResourceEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;


/**
 * Class ContactController
 * @package Positibe\Bundle\ContactBundle\Controller
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class ContactController extends ResourceController
{
    public function contactFormAction(Request $request)
    {
        $resource = $this->createNew();
        $form = $this->createForm(new FrontendContactType(), $resource, array('action' => $this->generateUrl('positibe_contact_form')));

        if ($request->isMethod('POST') && $form->submit($request)->isValid()) {
            $resource = $this->domainManager->create($form->getData());

            if ($this->config->isApiRequest()) {
                if ($resource instanceof ResourceEvent) {
                    throw new HttpException($resource->getErrorCode(), $resource->getMessage());
                }

                return $this->handleView($this->view($resource, 201));
            }

            return $this->redirectHandler->redirect($request->server->get('HTTP_REFERER'));
        }

        $view = $this
            ->view()
            ->setTemplate($request->get('template', 'PositibeContactBundle:Form:create.html.twig'))
            ->setData(
                array(
                    $this->config->getResourceName() => $resource,
                    'form' => $form->createView(),
                )
            );

        return $this->handleView($view);
    }

} 