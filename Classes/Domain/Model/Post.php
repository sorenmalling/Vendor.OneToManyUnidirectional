<?php

namespace Vendor\OneToManyUnidirectional\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @Flow\Entity
 */
class Post {

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

}