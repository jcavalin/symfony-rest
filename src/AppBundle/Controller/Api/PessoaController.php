<?php

namespace AppBundle\Controller\Api;

use FOS\RestBundle\Controller\Annotations\Version;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Version("v1")
 *
 * Class PessoaController
 * @package AppBundle\Controller\Api
 */
class PessoaController extends Controller
{
    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method",
     *  filters={
     *      {"name"="a-filter", "dataType"="integer"},
     *      {"name"="another-filter", "dataType"="string", "pattern"="(foo|bar) ASC|DESC"}
     *  }
     * )
     * @Route("/api/{version}/pessoa")
     * @Method("GET")
     */
    public function newAction()
    {
        $response = [
            'links' => [
                'self' => '',
                'next' => '',
                'last' => '',
            ],
            'data' => []
        ];

        return new Response(json_encode($response));
    }


}