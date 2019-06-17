<?php
/**
 * This script is part of the the-coding-owl/core and licensed under GPL-3.0-or-later.
 *
 * @Author: Kevin Ditscheid
 * @Date:   2019-06-08T20:37:11+02:00
 * @Email:  kevin@the-coding-owl.de
 * @Last modified by:   Kevin Ditscheid
 * @Last modified time: 2019-06-08T21:41:16+02:00
 * @License: GPL-3.0-or-later
 * @Copyright: Copyright (c) 2019 by Kevin Ditscheid. All Rights Reserved.
 */


namespace TheCodingOwl\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="contents")
 */
class Content
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $bodytext;

    /**
     * @ORM\ManyToMany(targetEntity="TheCodingOwl\Core\Model\Media")
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity="TheCodingOwl\Core\Model\Group")
     */
    private $accessGroups;

    /**
     * @ORM\ManyToOne(targetEntity="TheCodingOwl\Core\Model\Page", inversedBy="content")
     * @ORM\JoinColumn(nullable=false)
     */
    private $page;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hideTitle;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->accessGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBodytext(): ?string
    {
        return $this->bodytext;
    }

    public function setBodytext(string $bodytext): self
    {
        $this->bodytext = $bodytext;

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
        }

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getAccessGroups(): Collection
    {
        return $this->accessGroups;
    }

    public function addAccessGroup(Group $accessGroup): self
    {
        if (!$this->accessGroups->contains($accessGroup)) {
            $this->accessGroups[] = $accessGroup;
        }

        return $this;
    }

    public function removeAccessGroup(Group $accessGroup): self
    {
        if ($this->accessGroups->contains($accessGroup)) {
            $this->accessGroups->removeElement($accessGroup);
        }

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getHideTitle(): ?bool
    {
        return $this->hideTitle;
    }

    public function setHideTitle(bool $hideTitle): self
    {
        $this->hideTitle = $hideTitle;

        return $this;
    }
}
