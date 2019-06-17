<?php
/**
 * This script is part of the the-coding-owl/core and licensed under GPL-3.0-or-later.
 *
 * @Author: Kevin Ditscheid
 * @Date:   2019-06-07T23:02:39+02:00
 * @Email:  kevin@the-coding-owl.de
 * @Last modified by:   Kevin Ditscheid
 * @Last modified time: 2019-06-08T21:58:56+02:00
 * @License: GPL-3.0-or-later
 * @Copyright: Copyright (c) 2019 by Kevin Ditscheid. All Rights Reserved.
 */

namespace TheCodingOwl\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="alias")
 */
 class Alias
 {
     /**
      * @ORM\Id()
      * @ORM\GeneratedValue()
      * @ORM\Column(type="integer")
      * @var int
      */
     private $id;
     
     /**
      * @ORM\Column(type="string", length=255)
      * @var string
      */
     private $host;

     /**
      * @ORM\Column(type="string", length=255)
      * @var string
      */
     private $scheme;

     /**
      * @ORM\Column(type="string", length=255, nullable=true)
      * @var string
      */
     private $path;
     
     /**
      * @ORM\ManyToOne(targetEntity="TheCodingOwl\Core\Model\Domain", inversedBy="alias")
      * @var string
      */
     private $domain;
 
\ \ \ \ /**
\ \ \ \ \ *\ Get\ the\ value\ of\ Id
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ int
\ \ \ \ \ */
\ \ \ \ public\ function\ getId():\ int
\ \ \ \ {
\ \ \ \ \ \ \ \ return\ $this->id;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Set\ the\ value\ of\ Id
\ \ \ \ \ *
\ \ \ \ \ *\ @param\ int\ id
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ self
\ \ \ \ \ */
\ \ \ \ public\ function\ setId(int\ $id):\ self
\ \ \ \ {
\ \ \ \ \ \ \ \ $this->id\ =\ $id;

\ \ \ \ \ \ \ \ return\ $this;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Get\ the\ value\ of\ Host
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ string
\ \ \ \ \ */
\ \ \ \ public\ function\ getHost():\ string
\ \ \ \ {
\ \ \ \ \ \ \ \ return\ $this->host;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Set\ the\ value\ of\ Host
\ \ \ \ \ *
\ \ \ \ \ *\ @param\ string\ host
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ self
\ \ \ \ \ */
\ \ \ \ public\ function\ setHost(string\ $host):\ self
\ \ \ \ {
\ \ \ \ \ \ \ \ $this->host\ =\ $host;

\ \ \ \ \ \ \ \ return\ $this;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Get\ the\ value\ of\ Scheme
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ string
\ \ \ \ \ */
\ \ \ \ public\ function\ getScheme():\ string
\ \ \ \ {
\ \ \ \ \ \ \ \ return\ $this->scheme;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Set\ the\ value\ of\ Scheme
\ \ \ \ \ *
\ \ \ \ \ *\ @param\ string\ scheme
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ self
\ \ \ \ \ */
\ \ \ \ public\ function\ setScheme(string\ $scheme):\ self
\ \ \ \ {
\ \ \ \ \ \ \ \ $this->scheme\ =\ $scheme;

\ \ \ \ \ \ \ \ return\ $this;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Get\ the\ value\ of\ Path
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ string
\ \ \ \ \ */
\ \ \ \ public\ function\ getPath():\ string
\ \ \ \ {
\ \ \ \ \ \ \ \ return\ $this->path;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Set\ the\ value\ of\ Path
\ \ \ \ \ *
\ \ \ \ \ *\ @param\ string\ path
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ self
\ \ \ \ \ */
\ \ \ \ public\ function\ setPath(string\ $path):\ self
\ \ \ \ {
\ \ \ \ \ \ \ \ $this->path\ =\ $path;

\ \ \ \ \ \ \ \ return\ $this;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Get\ the\ value\ of\ Domain
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ string
\ \ \ \ \ */
\ \ \ \ public\ function\ getDomain():\ string
\ \ \ \ {
\ \ \ \ \ \ \ \ return\ $this->domain;
\ \ \ \ }

\ \ \ \ /**
\ \ \ \ \ *\ Set\ the\ value\ of\ Domain
\ \ \ \ \ *
\ \ \ \ \ *\ @param\ string\ domain
\ \ \ \ \ *
\ \ \ \ \ *\ @return\ self
\ \ \ \ \ */
\ \ \ \ public\ function\ setDomain(string\ $domain):\ self
\ \ \ \ {
\ \ \ \ \ \ \ \ $this->domain\ =\ $domain;

\ \ \ \ \ \ \ \ return\ $this;
\ \ \ \ }

}
