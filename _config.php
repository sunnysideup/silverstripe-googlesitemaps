<?php

use SilverStripe\Core\ClassInfo;
use SilverStripe\ORM\DataObject;
use Wilr\GoogleSitemaps\Extensions\GoogleSitemapExtension;
use Wilr\GoogleSitemaps\GoogleSitemap;
use Wilr\GoogleSitemaps\Interfaces\Sitemapable;

if (0 === strpos(ltrim($_SERVER['REQUEST_URI'], '/'), 'sitemap')) {
    foreach(ClassInfo::implementorsOf(Sitemapable::class) as $className) {
        GoogleSitemap::register_dataobject($className, 'daily');
    }
    foreach(ClassInfo::classesWithExtension(GoogleSitemapExtension::class, DataObject::class, false) as $className) {
        GoogleSitemap::register_dataobject($className, 'daily');
    }
}
