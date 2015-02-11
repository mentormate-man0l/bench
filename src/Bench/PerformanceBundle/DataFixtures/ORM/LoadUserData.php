<?php

namespace Bench\PerformanceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bench\PerformanceBundle\Entity\User;
use Bench\PerformanceBundle\Entity\Money;

/**
 * Description of LoadUserData
 *
 * @author manol.trendafilov
 */
class LoadUserData implements FixtureInterface
{
    //put your code here
    public function load(ObjectManager $manager)
    {
        
        for($i = 0; $i < 100; $i++) {
            
            
            
            $user = new User;
            $user->setName('User_'.$i);
            $user->setEmail("user_$i@email.com");
            $user->setFamily('Family');
            $user->setCreatedAt(new \DateTime());
            
            $manager->persist($user);
            
            for($i = 0; $i < 100; $i++)
            {
                $money = new Money;
                $money->setAmount(rand(0, 100));
                $money->setDateAt(new \DateTime());
                $money->setUser($user);
                
                $manager->persist($money);
            }
            
            $manager->flush();

        }
        
        
         
    }
    
}
