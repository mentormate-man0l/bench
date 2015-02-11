<?php

namespace Bench\TestBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Bench\TestBundle\Entity\Money;

/**
 * Money controller.
 *
 * @Route("/money")
 */
class MoneyController extends Controller
{

    /**
     * Lists all Money entities.
     *
     * @Route("/", name="money")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenchTestBundle:Money')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Money entity.
     *
     * @Route("/{id}", name="money_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenchTestBundle:Money')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Money entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
