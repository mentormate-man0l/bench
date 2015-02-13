<?php

namespace Bench\TestBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Bench\TestBundle\Entity\User;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
     *
     * @Route("/", name="user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("BenchTestBundle:User");

        //$entities = $em->getRepository('BenchTestBundle:User')->findAll();
         $q = $repo->createQueryBuilder('u')
                ->select('u')->getQuery();
         
         $q->useResultCache(true, 3600, 'bench_app');
         $entities = $q->getResult();

        return array(
            'entities' => $entities,
        );
    }
    
        /**
     * Lists all User entities.
     *
     * @Route("/money", name="usermoney")
     * @Method("GET")
     * @Template()
     */
    public function moneyAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenchTestBundle:User')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    
    /**
     * Finds and displays a User entity.
     *
     * @Route("/money2", name="usermoney2")
     * @Method("GET")
     * @Template("BenchTestBundle:User:money.html.twig")
     */
    public function money2Action()
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository("BenchTestBundle:User");
        $qb = $repo->createQueryBuilder('u')
                ->select('u')
                ->leftJoin('u.money', 'm')
                ->addSelect('m');       
                
        $entities = $qb->getQuery()->getResult();
        
        return array(
            'entities'      => $entities,
        );
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenchTestBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
