<?php
require_once('../../includes/common.php');
use samdark\sitemap\Sitemap;
use samdark\sitemap\Index;


if(isset($_POST['sitemap']))
{
   // create sitemap
    $sitemap = new Sitemap($_SERVER['DOCUMENT_ROOT'] . '/sitemap.xml');

    // add some URLs
    $sitemap->addItem('http://example.com/mylink1');
    $sitemap->addItem('http://example.com/mylink2', time());
    $sitemap->addItem('http://example.com/mylink3', time(), Sitemap::HOURLY);
    $sitemap->addItem('http://example.com/mylink4', time(), Sitemap::DAILY, 0.3);

    // write it
    $sitemap->write();

    // get URLs of sitemaps written
    $sitemapFileUrls = $sitemap->getSitemapUrls('http://example.com/');

    // create sitemap for static files
    $staticSitemap = new Sitemap($_SERVER['DOCUMENT_ROOT'] . '/sitemap_static.xml');

    // add some URLs
    $staticSitemap->addItem('http://example.com/about');
    $staticSitemap->addItem('http://example.com/tos');
    $staticSitemap->addItem('http://example.com/jobs');

    // write it
    $staticSitemap->write();

    // get URLs of sitemaps written
    $staticSitemapUrls = $staticSitemap->getSitemapUrls('http://example.com/');

    // create sitemap index file
    $index = new Index($_SERVER['DOCUMENT_ROOT'] . '/sitemap_index.xml');

    // add URLs
    foreach ($sitemapFileUrls as $sitemapUrl) {
        $index->addSitemap($sitemapUrl);
    }

    // add more URLs
    foreach ($staticSitemapUrls as $sitemapUrl) {
        $index->addSitemap($sitemapUrl);
    }

    // write it
    $index->write();

    echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
}



?>