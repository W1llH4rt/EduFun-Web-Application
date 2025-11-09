@extends('layouts.app')

@section('title', 'Popular Articles - EduFun')

@section('styles')
<style>
    /* ==== Popular Section ==== */
    .popular-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 1.5rem;
    }

    .popular-page-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 2.5rem;
        padding-left: 0.5rem;
        letter-spacing: 0.3px;
    }

    .popular-article-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2.5rem;
        display: flex;
        flex-direction: row;
        min-height: 240px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .popular-article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 26px rgba(0, 0, 0, 0.12);
    }

    .popular-article-thumbnail {
        flex-basis: 40%;
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .popular-article-thumbnail.blue {
        background: linear-gradient(135deg, #1e3a8a, #2563eb);
    }

    .popular-article-thumbnail.gray {
        background: linear-gradient(135deg, #d1d5db, #9ca3af);
        color: #222;
    }

    .popular-article-thumbnail h3 {
        font-size: 1.4rem;
        font-weight: 600;
        line-height: 1.45;
        position: relative;
        z-index: 2;
        margin-bottom: 0;
    }

    .popular-article-image {
        position: absolute;
        right: -35px;
        top: 50%;
        transform: translateY(-50%);
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 12px;
        opacity: 0.85;
        z-index: 1;
        box-shadow: -6px 6px 20px rgba(0, 0, 0, 0.25);
    }

    .popular-article-details {
        flex: 1;
        padding: 2.5rem;
        background: #fafafa;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .popular-article-details h4 {
        font-size: 1.45rem;
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 0.75rem;
    }

    .popular-article-meta {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 1rem;
    }

    .popular-article-excerpt {
        color: #333;
        line-height: 1.75;
        margin-bottom: 1.75rem;
        flex-grow: 1;
        font-size: 1rem;
    }

    .btn-read-more-popular {
        align-self: flex-end;
        background: #0f172a;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 0.7rem 1.8rem;
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .btn-read-more-popular:hover {
        background: #1d4ed8;
    }

    /* ==== Pagination ==== */
    .popular-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.6rem;
        margin-top: 2.5rem;
        font-size: 1rem;
    }

    .popular-pagination .page-text {
        color: #333;
        font-weight: 500;
    }

    .popular-pagination .page-number {
        color: #1e3a8a;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .popular-pagination .page-number:hover,
    .popular-pagination .page-number.active {
        background: #1e3a8a;
        color: #fff;
        font-weight: 600;
    }

    /* ==== Responsive ==== */
    @media (max-width: 900px) {
        .popular-article-card {
            flex-direction: column;
        }

        .popular-article-thumbnail {
            padding: 2rem;
            text-align: center;
        }

        .popular-article-image {
            position: static;
            transform: none;
            margin: 1rem auto 0;
            width: 160px;
            height: 160px;
        }

        .popular-article-details {
            padding: 2rem;
        }

        .popular-page-title {
            font-size: 1.8rem;
        }
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
