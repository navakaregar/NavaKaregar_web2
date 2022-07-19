<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/{_locale}", name: "app_home",defaults: {"_locale":"en"},requirements={"_locale":"en/fa"})

     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig',[]);
    }
}
