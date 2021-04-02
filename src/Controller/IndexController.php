<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @Route("/{route}", name="vue_pages", requirements={"route"="^(?!.*api).+"})
     */
    public function index(Request $request): Response
    {
        $routeparam = $request->attributes->get('_route_params');
        $routename = $request->attributes->get('_route');


        if( ($routename == "index") || array_search ( "fr", $routeparam) || array_search ( "fr/home", $routeparam) || array_search ( "fr/user", $routeparam) || array_search ( "fr/skills", $routeparam) || array_search ( "fr/portfolio", $routeparam) || array_search ( "fr/contact", $routeparam)){
            return $this->render('base.html.twig');
        }else{
            return $this->render('erreur.html.twig');
        };

    }
}