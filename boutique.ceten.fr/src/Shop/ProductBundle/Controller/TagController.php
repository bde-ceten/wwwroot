<?php

namespace Shop\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use JMS\Serializer\SerializationContext;


/**
 * @Route("/categories")
 */
class TagController extends Controller
{
    /**
     * @Route(".{_format}", name="shop_tag_index", defaults={"_format": "html"})
     * @Method({"GET"})
     * @Template("::layout.html.twig")
     */
    public function indexAction($_format)
    {   
        $em = $this->container->get('doctrine.orm.entity_manager');
        $tags = $em->getRepository('CetenCetenBundle:Tag')->findBy(array(), array('position' => 'ASC'));

        if ($_format === 'json') {
            $json = $this
                        ->container
                        ->get('jms_serializer')
                        ->serialize($tags, 'json', SerializationContext::create()->setGroups(array('tag_list')));

            return new Response($json, 200, array(
                'Context-Type' => 'application/json; charset=utf-8'
            ));
        }
        return array();
    }

    /**
     * @Route("/{slug}.{_format}", name="shop_tag_slug", defaults={"_format": "html"})
     * @Method({"GET"})
     * @Template("::layout.html.twig")
     */
    public function slugAction($slug, $_format)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $tag = $em->getRepository('CetenCetenBundle:Tag')->findOneBy(array('slug' => $slug));

        if (!$tag) {
            throw new NotFoundHttpException(sprintf('Tag "%s" not found', $slug));
        }

        if ($_format === 'json') {
            $json = $this
                        ->container
                        ->get('jms_serializer')
                        ->serialize($tag, 'json', SerializationContext::create()->setGroups(array('tag_detail')));

            return new Response($json, 200, array(
                'Context-Type' => 'application/json; charset=utf-8'
            ));
        }

        return array(
            'tag' =>  $tag
        );
    }
}
