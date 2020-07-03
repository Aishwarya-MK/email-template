<?php

namespace App\Controller;

use App\Entity\EmailTemplate;
use App\Services\UtilsGeneralHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpFoundation\Request;use Symfony\Component\HttpFoundation\Response;use Symfony\Component\Routing\Annotation\Route;

class EmailTemplateController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return new RedirectResponse($this->generateUrl('sonata_admin_dashboard'));
    }

    /**
     * @Route("/test", name="test", methods={"GET"})
     */
    public function test()
    {
        $message = "Success";
        return UtilsGeneralHelper::getReturnMessage(Response::HTTP_ACCEPTED, $message);
    }

    /**
     * @Route("/api/test", name="test_jwt", methods={"GET"})
     */
    public function testJwt()
    {
        $message = "Success";
        return UtilsGeneralHelper::getReturnMessage(Response::HTTP_ACCEPTED, $message);
    }

    /**
     * @Route("/email_list", name="email_template_list")
     * get active template list
     */
    public function getTemplateList()
    {
        try {
            $templateList = array();
            $em = $this->getDoctrine()->getManager();
            $templateList = $em->getRepository(EmailTemplate::class)->getActiveTemplateList(EmailTemplate::IS_ACTIVE);
            return UtilsGeneralHelper::getReturnMessage(Response::HTTP_ACCEPTED, $templateList);
        } catch (\Exception $e) {
            return UtilsGeneralHelper::getErrorMessage(Response::HTTP_NOT_FOUND, $e->getMessage());
        }
    }

    /**
     * @Route("/email/{id}", name="masteremailTemplate")
     * get pdf preview url
     */
    public function getMasterEmailTemplate($id, Request $request)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $template = $em->getRepository(EmailTemplate::class)->getTemplateData($id);
            $data =$template[0];
            return UtilsGeneralHelper::getReturnMessage(Response::HTTP_ACCEPTED, $data);
        } catch (\Exception $e) {
            return UtilsGeneralHelper::getErrorMessage(Response::HTTP_NOT_FOUND, $e->getMessage());
        }
    }
}