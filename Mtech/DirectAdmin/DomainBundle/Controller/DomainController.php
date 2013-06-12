<?php

namespace Mtech\DirectAdmin\DomainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VanOns\DirectAdminApi\DirectAdmin;

class DomainController extends Controller
{
    public function showAction($user)
    {

        /**
         * @var DirectAdmin $directAdmin
         */
        $directAdmin = $this->get('direct_admin');
        $user = $directAdmin->getUser($user);

        $domains = $directAdmin->getDomains($user);

        return $this->render('MtechDirectAdminDomainBundle:Default:index.html.twig', array('domains' => $domains));
    }
}
