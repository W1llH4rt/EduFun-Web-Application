@extends('layouts.app')

@section('title', $writer->name . ' - EduFun')

@section('styles')
<style>
    .writer-detail-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .writer-profile-card-detail {
        background: transparent;
        border-radius: 15px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 2.5rem;
    }

    .writer-avatar-detail {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .writer-avatar-detail .avatar-initial {
        font-size: 4.5rem;
        font-weight: bold;
        color: white;
    }

    .writer-info-detail {
        flex: 1;
    }

    .writer-name-detail {
        font-size: 2rem;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 0.8rem;
    }

    .writer-specialization-detail {
        color: #666;
        font-size: 1.2rem;
        font-weight: 500;
    }

    .article-card-home {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        display: flex;
        min-height: 250px;
    }

    .article-card-left {
        flex: 0 0 45%;
        position: relative;
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        overflow: hidden;
    }

    .article-card-left.blue {
        background: #1a237e;
    }

    .article-card-left.gradient {
        background: linear-gradient(135deg, #9c27b0 0%, #e91e63 100%);
    }

    .article-card-left h3 {
        font-size: 1.4rem;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: 0;
        z-index: 3;
        position: relative;
    }

    .article-card-image {
        position: absolute;
        right: -30px;
        top: 50%;
        transform: translateY(-50%);
        width: 220px;
        height: 220px;
        object-fit: cover;
        border-radius: 12px;
        opacity: 0.95;
        z-index: 1;
        box-shadow: -5px 5px 20px rgba(0,0,0,0.3);
    }

    .article-card-right {
        flex: 1;
        padding: 2.5rem;
        background: #f5f5f5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
    }

    .article-card-right h4 {
        font-size: 1.6rem;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 0.8rem;
    }

    .article-meta {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 1.2rem;
    }

    .article-excerpt {
        color: #333;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        flex-grow: 1;
        font-size: 1rem;
    }

    .btn-read-more-home {
        background-color: #071026;
        color: white;
        border: none;
        padding: 0.7rem 2rem;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        align-self: flex-end;
        transition: background-color 0.3s;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .btn-read-more-home:hover {
        background-color: #0d47a1;
        color: white;
    }
</style>
@endsection

@section('content')
<div class="writer-detail-container">
    <!-- Writer Profile Section - Kiri Atas -->
    <div class="row mb-4">
        <div class="col-md-5">
            <div class="writer-profile-card-detail">
                <div class="writer-avatar-detail">
                    <div class="avatar-initial">
                        {{ substr($writer->name, 0, 1) }}
                    </div>
                </div>
                <div class="writer-info-detail">
                    <h4 class="writer-name-detail">{{ $writer->name }}</h4>
                    <p class="writer-specialization-detail">{{ $writer->specialization }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles Section - Di Bawah Writer Profile (Full Width) -->
    <div class="row">
        <div class="col-12">
            @if($articles->count() > 0)
                @foreach($articles as $index => $article)
                <div class="article-card-home">
                    <!-- Left Side with Title and Image -->
                    <div class="article-card-left {{ $index % 2 == 0 ? 'blue' : 'gradient' }}">
                        <h3>{{ $article->title }}</h3>
                        @if($index == 0)
                        <!-- First article image -->
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=400&fit=crop"
                             alt="{{ $article->title }}"
                             class="article-card-image">
                        @elseif($index == 1)
                        <!-- Second article image -->
                        <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=400&h=400&fit=crop"
                             alt="{{ $article->title }}"
                             class="article-card-image">
                        @else
                        <!-- Other articles image -->
                        <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=400&h=400&fit=crop"
                             alt="{{ $article->title }}"
                             class="article-card-image">
                        @endif
                    </div>

                    <!-- Right Side with Article Details -->
                    <div class="article-card-right">
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
                                    } elseif (str_contains($article->title, 'Human and Computer Interaction') || str_contains($article->title, 'HCI')) {
                                        $shortTitle = 'Human and Computer Interaction';
                                    } else {
                                        $shortTitle = Str::limit($article->title, 40);
                                    }
                                @endphp
                                {{ $shortTitle }}
                            </h4>
                            <p class="article-meta">
                                {{ $article->published_date->format('d M Y') }} | By {{ $writer->name }}
                            </p>
                            <p class="article-excerpt">
                                {{ $article->excerpt }}
                            </p>
                        </div>
                        <div style="text-align: right;">
                            <a href="{{ route('article.show', $article->slug) }}" class="btn-read-more-home">read more...</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="alert alert-info">
                    <p>No articles found for this writer.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
