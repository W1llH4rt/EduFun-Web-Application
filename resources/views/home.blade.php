@extends('layouts.app')

@section('title', 'Home - EduFun')

@section('styles')
<style>
    /* ==== Hero Section ==== */
    .hero-wrapper {
        max-width: 1200px;
        margin: 0 auto 3rem;
        padding: 0 1.5rem;
    }

    .hero-banner {
        height: 430px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .hero-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        filter: brightness(0.85);
        transition: transform 0.5s ease;
    }

    .hero-banner img:hover {
        transform: scale(1.05);
    }

    /* ==== Article Section ==== */
    .post-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem 3.5rem;
        display: flex;
        flex-direction: column;
        gap: 3rem;
    }

    .post-card {
        display: flex;
        flex-direction: row;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 22px rgba(0, 0, 0, 0.08);
        min-height: 260px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 26px rgba(0, 0, 0, 0.12);
    }

    .post-left {
        flex-basis: 40%;
        padding: 2.8rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        color: #fff;
    }

    .post-left.primary {
        background: linear-gradient(135deg, #1e3a8a, #2563eb);
    }

    .post-left.alt {
        background: linear-gradient(135deg, #7b1fa2, #c2185b);
    }

    .post-left h3 {
        font-size: 1.6rem;
        font-weight: 700;
        position: relative;
        z-index: 2;
    }

    .post-thumb {
        position: absolute;
        top: 50%;
        right: -30px;
        transform: translateY(-50%);
        width: 190px;
        height: 190px;
        border-radius: 14px;
        object-fit: cover;
        opacity: 0.85;
        z-index: 1;
        box-shadow: -6px 6px 18px rgba(0, 0, 0, 0.25);
    }

    .post-right {
        flex: 1;
        background: #fafafa;
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .post-right h4 {
        font-size: 1.35rem;
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 0.75rem;
    }

    .post-meta {
        color: #777;
        font-size: 0.95rem;
        margin-bottom: 1.25rem;
    }

    .post-text {
        color: #333;
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 1.75rem;
        flex-grow: 1;
    }

    .btn-more {
        align-self: flex-end;
        background: #0f172a;
        color: #fff;
        text-decoration: none;
        padding: 0.7rem 1.8rem;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .btn-more:hover {
        background: #1d4ed8;
    }

    /* ==== Responsive ==== */
    @media (max-width: 900px) {
        .post-card {
            flex-direction: column;
        }

        .post-left {
            flex-basis: auto;
            text-align: center;
            padding: 2rem;
        }

        .post-thumb {
            position: static;
            margin: 1rem auto 0;
            transform: none;
            width: 160px;
            height: 160px;
        }

        .post-right {
            padding: 2rem;
        }

        .hero-banner {
            height: 300px;
        }
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
