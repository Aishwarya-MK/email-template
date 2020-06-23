<?php

namespace App\Controller;


use App\Entity\User;
use App\Services\UtilsGeneralHelper;
use App\Services\UtilsPdfHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(){
        return new RedirectResponse($this->generateUrl('sonata_admin_dashboard'));
    }

    /**
     * @Route("/test", name="test", methods={"GET"})
     */
    public function test()
    {
        $message = "Success";
        return UtilsGeneralHelper::getReturnMessage( Response::HTTP_ACCEPTED, $message);
    }

    /**
     * @Route("/api/test", name="test_jwt", methods={"GET"})
     */
    public function testJwt()
    {
        $message = "Success";
        return UtilsGeneralHelper::getReturnMessage( Response::HTTP_ACCEPTED, $message);
    }

}
