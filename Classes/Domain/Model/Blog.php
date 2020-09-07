<?php

namespace Vendor\OneToManyUnidirectional\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @Flow\Entity
 */
class Blog {
    /**
     * @ORM\OneToMany
     * @var Collection<Post>
     */
    protected $posts;

    /**
     * Dog constructor.
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    public function addPost(Post $post): Blog
    {
        $this->posts->add($post);
        return $this;
    }

    public function removePost(Post $post): Blog
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
        }

        return $this;
    }
}