<?php

namespace Bulliby\UserBundle\Model;

use Doctrine\ORM\EntityManager;
use Bulliby\UserBundle\Model\BaseManager;
use FamillyBundle\Entity\User;

class UserManager extends BaseManager
{
	public function __construct(EntityManager $em)
	{
		$this->em = $em;
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

	public function saveUser(User $user)
	{
		$this->persistAndFlush($user);
	}

}
