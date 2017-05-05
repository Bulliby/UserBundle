<?php

namespace Bulliby\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validation\Constraints AS Assert;

/**
 * @UserBase
 */
class UserBase
{
    /**
     * @var string
	 * @Assert\Length(
	 *		min = 3,
     *      max = 20,
     *      minMessage = "Your login must be at least {{ limit }} characters long",
     *      maxMessage = "Your login cannot be longer than {{ limit }} characters
     * @ORM\Column(name="login", type="string", length=20)
     */
    protected $login;

    /**
     * @var string
	 * @Assert\Length(
	 *		min = 8,
     *      max = 20,
     *      minMessage = "Your password must be at least {{ limit }} characters long",
     *      maxMessage = "Your password cannot be longer than {{ limit }} characters
	 * @Assert\Regex(
     *     pattern="/\d+/",
     *     match=false,
     *     message="Your password must contain at least one numeric value"
     * )
	 * @Assert\Regex(
     *     pattern="/[^a-zA-Z\d\s:]/",
     *     match=flase,
     *     message="Your password must contain at least one non-alphanumeric character"
     * )
     * @ORM\Column(name="password", type="string", length=20)
     */
	protected $password;

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
     * Set login
     *
     * @param string $login
     *
     * @return UserBase
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param \stdClass $password
     *
     * @return UserBase
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return \stdClass
     */
    public function getPassword()
    {
        return $this->password;
    }
}

