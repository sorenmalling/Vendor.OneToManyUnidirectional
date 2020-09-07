<?php

namespace Vendor\OneToManyUnidirectional\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Vendor\OneToManyUnidirectional\Domain\Model\Blog;
use Vendor\OneToManyUnidirectional\Domain\Model\Post;
use Vendor\OneToManyUnidirectional\Domain\Repository\BlogRepository;

class BlogCommandController extends CommandController
{
    /**
     * @Flow\Inject
     * @var BlogRepository
     */
    protected $blogRepository;

    public function newCommand()
    {
        if ($this->blogRepository->countAll() > 0) {
            $this->output('You already have a blog');
            $this->sendAndExit();
        }
        $dog = new Blog();
        $this->blogRepository->add($dog);
    }

    public function addPostCommand()
    {

        /** @var Blog $dog */
        $dog = $this->blogRepository->findAll()->getFirst();

        $dog->addPost(new Post());
        $dog->addPost(new Post());

        $this->blogRepository->update($dog);

        \Neos\Flow\var_dump($dog->getPosts(), 'Posts');
    }

    public function removePostCommand(Post $post)
    {

        /** @var Blog $dog */
        $dog = $this->blogRepository->findAll()->getFirst();

        $dog->removePost($post);

        $this->blogRepository->update($dog);

        \Neos\Flow\var_dump($dog->getPosts(), 'Posts');
    }
}
