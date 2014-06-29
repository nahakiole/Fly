<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 29.06.14
 * Time: 14:31
 */

namespace Nahakiole\FlyBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nahakiole\FlyBundle\Entity\Role;
use Nahakiole\FlyBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAware;

class LoadUserData extends ContainerAware implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $adminRole = new Role();
        $adminRole->setRole('ROLE_ADMIN');
        $adminRole->setName('Administrator');
        $manager->persist($adminRole);

        $userRole = new Role();
        $userRole->setRole('ROLE_USER');
        $userRole->setName('User');
        $manager->persist($userRole);

        $user = new User();
        $user->setUsername('admin');
        $user->setName('Glauser');
        $user->setPrename('Robin');
        $user->addRole($adminRole);
        $user->addRole($userRole);
        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user);
        $password = $encoder->encodePassword('123456', $user->getSalt());
        $user->setPassword($password);

        $manager->persist($user);

        $manager->flush();
    }
} 