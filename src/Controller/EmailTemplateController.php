<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EmailTemplateController extends AbstractController
{
    /**
     * @Route("/email/template", name="email_template")
     */
    public function index()
    {
        return $this->render('email_template/index.html.twig', [
            'controller_name' => 'EmailTemplateController',
        ]);
    }
}
