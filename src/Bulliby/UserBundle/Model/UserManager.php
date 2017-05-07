<?php

namespace Bulliby\UserBundle\Model;

use Doctrine\ORM\EntityManager;
use Bulliby\UserBundle\Model\BaseManager;
use FamillyBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder as Encoder;

class UserManager extends BaseManager
{
	private $encoder;

	public function __construct(EntityManager $em, Encoder $encoder)
	{
		$this->em = $em;
		$this->encoder = $encoder;
	}

	public function getRepository()
	{
		return $this->em->getRepository('FamillyBundle:User');
	}

	public function loadUser($userId)
	{
		return $this->getRepository()->findOneBy(array('id' => $userId));
	}

	public function createUser()
	{
		$user = new User();
		return $user;
	}

	public function saveCreatedUser(User $user)
	{
		$encoded = $this->encoder->encodePassword($user, $user->getPassword());
		$user->setPassword($encoded);
		$this->persistAndFlush($user);
	}

}
