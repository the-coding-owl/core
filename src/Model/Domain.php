<?php
/**
 * This script is part of the the-coding-owl/core and licensed under GPL-3.0-or-later.
 *
 * @Author: Kevin Ditscheid
 * @Date:   2019-06-07T23:00:53+02:00
 * @Email:  kevin@the-coding-owl.de
 * @Last modified by:   Kevin Ditscheid
 * @Last modified time: 2019-06-08T21:31:01+02:00
 * @License: GPL-3.0-or-later
 * @Copyright: Copyright (c) 2019 by Kevin Ditscheid. All Rights Reserved.
 */

namespace TheCodingOwl\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="domains")
 */
class Domain
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
    private $host;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $scheme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $layout;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @ORM\OneToMany(targetEntity="TheCodingOwl\Core\Model\Navigation", mappedBy="domain", orphanRemoval=true)
     */
    private $navigations;

    /**
     * @ORM/OneToMany(targetEntity="TheCodingOwl\Core\Model\Page", mappedBy="domain", orphanRemoval=true)
     */
    private $pages;
    
    /**
     * @ORM\OneToOne(targetEntity="TheCodingOwl\Core\Model\Page", cascade={"persist", "remove"})
     */
    private $startpage;
    
    /**
     * @ORM\OneToMany(targetEntity="TheCodingOwl\Core\Model\Alias", mappedBy="domain", orphanRemoval=true)
     */
    private $alias;

    public function __construct()
    {
        $this->navigations = new ArrayCollection();
        $this->alias = new ArrayCollection();
        $this->pages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    public function setScheme(string $scheme): self
    {
        $this->scheme = $scheme;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getLayout(): ?string
    {
        return $this->layout;
    }

    public function setLayout(string $layout): self
    {
        $this->layout = $layout;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Collection|Navigation[]
     */
    public function getNavigations(): Collection
    {
        return $this->navigations;
    }

    public function addNavigation(Navigation $navigation): self
    {
        if (!$this->navigations->contains($navigation)) {
            $this->navigations[] = $navigation;
            $navigation->setDomain($this);
        }

        return $this;
    }

    public function removeNavigation(Navigation $navigation): self
    {
        if ($this->navigations->contains($navigation)) {
            $this->navigations->removeElement($navigation);
            // set the owning side to null (unless already changed)
            if ($navigation->getDomain() === $this) {
                $navigation->setDomain(null);
            }
        }

        return $this;
    }

    public function getStartpage(): ?Page
    {
        return $this->startpage;
    }

    public function setStartpage(Page $startpage): self
    {
        $this->startpage = $startpage;

        return $this;
    }
    
    /**
     * @return Collection\Alias[]
     */
    public function getAlias(): Collection
    {
        return $this->alias;
    }
    
    public function addAlias(Alias $alias): self
    {
        if (!$this->alias->contains($alias)) {
            $this->alias[] = $alias;
            $alias->setDomain($this);
        }

        return $this;
    }
    
    public function removeAlias(Alias $alias): self
    {
        if (!$this->alias->contains($alias)) {
            $this->alias->removeElement($alias);
            if ($alias->getDomain() === $this) {
                $alias->setDomain(null);
            }
        }
        
        return $this;
    }
    
    /**
     * @return Collection\Page[]
     */
    public function getPages(): Collection
    {
        return $this->pages;
    }
    
    public function addPage(Page $page): self
    {
        if (!$this->pages->contains($page)) {
            $this->pages[] = $pages;
            $page->setDomain($this);
        }

        return $this;
    }
    
    public function removePage(Page $page): self
    {
        if (!$this->pages->contains($page)) {
            $this->pages->removeElement($page);
            if ($page->getDomain() === $this) {
                $page->setDomain(null);
            }
        }
        
        return $this;
    }
}
