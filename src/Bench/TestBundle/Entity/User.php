<?php

namespace Bench\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="family", type="string", length=255)
     */
    private $family;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var integer
     *
     * ORM\Column(name="money", type="integer")
     * @ORM\OneToMany(targetEntity="Money", mappedBy="user")
     */
    private $money;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
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
     * Set family
     *
     * @param string $family
     * @return User
     */
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return string 
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set email
     *
     * @param string $email
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set money
     *
     * @param integer $money
     * @return User
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return integer 
     */
    public function getMoney()
    {
        return $this->money;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->money = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add money
     *
     * @param \BenchBundle\Entity\Money $money
     * @return User
     */
    public function addMoney(\Bench\TestBundle\Entity\Money $money)
    {
        $this->money[] = $money;

        return $this;
    }

    /**
     * Remove money
     *
     * @param \BenchBundle\Entity\Money $money
     */
    public function removeMoney(\Bench\TestBundle\Entity\Money $money)
    {
        $this->money->removeElement($money);
    }
    
    
    public function countTransactions() {
        return $this->money->count();
    }
    
    public function getTotal()
    {
        $sum = 0;
        foreach($this->money as $m)
        {
            $sum += $m->getAmount();
        }
        
        return $sum;
    }
    
    
}
