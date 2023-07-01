<?php

namespace App\Dto\Dashboard\Factories;

use App\Dto\Dashboard\PostDataDto;

class PostDataFactory
{
    /**
     * Post data transfer object factory.
     *
     * @param $request
     * @return \App\Dto\Dashboard\PostDataDto
     */
    public function createDto($request): PostDataDto
    {
        return new PostDataDto(
            title: $request->get('title'),
            body: $request->get('body'),
            description: $request->get('description'),
            photo_source: $request->get('photo_source'),
            published: $request->get('published'),
            category_id: $request->get('category_id'),
            publish_time: $request->get('publish_time'),
        );
    }
}
