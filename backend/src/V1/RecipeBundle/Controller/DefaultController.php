<?php

namespace V1\RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function listAction($name)
    {
        return $this->render('V1RecipeBundle:Default:index.html.twig', array('name' => $name));
    }
}
