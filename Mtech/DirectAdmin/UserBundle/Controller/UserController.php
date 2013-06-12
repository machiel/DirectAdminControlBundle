<?php

namespace Mtech\DirectAdmin\UserBundle\Controller;

use Mtech\DirectAdmin\UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VanOns\DirectAdminApi\DirectAdmin;
use VanOns\DirectAdminApi\Models\User;

class UserController extends Controller
{

    public function indexAction()
    {

        /**
         * @var DirectAdmin $directAdmin
         */
        $directAdmin = $this->get('direct_admin');
        $users = $directAdmin->getAllUsers();

        $user = new User();

        $form = $this->createForm(new UserType(), $user, array(
                'directAdmin' => $directAdmin
            ));

        return $this->render('MtechDirectAdminUserBundle:Default:index.html.twig', array('users' => $users, 'form' => $form->createView()));
    }

    public function addAction(Request $request) {

        /**
         * @var DirectAdmin $directAdmin
         */
        $directAdmin = $this->get('direct_admin');

        $user = new User();
        $form = $this->createForm(new UserType(), $user, array('directAdmin' => $directAdmin));
        $form->submit($request);

        if($form->isValid()) {

            $result = $directAdmin->createUser($user);

            if(isset($result['error'])) {
                $error = $result['error'];
                if($error == 0) {
                    $this->get('session')->getFlashBag()->add('success', 'user.added');
                } else {
                    $this->get('session')->getFlashBag()->add('error', 'user.not.added');
                }
            }

        }

        return $this->redirect($this->generateUrl('users_show'));
    }
}
