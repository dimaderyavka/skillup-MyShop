<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var bool
     * @Assert\NotBlank(groups={"Registration"})
     */
    private $acceptRules;

    public function __construct()
    {
        $this->username ='';
        $this->password = '';
        $this->email = '';
        $this->isActive = true;
        $this->roles = ['ROLE_USER'];
        $this->acceptRules = false;
    }

    /**
     * @return bool
     */
    public function isAcceptRules(){
        return $this->acceptRules;
    }

    /**
     * @param bool $acceptRules
     */
    public function setAcceptRules(bool $acceptRules): void
    {
        $this->acceptRules = $acceptRules;
    }
}