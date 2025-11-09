@extends('layouts.app')

@section('title', $category->name . ' - EduFun')

@section('styles')
<style>
    .category-page-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 2rem;
        padding-left: 1rem;
    }

    .category-article-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        display: flex;
        min-height: 200px;
    }

    .category-article-thumbnail {
        flex: 0 0 40%;
        position: relative;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        overflow: hidden;
    }

    .category-article-thumbnail.blue {
        background: #1a237e;
    }

    .category-article-thumbnail.gray {
        background: #37474f;
    }

    .category-article-thumbnail.dark-blue {
        background: #263238;
    }

    .category-article-thumbnail h3 {
        font-size: 1.3rem;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 0;
        z-index: 3;
        position: relative;
    }

    .category-article-image {
        position: absolute;
        right: -40px;
        top: 50%;
        transform: translateY(-50%);
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
        opacity: 0.9;
        z-index: 1;
        box-shadow: -5px 5px 20px rgba(0,0,0,0.3);
    }

    .category-article-details {
        flex: 1;
        padding: 2rem;
        background: #f5f5f5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .category-article-details h4 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 0.8rem;
    }

    .category-article-meta {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .category-article-excerpt {
        color: #333;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex-grow: 1;
        font-size: 0.95rem;
    }

    .btn-read-more-category {
        background-color: #071026;
        color: white;
        border: none;
        padding: 0.6rem 1.8rem;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        align-self: flex-end;
        transition: background-color 0.3s;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .btn-read-more-category:hover {
        background-color: #0d47a1;
        color: white;
    }

    .category-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem 2rem;
    }
</style>
@endsection

@section('content')
<div class="category-container">
    <h1 class="category-page-title">{{ $category->name }}</h1>

    @if($articles->count() > 0)
        @foreach($articles as $index => $article)
        <div class="category-article-card">
            <!-- Thumbnail Side -->
            <div class="category-article-thumbnail {{ $index % 3 == 0 ? 'blue' : ($index % 3 == 1 ? 'gray' : 'dark-blue') }}">
                <h3>{{ $article->title }}</h3>
                @if($index == 0)
                <!-- Machine Learning image -->
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=400&fit=crop"
                     alt="{{ $article->title }}"
                     class="category-article-image">
                @elseif($index == 1)
                <!-- Deep Learning image -->
                <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=400&h=400&fit=crop"
                     alt="{{ $article->title }}"
                     class="category-article-image">
                @else
                <!-- NLP or other images -->
                <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=400&h=400&fit=crop"
                     alt="{{ $article->title }}"
                     class="category-article-image">
                @endif
            </div>

            <!-- Details Side -->
            <div class="category-article-details">
                <div>
                    <h4>
                        @php
                            $shortTitle = $article->title;
                            if (str_contains($article->title, 'Machine Learning')) {
                                $shortTitle = 'Machine Learning';
                            } elseif (str_contains($article->title, 'Deep Learning')) {
                                $shortTitle = 'Deep Learning';
                            } elseif (str_contains($article->title, 'Natural Language Processing') || str_contains($article->title, 'NLP')) {
                                $shortTitle = 'Natural Language Processing';
                            } else {
                                $shortTitle = Str::limit($article->title, 40);
                            }
                        @endphp
                        {{ $shortTitle }}
                    </h4>
                    <p class="category-article-meta">
                        {{ $article->published_date->format('d M Y') }} | By {{ $article->writer->name }}
                    </p>
                    <p class="category-article-excerpt">
                        {{ $article->excerpt }}
                    </p>
                </div>
                <div style="text-align: right;">
                    <a href="{{ route('article.show', $article->slug) }}" class="btn-read-more-category">read more...</a>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="alert alert-info">
            <p>No articles found in this category.</p>
        </div>
    @endif
</div>
@endsection
