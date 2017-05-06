<?php

namespace FamillyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Bulliby\UserBundle\Entity\UserBase;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="FamillyBundle\Repository\UserRepository")
 */
class User extends UserBase
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
	 * @Assert\NotBlank()
	 * @Assert\Regex(
	 *  pattern="/^[a-zA-Z]+$/",
	 *	match=true,
	 *  message="Your name must contain only letters"
	 * )
	 * @Assert\Length(
	 *  max = 20,
	 *  maxMessage = "Your name cannot be longer than {{ limit }} characters"
	 * )
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var string
	 * @Assert\NotBlank
	 * @Assert\Regex(
	 *  pattern="/^[a-zA-Z]+$/",
	 *  match=true,
	 *  message="Your surname must contain only letters"
	 * )
	 * @Assert\Length(
	 *  max = 20,
	 *  maxMessage = "Your surname cannot be longer than {{ limit }} characters"
	 * )
     * @ORM\Column(name="surname", type="string", length=20)
     */
    private $surname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
	 * @Assert\Email(strict=true, checkMX=true)
     * @ORM\Column(name="email", type="string", length=100, nullable=true, unique=true)
     */
    private $email;

    /**
     * @var string
     *
	 * @Assert\NotBlank
	 * @Assert\Regex(
	 *  pattern="/^[a-zA-Z]+$/",
	 *  match=true,
	 *  message="Your family name must contain only letters"
	 * )
	 * @Assert\Length(
	 *  max = 20,
	 *  maxMessage = "Your family name cannot be longer than {{ limit }} characters"
	 * )
     * @ORM\Column(name="familly", type="string", length=20)
     */
    private $familly;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set familly
     *
     * @param string $familly
     *
     * @return User
     */
    public function setFamilly($familly)
    {
        $this->familly = $familly;

        return $this;
    }

    /**
     * Get familly
     *
     * @return string
     */
    public function getFamilly()
    {
        return $this->familly;
    }
}

