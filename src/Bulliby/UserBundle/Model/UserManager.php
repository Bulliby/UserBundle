<?php

namespace Bulliby\UserBundle\Model;

use Bulliby\UserBundle\Model\BaseManager;
use FamillyBundle\Entity\User;
use Bulliby\UserBundle\Event\UserEvent;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface as Dispatcher;

class UserManager extends BaseManager
{

	private $dispatcher;

	public function __construct(EntityManager $em, Dispatcher $dispatcher)
	{
		$this->em = $em;
		$this->dispatcher = $dispatcher;
	}

	private function getRepository()
	{
		return $this->em->getRepository('FamillyBundle:User');
	}

	public function loadUser(array $userDetails)
	{
		return $this->getRepository()->findOneBy($userDetails);
	}

	public function createUser()
	{
		$user = new User();
		return $user;
	}

	public function saveUser(User $user)
	{
		$this->dispatcher->dispatch('user.create', new UserEvent($user));
		$this->persistAndFlush($user);
	}
}
