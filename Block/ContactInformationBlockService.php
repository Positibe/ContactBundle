<?php
/**
 * This file is part of the PositibeLabs Projects.
 *
 * (c) Pedro Carlos Abreu <pcabreus@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Positibe\Bundle\ContactBundle\Block;

use Positibe\Bundle\ContactBundle\Model\ContactInformationManager;
use Positibe\Bundle\OrmBlockBundle\Block\Service\AbstractBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class ContactInformationBlockService
 * @package Positibe\Bundle\ContactBundle\Block
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class ContactInformationBlockService extends AbstractBlockService
{
    protected $template = 'PositibeContactBundle:Block:block_contact_information.html.twig';
    private $contactInformationManager;

    /**
     * @param string $name
     * @param \Symfony\Bundle\FrameworkBundle\Templating\EngineInterface $templating
     * @param ContactInformationManager $contactInformationManager
     * @param null $template
     */
    public function __construct(
        $name,
        $templating,
        ContactInformationManager $contactInformationManager,
        $template = null
    ) {
        if ($template) {
            $this->template = $template;
        }
        parent::__construct($name, $templating);
        $this->contactInformationManager = $contactInformationManager;
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        if (!$response) {
            $response = new Response();
        }

        if ($contactInformation = $this->contactInformationManager->getContactInformation()) {
            $response = $this->renderResponse(
                $blockContext->getTemplate(),
                array(
                    'block' => $blockContext->getBlock(),
                    'contact_information' => $contactInformation
                ),
                $response
            );
        }

        $response->setTtl($blockContext->getSetting('ttl'));
        return $response;
    }

    public function getCacheKeys(BlockInterface $block)
    {
        return array('type' => $block->getType());
    }


} 