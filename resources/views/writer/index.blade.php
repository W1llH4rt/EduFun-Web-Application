@extends('layouts.app')

@section('title', 'Our Writers - EduFun')

@section('styles')
<style>
    .writers-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .writers-heading {
        font-size: 2rem;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 3rem;
        padding-left: 0.5rem;
    }

    .writer-profile-card {
        text-align: center;
        background: white;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .writer-profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(0,0,0,0.15);
        text-decoration: none;
        color: inherit;
    }

    .writer-avatar-large {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .writer-avatar-large img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .writer-avatar-placeholder {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 4rem;
        font-weight: bold;
    }

    .writer-name {
        font-size: 1.3rem;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 0.8rem;
    }

    .writer-specialization {
        color: #666;
        font-size: 1rem;
        font-weight: 500;
    }

    .writers-row {
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .writer-col {
        flex: 0 0 calc(33.333% - 1.5rem);
        min-width: 280px;
    }

    @media (max-width: 992px) {
        .writer-col {
            flex: 0 0 calc(50% - 1rem);
        }
    }

    @media (max-width: 768px) {
        .writer-col {
            flex: 0 0 100%;
        }

        .writers-heading {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="writers-container">
    <h1 class="writers-heading">Our Writers:</h1>
    <div class="writers-row">
        @foreach($writers as $writer)
        <div class="writer-col">
            <a href="{{ route('writer.show', $writer->id) }}" class="writer-profile-card">
                <div class="writer-avatar-large">
                    <div class="writer-avatar-placeholder">
                        {{ substr($writer->name, 0, 1) }}
                    </div>
                </div>
                <h4 class="writer-name">{{ $writer->name }}</h4>
                <p class="writer-specialization">{{ $writer->specialization }}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
