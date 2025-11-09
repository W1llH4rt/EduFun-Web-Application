@extends('layouts.app')

@section('title', 'Home - EduFun')

@section('styles')
<style>
    /* ==== Hero Section ==== */
    .hero-wrapper {
        max-width: 1200px;
        margin: 0 auto 3rem;
        padding: 0 1.2rem;
    }

    .hero-banner {
        height: 420px;
        border-radius: 18px;
        overflow: hidden;
        position: relative;
    }

    .hero-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        filter: brightness(0.9);
    }

    /* ==== Article Section ==== */
    .post-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.2rem 3rem;
        display: flex;
        flex-direction: column;
        gap: 2.5rem;
    }

    .post-card {
        display: flex;
        flex-direction: row;
        border-radius: 14px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        min-height: 260px;
    }

    .post-left {
        flex-basis: 42%;
        padding: 2.5rem;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
    }

    .post-left.primary {
        background: linear-gradient(135deg, #283593, #1565c0);
    }

    .post-left.alt {
        background: linear-gradient(135deg, #8e24aa, #d81b60);
    }

    .post-left h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0;
        z-index: 2;
        position: relative;
    }

    .post-thumb {
        position: absolute;
        right: -25px;
        top: 50%;
        transform: translateY(-50%);
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 12px;
        opacity: 0.9;
        z-index: 1;
        box-shadow: -6px 6px 20px rgba(0, 0, 0, 0.25);
    }

    .post-right {
        flex: 1;
        padding: 2.5rem;
        background: #fafafa;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .post-right h4 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 0.6rem;
    }

    .post-meta {
        color: #777;
        font-size: 0.9rem;
        margin-bottom: 1.2rem;
    }

    .post-text {
        color: #333;
        font-size: 1rem;
        line-height: 1.75;
        flex-grow: 1;
        margin-bottom: 1.5rem;
    }

    .btn-more {
        background: #0a192f;
        color: #fff;
        text-decoration: none;
        padding: 0.65rem 1.8rem;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 500;
        transition: 0.25s ease;
        align-self: flex-end;
    }

    .btn-more:hover {
        background: #1e40af;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-wrapper">
    <div class="hero-banner">
        <img src="/home2.png" alt="Hero Banner">
    </div>
</div>

<!-- Articles Section -->
<div class="post-wrapper">
    @foreach($articles as $index => $article)
        <div class="post-card">
            <!-- Left -->
            <div class="post-left {{ $index % 2 == 0 ? 'primary' : 'alt' }}">
                <h3>{{ $article->title }}</h3>

                @if($index == 0)
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=400&fit=crop"
                         alt="{{ $article->title }}" class="post-thumb">
                @elseif($index == 1)
                    <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=400&h=400&fit=crop"
                         alt="{{ $article->title }}" class="post-thumb">
                @else
                    <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=400&h=400&fit=crop"
                         alt="{{ $article->title }}" class="post-thumb">
                @endif
            </div>

            <!-- Right -->
            <div class="post-right">
                <div>
                    <h4>
                        {{ $article->category->name == 'Data Science'
                            ? 'Machine Learning'
                            : ($article->category->name == 'Interactive Multimedia'
                                ? 'Human & Computer Interaction'
                                : Str::limit($article->title, 35)) }}
                    </h4>

                    <p class="post-meta">
                        {{ $article->published_date->format('d M Y') }} &middot; oleh {{ $article->writer->name }}
                    </p>

                    <p class="post-text">
                        {{ $article->excerpt }}
                    </p>
                </div>

                <a href="{{ route('article.show', $article->slug) }}" class="btn-more">Baca selengkapnya</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
