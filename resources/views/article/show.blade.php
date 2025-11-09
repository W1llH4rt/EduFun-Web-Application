@extends('layouts.app')

@section('title', $article->title . ' - EduFun')

@section('styles')
<style>
    .article-detail-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .article-category-label {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 1.5rem;
        padding-left: 0.5rem;
    }

    .article-banner-detail {
        background: #1a237e;
        padding: 3rem;
        border-radius: 15px;
        color: white;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .article-banner-content {
        display: flex;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .article-banner-title {
        flex: 1;
        font-size: 2.2rem;
        font-weight: bold;
        line-height: 1.4;
    }

    .article-banner-title .highlight {
        color: #e91e63;
        font-weight: bold;
    }

    .article-banner-image {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 12px;
        margin-left: 2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .article-metadata {
        color: #666;
        font-size: 1rem;
        margin-bottom: 2rem;
        padding-left: 0.5rem;
    }

    .article-metadata strong {
        color: #333;
    }

    .article-content-detail {
        background: white;
        padding: 2.5rem;
        border-radius: 10px;
        line-height: 1.8;
        color: #333;
        font-size: 1.05rem;
    }

    .article-content-detail p {
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .article-banner-content {
            flex-direction: column;
        }

        .article-banner-image {
            margin-left: 0;
            margin-top: 1.5rem;
            width: 200px;
            height: 200px;
        }

        .article-banner-title {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="article-detail-container">
    <div class="article-category-label">{{ $article->category->name }}</div>

    <div class="article-banner-detail">
        <div class="article-banner-content">
            <div class="article-banner-title">
                @php
                    $title = $article->title;
                    // Highlight "Machine Learning?" with pink color
                    $title = preg_replace('/(Machine Learning\?)/i', '<span class="highlight">$1</span>', $title);
                @endphp
                {!! $title !!}
            </div>
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=500&h=500&fit=crop"
                 alt="{{ $article->title }}"
                 class="article-banner-image">
        </div>
    </div>

    <div class="article-metadata">
        <strong>{{ $article->published_date->format('d M Y') }}</strong> | by: <strong>{{ $article->writer->name }}</strong>
    </div>

    <div class="article-content-detail">
        @php
            $content = $article->content;
            $paragraphs = explode("\n\n", $content);
        @endphp
        @foreach($paragraphs as $paragraph)
            @if(trim($paragraph))
                <p>{{ trim($paragraph) }}</p>
            @endif
        @endforeach
    </div>
</div>
@endsection
