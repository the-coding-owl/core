<?php
/**
 * This script is part of the the-coding-owl/core and licensed under GPL-3.0-or-later.
 *
 * @Author: Kevin Ditscheid
 * @Date:   2019-06-08T20:37:11+02:00
 * @Email:  kevin@the-coding-owl.de
 * @Last modified by:   Kevin Ditscheid
 * @Last modified time: 2019-06-08T21:49:23+02:00
 * @License: GPL-3.0-or-later
 * @Copyright: Copyright (c) 2019 by Kevin Ditscheid. All Rights Reserved.
 */

namespace TheCodingOwl\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="pages")
 */
class Page
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlPath;

    /**
     * @ORM\OneToMany(targetEntity="TheCodingOwl\Core\Model\Content", mappedBy="page", orphanRemoval=true)
     */
    private $content;

    public function __construct()
    {
        $this->content = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUrlPath(): ?string
    {
        return $this->urlPath;
    }

    public function setUrlPath(string $urlPath): self
    {
        $this->urlPath = $urlPath;

        return $this;
    }

    /**
     * @return Collection|Content[]
     */
    public function getContent(): Collection
    {
        return $this->content;
    }

    public function addContent(Content $content): self
    {
        if (!$this->content->contains($content)) {
            $this->content[] = $content;
            $content->setPage($this);
        }

        return $this;
    }

    public function removeContent(Content $content): self
    {
        if ($this->content->contains($content)) {
            $this->content->removeElement($content);
            // set the owning side to null (unless already changed)
            if ($content->getPage() === $this) {
                $content->setPage(null);
            }
        }

        return $this;
    }
}
