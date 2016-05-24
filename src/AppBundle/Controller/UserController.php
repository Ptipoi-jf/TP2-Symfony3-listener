<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use UserSvcBundle\Schema\Schema;

/**
 * Created by PhpStorm.
 * User: cdpn
 * Date: 24/05/16
 * Time: 13:46
 */

class UserController extends Controller
{
    /**
     * @Route("/users", name="userspage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function userAction(Request $request)
    {
        /** @var Schema $service */
        $service = $this->get('usersvc_schema');
        $users = $service->getUsers();
        $paramstwigs = array(
            'users' => $users
        );

        return $this->render('user/index.html.twig', $paramstwigs);
    }
}