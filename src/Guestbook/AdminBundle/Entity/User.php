<?php

namespace Guestbook\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Guestbook\AdminBundle\Repository\UserRepository")
 */
class User implements AdvancedUserInterface {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     */
    protected $username;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $salt;


    /**
     * @ORM\Column(type="string", length=80, unique=true)
     */
    protected $full_username;


    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
    }


    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }


    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }


    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }


    /**
     * @inheritDoc
     */
    public function equals(UserInterface $user)
    {
        return $this->username === $user->getUsername();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Set full_username
     *
     * @param string $fullUsername
     */
    public function setFullUsername($fullUsername)
    {
        $this->full_username = $fullUsername;
    }

    /**
     * Get full_username
     *
     * @return string
     */
    public function getFullUsername()
    {
        return $this->full_username;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }
}