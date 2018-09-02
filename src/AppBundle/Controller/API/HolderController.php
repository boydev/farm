<?php

namespace AppBundle\Controller\API;

use AppBundle\Entity\Holder;
use AppBundle\Repository\Holder as HolderRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HolderController extends Controller
{
    /**
     * @Route("/api/holder/add", name="api_holder_add")
     * @Method("POST")
     * @param Request $request
     * @return Response
     */
    public function addAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $newHolder = new Holder($data);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newHolder);
            $em->flush();
        } catch (\Exception $e){
            return new Response('Bad request', 400);
        }
        return new Response('Holder added', 201);
    }

    /**
     * @Route("/api/holder/get/{$egn}", name="api_holder_get")
     * @Method("GET")
     * @return Response
     * @internal param Request $request
     */
    public function getAction($egn)
    {
        /** @var HolderRepository $repo */
        $repo = $this->getDoctrine()->getRepository('AppBundle:Holder');
        $holder = $repo->findOneByEgn($egn);
        if (count($holder) > 0) {
           return new Response(json_encode($holder), 201);
        } else {
            return new Response('Holder not found', 404);
        }
    }
}
