<?php

namespace Guestbook\BookBundle\Form\Book;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class PostForm extends AbstractType {
    public function buildForm(FormBuilder $builder, array $options) {
        $builder
            ->add('name')
            ->add('email')
            ->add('comment', 'textarea', array('attr' => array('rows' => 4)));
    }


    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Guestbook\BookBundle\Entity\Post',
	    );
    }


    public function getName() { return 'post'; }
}
