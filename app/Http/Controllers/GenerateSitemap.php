<?php

namespace App\Http\Controllers;

use App\Category;
use App\Store;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class GenerateSitemap extends Controller
{
    const FREQUENCY = "weekly";
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->get('password') !== "8331951950") {
            return "<h1 style='text-align:center;margin-top:45vh;'>Waste fellow!<h1>";
        } 

        $sitemap = Sitemap::create()
            ->add(Url::create('/'));

        Page::active()->get()->each(function (Page $page) use ($sitemap) {
            $sitemap->add(
                Url::create("/{$page->slug}")
                ->setLastModificationDate($page->updated_at)
                ->setChangeFrequency(self::FREQUENCY)
                ->setPriority(0.5));
        });
        Post::published()->get()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(
                Url::create("/{$post->slug}")
                ->setLastModificationDate($post->updated_at)
                ->setChangeFrequency(self::FREQUENCY)
                ->setPriority(0.8));
        });

        Store::published()->get()->each(function (Store $store) use ($sitemap) {
            $sitemap->add(
                Url::create("/{$store->slug}")
                ->setLastModificationDate($store->updated_at)
                ->setChangeFrequency(self::FREQUENCY)
                ->setPriority(1.0));
        });

        Category::all()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(
                Url::create("/{$category->slug}")
                ->setLastModificationDate($category->updated_at)
                ->setChangeFrequency(self::FREQUENCY)
                ->setPriority(0.8));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return "<h1 style='text-align:center;margin-top:45vh;'>Sitemap updated!<h1>";
    }
}
