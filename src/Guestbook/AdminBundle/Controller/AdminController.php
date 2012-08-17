<?php

namespace Guestbook\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller
{

    public function indexAction() {
        $waiting_posts = $this->getDoctrine()
                    ->getRepository('GuestbookBookBundle:Post')
                    ->findAllPosts($approved = false);
        return $this->render('GuestbookAdminBundle:Admin:index.html.twig',
                             array('waiting_posts' => $waiting_posts));
    }


    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('GuestbookAdminBundle:Admin:login.html.twig',
                array(
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error' => $error,
                )
        );
    }


    public function approvePostAction($postid) {
        return $this->render('GuestbookAdminBundle:Admin:index.html.twig');
    }
}
