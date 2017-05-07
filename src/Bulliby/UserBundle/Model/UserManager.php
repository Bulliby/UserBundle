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
		$this->dispatcher->dispatch('user.create', new UserEvent($user));
		$this->persistAndFlush($user);
	}

}
