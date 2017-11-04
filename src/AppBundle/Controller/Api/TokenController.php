<?php
namespace AppBundle\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations\Version;

/**
 * Class TokenController
 * @package AppBundle\Controller\Api
 *
 * @Version("v1")
 */
class TokenController extends BaseApiController
{
    /**
     * @Route("/api/{version}/tokens")
     * @Method("POST")
     */
    public function newTokenAction(Request $request)
    {
        $user = $request->get('user');
        $password = $request->get('password');

        if (!$user) {
            throw $this->createNotFoundException();
        }

        $isValid = 'test' === $user && '123' === $password;

        if (!$isValid) {
            throw new BadCredentialsException();
        }

        $token = $this->get('lexik_jwt_authentication.encoder')
            ->encode([
                'username' => 'Test',
                'exp' => time() + 3600 // 1 hour expiration
            ]);

        return new JsonResponse(['token' => $token]);
    }
}