<?php
/**
 * This script is part of the the-coding-owl/core and licensed under GPL-3.0-or-later.
 *
 * @Author: Kevin Ditscheid
 * @Date:   2019-06-08T21:34:59+02:00
 * @Email:  kevin@the-coding-owl.de
 * @Last modified by:   Kevin Ditscheid
 * @Last modified time: 2019-06-08T21:40:11+02:00
 * @License: GPL-3.0-or-later
 * @Copyright: Copyright (c) 2019 by Kevin Ditscheid. All Rights Reserved.
 */
 namespace TheCodingOwl\Core\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="languages")
 */
class Language
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;
    
    /**
     * @ORM\Column(type="string")
     */
    private $iso;
    
    /**
     * @ORM\Column(type="string")
     */
    private $langTag;
}
