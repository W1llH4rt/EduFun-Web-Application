@extends('layouts.app')

@section('title', 'Popular Articles - EduFun')

@section('styles')
<style>
    .popular-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .popular-page-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 2rem;
        padding-left: 0.5rem;
    }

    .popular-article-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        display: flex;
        min-height: 200px;
    }

    .popular-article-thumbnail {
        flex: 0 0 40%;
        position: relative;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        overflow: hidden;
    }

    .popular-article-thumbnail.blue {
        background: #1a237e;
    }

    .popular-article-thumbnail.gray {
        background: #e0e0e0;
        color: #333;
    }

    .popular-article-thumbnail h3 {
        font-size: 1.3rem;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 0;
        z-index: 3;
        position: relative;
    }

    .popular-article-image {
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

    .popular-article-details {
        flex: 1;
        padding: 2rem;
        background: #f5f5f5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .popular-article-details h4 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 0.8rem;
    }

    .popular-article-meta {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .popular-article-excerpt {
        color: #333;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex-grow: 1;
        font-size: 0.95rem;
    }

    .btn-read-more-popular {
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

    .btn-read-more-popular:hover {
        background-color: #0d47a1;
        color: white;
    }

    .popular-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 2rem;
        font-size: 1rem;
    }

    .popular-pagination .page-text {
        color: #333;
        font-weight: 500;
        margin-right: 0.5rem;
    }

    .popular-pagination .page-number {
        color: #1a237e;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: all 0.3s;
        font-weight: 500;
    }

    .popular-pagination .page-number:hover {
        background-color: #1a237e;
        color: white;
    }

    .popular-pagination .page-number.active {
        background-color: #1a237e;
        color: white;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="popular-container">
    <h1 class="popular-page-title">Popular</h1>

    @if($articles->count() > 0)
        @foreach($articles as $index => $article)
        <div class="popular-article-card">
            <!-- Thumbnail Side -->
            <div class="popular-article-thumbnail {{ $index % 3 == 0 ? 'blue' : 'gray' }}">
                <h3>{{ $article->title }}</h3>
                @if($index == 0)
                <!-- Network Security image -->
                <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=400&fit=crop"
                     alt="{{ $article->title }}"
                     class="popular-article-image">
                @elseif($index == 1)
                <!-- Software Engineering image -->
                <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=400&h=400&fit=crop"
                     alt="{{ $article->title }}"
                     class="popular-article-image">
                @else
                <!-- User Experience or other images -->
                <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=400&h=400&fit=crop"
                     alt="{{ $article->title }}"
                     class="popular-article-image">
                @endif
            </div>

            <!-- Details Side -->
            <div class="popular-article-details">
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
                            } elseif (str_contains($article->title, 'Network Security')) {
                                $shortTitle = 'Apa itu Network Security?';
                            } elseif (str_contains($article->title, 'Software Engineering')) {
                                $shortTitle = 'Software Engineering';
                            } elseif (str_contains($article->title, 'User Experience')) {
                                $shortTitle = 'User Experience';
                            } else {
                                $shortTitle = Str::limit($article->title, 40);
                            }
                        @endphp
                        {{ $shortTitle }}
                    </h4>
                    <p class="popular-article-meta">
                        {{ $article->published_date->format('d M Y') }} | By {{ $article->writer->name }}
                    </p>
                    <p class="popular-article-excerpt">
                        {{ $article->excerpt }}
                    </p>
                </div>
                <div style="text-align: right;">
                    <a href="{{ route('article.show', $article->slug) }}" class="btn-read-more-popular">read more...</a>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="popular-pagination">
            <span class="page-text">Page |</span>
            @for($i = 1; $i <= $articles->lastPage(); $i++)
                <a href="{{ $articles->url($i) }}"
                   class="page-number {{ $articles->currentPage() == $i ? 'active' : '' }}">
                    {{ $i }}
                </a>
            @endfor
        </div>
    @else
        <div class="alert alert-info">
            <p>No popular articles found.</p>
        </div>
    @endif
</div>
@endsection
