<?php

namespace Bulliby\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author Wells Guillaume
 * @ORM\MappedSuperclass
 */
abstract class UserBase implements UserInterface
{
	/**
	 * @var string
	 * UserInterface Required
	 * @Assert\Length(
	 *	min=3,
	 *  max=20,
	 *  minMessage="Your login must be at least {{ limit }} characters long",
	 *  maxMessage="Your login cannot be longer than {{ limit }} characters"
	 *)
	 * @ORM\Column(name="username", type="string", length=20)
	 */
	protected $username;

	/**
	 * @var string
	 * @Assert\Length(
	 *	min = 8,
	 *  max = 20,
	 *  minMessage = "Your password must be at least {{ limit }} characters long",
	 *  maxMessage = "Your password cannot be longer than {{ limit }} characters"
	 * )
	 * @Assert\Regex(
	 *  pattern="/\d+/",
	 *  match=true,
	 *  message="Your password must contain at least one numeric value"
	 * )
	 * @Assert\Regex(
	 *  pattern="/[^a-zA-Z\d\s:]/",
	 *  match=true,
	 *  message="Your password must contain at least one non-alphanumeric character"
	 * )
	 * @ORM\Column(name="password", type="string", length=20)
	 */
	protected $password;

	/**
	 * @var array
	 * @ORM\Column(name="roles", type="array", nullable=false)
	 */
	protected $roles;

	/**
	 * @var string|null
	 * @ORM\Column(name="salt", type="string", nullable=true)
	 */
	protected $salt;

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
	 * Set username
	 *
	 * @param string $login
	 *
	 * @return UserBase
	 */
	public function setUsername($username)
	{
		$this->username = $username;

		return $this;
	}

	/**
	 * Get username
	 * UserInterface Required
	 *
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Set password
	 *
	 * @param string $password
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
	 * UserInterface Required
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get roles
	 * UserInterface Required
	 * Always return User for the moment
	 *
	 * @return array
	 */
    public function getRoles()
	{
		return array('ROLE_USER');
	}

	/**
	 * Get salt
	 * UserInterface Required
	 *
	 * @return string
	 */
    public function getSalt()
	{
		return $this->salt;
	}

	/**
	 * Remove sensitive data
	 * UserInterface Required
	 * Useless for me
	 *
	 */
    public function eraseCredentials()
	{
		;
	}
}
