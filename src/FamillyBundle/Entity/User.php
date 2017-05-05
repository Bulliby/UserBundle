<?php

namespace FamillyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="FamillyBundle\Repository\UserRepository")
 */
class User
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
	 *  pattern="/[a-zA-Z]+/",
	 *	match=false,
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
	 *  pattern="/[a-zA-Z]+/",
	 *  match=false,
	 *  message="Your surname must contain only letters"
	 * )
	 * @Assert\Length(
	 *  max = 20,
	 *  maxMessage = "Your name cannot be longer than {{ limit }} characters"
	 * )
     * @ORM\Column(name="surname", type="string", length=20)
     */
    private $surname;

    /**
     * @var \stdClass
     * @Assert\Image(
	 * maxSize="2M",
	 * maxSizeMessage="The picture is too heavy",
	 * mimeTypesMessage="This seems to not be an image",
     * )
     * @ORM\Column(name="picture", type="object", nullable=true)
     */
    private $picture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true, unique=true)
     */
    private $email;

    /**
     * @var string
     *
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
     * Set picture
     *
     * @param \stdClass $picture
     *
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \stdClass
     */
    public function getPicture()
    {
        return $this->picture;
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

