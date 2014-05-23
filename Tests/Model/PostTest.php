<?php

namespace Hautelook\InstagramBundle\Tests\Model;

use Hautelook\InstagramBundle\Tests\Fixtures\InstagramTestResponseObject;
use Hautelook\InstagramBundle\Tests\Fixtures\ResponseFixtures;
use Hautelook\InstagramBundle\Model\Comment;
use Hautelook\InstagramBundle\Model\User;
use Hautelook\InstagramBundle\Model\Image;
use Hautelook\InstagramBundle\Model\Post;

class PostTest extends \PHPUnit_Framework_TestCase
{
    public function testParse()
    {
        $createdTime = new \DateTime();

        $postUser = new User(
            400,
            'post user name',
            'post full name',
            'profile picture'
        );

        $user = new User(
            200,
            'user name',
            'full name',
            'profile picture'
        );

        $comments = array(
            new Comment(
                100,
                $createdTime,
                'some text',
                $user
            )
        );

        $images = array(
            'some key' => new Image(
                'some url',
                500,
                300
            )
        );

        $likes = array(
            new User(
                300,
                'like user name',
                'like full name',
                'like profile picture'
            )
        );

        $post = new Post(
            'some id',
            'some caption',
            $createdTime,
            'some link',
            $postUser,
            $likes,
            $comments,
            $images,
            500,
            300
        );

        $this->assertEquals(
            'some id',
            $post->getId()
        );

        $this->assertEquals(
            'some caption',
            $post->getCaption()
        );

        $this->assertEquals(
            $createdTime,
            $post->getCreatedTime()
        );

        $this->assertEquals(
            'some link',
            $post->getLink()
        );

        $this->assertSame(
            $postUser,
            $post->getUser()
        );

        $this->assertSame(
            $comments,
            $post->getComments()
        );

        $this->assertSame(
            $images,
            $post->getImages()
        );

        $this->assertSame(
            $likes,
            $post->getLikes()
        );

        $this->assertEquals(
            500,
            $post->getNumLikes()
        );

        $this->assertEquals(
            300,
            $post->getNumComments()
        );

        $this->assertEmpty(
            array_diff(
                array_keys($images),
                $post->getImageKeys()
            )
        );
    }
}
