<?php

namespace Bench\TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bench\TestBundle\Entity\User;
use Bench\TestBundle\Entity\Money;

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
            
            for($j = 0; $j < 100; $j++)
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
