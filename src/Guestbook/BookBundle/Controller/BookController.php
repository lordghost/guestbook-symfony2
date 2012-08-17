<?php

namespace Guestbook\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Guestbook\BookBundle\Entity\Post;
use Guestbook\BookBundle\Form\Book\PostForm;


class BookController extends Controller
{

    public function indexAction()
    {
#$factory = $this->get('security.encoder_factory');
#$user = new \Guestbook\AdminBundle\Entity\User();

#$encoder = $factory->getEncoder($user);
#$password = $encoder->encodePassword('toor', $user->getSalt());
#print $password."<br>";
#print $user->getSalt();

	$all_posts = $this->getDoctrine()
		    ->getRepository('GuestbookBookBundle:Post')
		    ->findAllPosts($approved = true);

        return $this->render('GuestbookBookBundle:Book:index.html.twig',
			     array('posts' => $all_posts)
		    );
    }


    public function aboutAction()
    {
	return $this->render('GuestbookBookBundle:Book:about.html.twig');
    }


    public function sidebarAction() {
	$form = $this->createForm(new PostForm());

	return $this->render('GuestbookBookBundle:Book:post_form.html.twig',
			     array('form' => $form->createView()));
    }


    public function postCommentAction() {
	$new_post = new Post();

	$request = $this->getRequest();
	$form = $this->createForm(new PostForm(), $new_post);
	$form->bindRequest($request);

	if ($form->isValid()) {
	    $em = $this->getDoctrine()->getEntityManager();
	    $em->persist($new_post);
	    $em->flush();
	}

	return $this->redirect($this->generateUrl("GuestbookBookBundle_homepage"));
    }

} // class
